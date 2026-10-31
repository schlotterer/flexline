#!/usr/bin/env python3
"""Build and verify runtime-only WordPress release packages. Standard library only."""
import argparse
import hashlib
import json
import os
import posixpath
from pathlib import Path, PurePosixPath
import re
import subprocess
import sys
import zipfile

SEMVER = r'(0|[1-9][0-9]*)\.(0|[1-9][0-9]*)\.(0|[1-9][0-9]*)'
BLOCKED = {'.git', '.github', '.env', 'node_modules', 'tests', 'test-data', 'docs', '__pycache__', '.DS_Store'}


def run(args, root):
    return subprocess.check_output(args, cwd=root, text=True).strip()


def digest(data):
    return hashlib.sha256(data).hexdigest()


def safe_path(value):
    p = PurePosixPath(value)
    if not value or not p.parts or p.is_absolute() or '..' in p.parts or '\\' in value or str(p) != value:
        raise ValueError(f'Unsafe path: {value}')
    return p


def read_config(root):
    c = json.loads((root / 'release-package.json').read_text())
    if not re.fullmatch(r'[a-z0-9][a-z0-9-]*', c['slug']):
        raise ValueError('Invalid package slug')
    if c['type'] not in ('plugin', 'theme'):
        raise ValueError('Invalid package type')
    header = root / str(safe_path(c['entry']))
    match = re.search(r'^\s*\*?\s*Version:\s*(\S+)', header.read_text(), re.M)
    if not match or not re.fullmatch(SEMVER, match[1]):
        raise ValueError('Entry header needs a MAJOR.MINOR.PATCH version')
    c['version'] = match[1]
    for f in ('package.json', 'composer.json'):
        if (root / f).exists():
            data = json.loads((root / f).read_text())
            if 'version' in data and data['version'] != c['version']:
                raise ValueError(f'{f} version differs from header {c["version"]}')
    if (root / 'package-lock.json').exists():
        lock = json.loads((root / 'package-lock.json').read_text())
        for version in (lock.get('version'), lock.get('packages', {}).get('', {}).get('version')):
            if version and version != c['version']:
                raise ValueError('package-lock.json root version differs from header')
    if not c.get('checks'):
        raise ValueError('Explicit package checks required')
    return c


def validate_ref(root, c, tag):
    if not re.fullmatch('v' + SEMVER, tag) or tag != 'v' + c['version']:
        raise ValueError('Tag must be vMAJOR.MINOR.PATCH and match package version')
    commit = run(['git', 'rev-parse', 'HEAD'], root)
    tagged = run(['git', 'rev-parse', f'refs/tags/{tag}^{{commit}}'], root)
    if commit != tagged:
        raise ValueError('Checkout is not the tagged commit')
    subprocess.run(['git', 'merge-base', '--is-ancestor', commit, 'refs/remotes/origin/main'], cwd=root, check=True)
    return commit


def check_source(root, c):
    for name in run(['git', 'diff', '--name-only', 'HEAD'], root).splitlines():
        if not any(name == p or name.startswith(p + '/') for p in c.get('generated', [])):
            raise ValueError(f'Build modified source: {name}')


def prepare(root, c):
    if (root / 'composer.json').exists():
        subprocess.run(['composer', 'install', '--no-interaction', '--prefer-dist', '--no-progress'], cwd=root, check=True)
    if c.get('node'):
        subprocess.run(['npm', 'ci', '--no-audit', '--no-fund'], cwd=root, check=True)
    for args in c['checks']:
        if not isinstance(args, list) or not args or not all(isinstance(a, str) for a in args):
            raise ValueError('Checks must be explicit argv arrays')
        subprocess.run(args, cwd=root, check=True)
    if c.get('node'):
        subprocess.run(['npm', 'run', 'build'], cwd=root, check=True)
    check_source(root, c)


def collect(root, c):
    files = {}
    for value in c['include']:
        source = root / str(safe_path(value))
        if not source.exists():
            raise ValueError(f'Required runtime path missing: {value}')
        for file in ([source] if source.is_file() else sorted(source.rglob('*'))):
            relative = file.relative_to(root)
            if file.is_symlink() or any((root / Path(*relative.parts[:n])).is_symlink() for n in range(1, len(relative.parts))):
                raise ValueError(f'Symlink forbidden: {relative}')
            if not file.is_file():
                continue
            if relative.parts[0] == 'src' or any(part in BLOCKED or part.startswith('.env') for part in relative.parts):
                raise ValueError(f'Forbidden runtime file: {relative}')
            if 'vendor' == relative.parts[0] and len(relative.parts) > 1 and relative.parts[1] == 'bin':
                raise ValueError('Development executables in runtime vendor')
            files[relative.as_posix()] = file.read_bytes()
    for value in c['required']:
        if value not in files or not files[value]:
            raise ValueError(f'Required nonempty runtime file missing: {value}')
    # Check every block metadata file's local file dependencies.
    for name, content in files.items():
        if name.endswith('/block.json'):
            metadata = json.loads(content)
            values = [v for field in ('editorScript', 'script', 'viewScript', 'viewScriptModule', 'style', 'editorStyle', 'viewStyle', 'render') for v in (metadata.get(field) if isinstance(metadata.get(field), list) else [metadata.get(field)])]
            for v in values:
                if isinstance(v, str) and v.startswith('file:'):
                    target = (PurePosixPath(name).parent / v[5:]).as_posix()
                    # WordPress commonly uses file:./index.js; normalize only this prefix.
                    target = posixpath.normpath(target)
                    safe_path(target)
                    if target not in files:
                        raise ValueError(f'Block dependency missing: {target}')
    return files


def build(root, output, execute=False, tag=None):
    c = read_config(root)
    if output.exists():
        raise ValueError('Refusing existing output directory')
    commit = validate_ref(root, c, tag) if tag else run(['git', 'rev-parse', 'HEAD'], root)
    if execute:
        prepare(root, c)
    # A clean separate staging tree receives only production Composer dependencies.
    import tempfile, shutil
    with tempfile.TemporaryDirectory(prefix='web4sl-package-') as temp:
        stage = Path(temp)
        for value in c['include']:
            if value == 'vendor':
                continue
            source = root / str(safe_path(value))
            if source.is_symlink() or any((root / Path(*PurePosixPath(value).parts[:n])).is_symlink() for n in range(1, len(PurePosixPath(value).parts))):
                raise ValueError('Symlink in runtime allowlist')
            if source.is_dir():
                shutil.copytree(source, stage / value, symlinks=True, ignore=shutil.ignore_patterns(".DS_Store"))
            elif source.is_file():
                (stage / value).parent.mkdir(parents=True, exist_ok=True)
                shutil.copyfile(source, stage / value)
            else:
                raise ValueError(f'Required runtime path missing: {value}')
        if 'vendor' in c['include']:
            for f in ('composer.json', 'composer.lock'):
                shutil.copyfile(root / f, stage / f)
            subprocess.run(['composer', 'install', '--no-dev', '--no-scripts', '--no-plugins', '--optimize-autoloader', '--no-interaction', '--prefer-dist', '--no-progress'], cwd=stage, check=True)
        files = collect(stage, c)
        for metadata in root.glob('src/**/block.json'):
            expected = 'build/' + metadata.relative_to(root / 'src').as_posix()
            if expected not in files:
                raise ValueError(f'Compiled block metadata missing: {expected}')
        for name in files:
            if name.endswith('.php'):
                subprocess.run(['php', '-l', str(stage / name)], check=True, stdout=subprocess.DEVNULL)
        if 'vendor' in c['include']:
            subprocess.run(['php', '-r', 'require ' + repr(str(stage / 'vendor/autoload.php')) + '; if (!class_exists("enshrined\\svgSanitize\\Sanitizer")) exit(1);'], cwd=stage, check=True)
    output.mkdir(parents=True)
    archive = output / f'{c["slug"]}-{c["version"]}.zip'
    with zipfile.ZipFile(archive, 'w', compression=zipfile.ZIP_DEFLATED) as z:
        for name, content in sorted(files.items()):
            info = zipfile.ZipInfo(c['slug'] + '/' + name, date_time=(2020, 1, 1, 0, 0, 0))
            info.compress_type = zipfile.ZIP_DEFLATED
            info.external_attr = 0o100644 << 16
            z.writestr(info, content)
    metadata = {'schema': 1, 'package': c['slug'], 'type': c['type'], 'version': c['version'], 'repository': c['repository'], 'commit': commit, 'tag': tag, 'candidate': True, 'checks_passed': execute, 'build_run': os.getenv('GITHUB_RUN_ID'), 'archive': archive.name, 'sha256': digest(archive.read_bytes()), 'files': {name: digest(content) for name, content in sorted(files.items())}, 'compatibility': c['compatibility']}
    (output / 'release.json').write_text(json.dumps(metadata, indent=2) + '\n')
    (output / 'SHA256SUMS').write_text(''.join(f'{digest((output / f).read_bytes())}  {f}\n' for f in (archive.name, 'release.json')))
    verify(output)
    print(f'Verified {archive.name}: {len(files)} runtime files')


def verify(output):
    m = json.loads((output / 'release.json').read_text())
    if m.get('schema') != 1 or not re.fullmatch(r'[a-z0-9][a-z0-9-]*', m.get('package', '')) or not re.fullmatch(SEMVER, m.get('version', '')) or not re.fullmatch(r'[0-9a-f]{40}', m.get('commit', '')):
        raise ValueError('Invalid release identity metadata')
    archive = str(safe_path(m['archive']))
    if '/' in archive or archive != f'{m["package"]}-{m["version"]}.zip':
        raise ValueError('Archive identity mismatch')
    if set(p.name for p in output.iterdir()) != {archive, 'release.json', 'SHA256SUMS'}:
        raise ValueError('Unexpected release assets')
    sums = (output / 'SHA256SUMS').read_text().splitlines()
    if sums != [f'{digest((output / f).read_bytes())}  {f}' for f in (archive, 'release.json')]:
        raise ValueError('Release checksums differ')
    if digest((output / archive).read_bytes()) != m['sha256']:
        raise ValueError('Archive checksum differs')
    with zipfile.ZipFile(output / archive) as z:
        expected = {m['package'] + '/' + f: h for f, h in m['files'].items()}
        if len(z.namelist()) != len(expected) or set(z.namelist()) != set(expected):
            raise ValueError('Archive file membership differs')
        for info in z.infolist():
            safe_path(info.filename)
            if (info.external_attr >> 16) & 0o170000 != 0o100000:
                raise ValueError('Non-regular archive member')
            if digest(z.read(info)) != expected[info.filename]:
                raise ValueError('Archive member checksum differs')
    return m


def verify_remote_tag(metadata):
    # Resolve the exact tag namespace, even if a branch has the same name.
    repo = metadata['repository']
    result = json.loads(subprocess.check_output(['gh', 'api', f'repos/{repo}/git/ref/tags/{metadata["tag"]}'], text=True))
    obj = result['object']
    for _ in range(8):
        if not re.fullmatch(r'[0-9a-f]{40}', obj.get('sha', '')):
            raise ValueError('Invalid remote tag object')
        if obj.get('type') == 'commit':
            if obj['sha'] != metadata['commit']:
                raise ValueError('Remote release tag moved since the approved build')
            return
        if obj.get('type') != 'tag':
            raise ValueError('Remote release tag does not point to a commit')
        result = json.loads(subprocess.check_output(['gh', 'api', f'repos/{repo}/git/tags/{obj["sha"]}'], text=True))
        obj = result['object']
    raise ValueError('Remote release tag chain is too deep')


def publish(output):
    m = verify(output)
    tag = m.get('tag')
    if m.get('checks_passed') is not True:
        raise ValueError('Publication requires a completed build/check receipt')
    if tag != 'v' + m['version'] or not re.fullmatch('v' + SEMVER, tag or ''):
        raise ValueError('Preview artifacts cannot be published')
    if os.getenv('GITHUB_REPOSITORY') != m['repository'] or os.getenv('GITHUB_SHA') != m['commit'] or os.getenv('GITHUB_REF') != 'refs/tags/' + tag:
        raise ValueError('Publisher context does not match release')
    repo = m['repository']
    # Refuse existing drafts/assets rather than overwriting an interrupted or published release.
    result = subprocess.run(['gh', 'release', 'view', tag, '--repo', repo], capture_output=True)
    if result.returncode == 0:
        raise ValueError('Release already exists; reconcile assets manually, never overwrite')
    # Verify API access separately; a failed view may be an auth/network error.
    subprocess.run(['gh', 'api', f'repos/{repo}'], check=True, stdout=subprocess.DEVNULL)
    verify_remote_tag(m)
    subprocess.run(['gh', 'release', 'create', tag, '--repo', repo, '--verify-tag', '--target', m['commit'], '--draft', '--title', tag, '--notes', 'Candidate runtime package. Canary verification and deployment approval remain separate.'], check=True)
    subprocess.run(['gh', 'release', 'upload', tag, '--repo', repo, *map(str, sorted(output.iterdir()))], check=True)
    import tempfile
    with tempfile.TemporaryDirectory() as temp:
        subprocess.run(['gh', 'release', 'download', tag, '--repo', repo, '--dir', temp], check=True)
        verify(Path(temp))
        for f in output.iterdir():
            if f.read_bytes() != (Path(temp) / f.name).read_bytes():
                raise ValueError('Uploaded release bytes differ')
    verify_remote_tag(m)
    subprocess.run(['gh', 'release', 'edit', tag, '--repo', repo, '--draft=false'], check=True)


def main():
    p = argparse.ArgumentParser()
    p.add_argument('mode', choices=['build', 'verify', 'publish'])
    p.add_argument('--root', type=Path, default=Path.cwd())
    p.add_argument('--output', type=Path, default=Path('.release-output'))
    p.add_argument('--execute', action='store_true')
    p.add_argument('--tag')
    args = p.parse_args()
    if args.mode == 'build': build(args.root.resolve(), args.output.resolve(), args.execute, args.tag)
    elif args.mode == 'verify': verify(args.output.resolve())
    else: publish(args.output.resolve())

if __name__ == '__main__':
    try: main()
    except (ValueError, OSError, subprocess.CalledProcessError) as error:
        print(f'Release refused: {error}', file=sys.stderr)
        sys.exit(1)
