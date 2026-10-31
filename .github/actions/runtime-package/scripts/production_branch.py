#!/usr/bin/env python3
"""Publish the verified, published tag's runtime tree; never configure a site."""
import argparse
import json
import os
from pathlib import Path
import re
import subprocess
import sys
import tempfile
import zipfile

from package_release import BLOCKED, SEMVER, safe_path, verify, verify_remote_tag

BRANCH = 'refs/heads/production'
MARKERS = ('Package', 'Repository', 'Tag', 'Source', 'Archive', 'Tree')


def context(metadata):
    tag = metadata.get('tag')
    if metadata.get('checks_passed') is not True or tag != 'v' + metadata['version'] or not re.fullmatch('v' + SEMVER, tag or ''):
        raise ValueError('Production requires a checked version-tag release, never a preview')
    if not re.fullmatch(r'[A-Za-z0-9_.-]+/[A-Za-z0-9_.-]+', metadata.get('repository', '')):
        raise ValueError('Exact GitHub repository required')
    expected = dict(GITHUB_REPOSITORY=metadata['repository'], GITHUB_SHA=metadata['commit'], GITHUB_REF='refs/tags/' + tag)
    if any(os.getenv(key) != value for key, value in expected.items()):
        raise ValueError('Production context differs from the built release')
    if os.getenv('GITHUB_EVENT_NAME') != 'push':
        raise ValueError('Production requires an explicit tag push')


def runtime_files(output, metadata):
    result = {}
    with zipfile.ZipFile(output / metadata['archive']) as archive:
        for name in metadata['files']:
            path = safe_path(name)
            if any(part in BLOCKED or part.startswith('.env') for part in path.parts) or path.parts[0] == 'src' or path.parts[:2] == ('vendor', 'bin'):
                raise ValueError('Forbidden production runtime path')
            result[name] = archive.read(metadata['package'] + '/' + name)
    return result


def receipt(message):
    result = {}
    for key in MARKERS:
        values = re.findall(r'^Web4SL-' + key + r': (\S+)$', message, re.M)
        if len(values) != 1:
            raise ValueError('Existing production branch is unmanaged; separate reconciliation required')
        result[key] = values[0]
    if not re.fullmatch('v' + SEMVER, result['Tag']) or any(not re.fullmatch(r'[0-9a-f]{40}', result[k]) for k in ('Source', 'Tree')) or not re.fullmatch(r'[0-9a-f]{64}', result['Archive']):
        raise ValueError('Invalid prior production receipt')
    return result


def update_branch(metadata, files, remote, before_push, *, git_env=None):
    """Trusted Git adapter, tested against disposable bare remotes. No force push."""
    with tempfile.TemporaryDirectory(prefix='web4sl-production-') as directory:
        root = Path(directory)
        env = dict(os.environ if git_env is None else git_env, GIT_TERMINAL_PROMPT='0',
                   GIT_AUTHOR_NAME='github-actions[bot]', GIT_COMMITTER_NAME='github-actions[bot]',
                   GIT_AUTHOR_EMAIL='41898282+github-actions[bot]@users.noreply.github.com',
                   GIT_COMMITTER_EMAIL='41898282+github-actions[bot]@users.noreply.github.com')
        def git(*args, data=None):
            return subprocess.check_output(['git', *args], cwd=root, env=env, input=data, stderr=subprocess.PIPE)
        git('init', '--bare', '--quiet')
        git('config', 'credential.helper', '')
        git('remote', 'add', 'origin', remote)
        git('fetch', '--quiet', '--no-tags', 'origin', 'refs/heads/main:refs/remotes/origin/main')
        git('merge-base', '--is-ancestor', metadata['commit'], 'refs/remotes/origin/main')
        previous = subprocess.run(['git', 'ls-remote', '--exit-code', 'origin', BRANCH], cwd=root, env=env, capture_output=True)
        if previous.returncode not in (0, 2):
            raise ValueError('Cannot determine current production branch; no update made')
        parent = None
        old = None
        if previous.returncode == 0:
            lines = previous.stdout.decode().splitlines()
            if len(lines) != 1 or not re.fullmatch(r'[0-9a-f]{40}\s+' + re.escape(BRANCH), lines[0]):
                raise ValueError('Ambiguous production ref')
            parent = lines[0].split()[0]
            git('fetch', '--quiet', '--no-tags', 'origin', BRANCH + ':refs/remotes/origin/production')
            if git('rev-parse', 'refs/remotes/origin/production').decode().strip() != parent:
                raise ValueError('Production changed during inspection; retry the job')
            old = receipt(git('show', '-s', '--format=%B', parent).decode())
            if (old['Package'], old['Repository']) != (metadata['package'], metadata['repository']):
                raise ValueError('Production belongs to another package or repository')
            if git('rev-parse', parent + '^{tree}').decode().strip() != old['Tree']:
                raise ValueError('Production tree changed outside the release publisher')
            version = lambda tag: tuple(map(int, tag[1:].split('.')))
            if version(metadata['tag']) < version(old['Tag']):
                raise ValueError('Older release cannot replace newer production')
            git('merge-base', '--is-ancestor', old['Source'], metadata['commit'])
        # Write Git objects directly: no ZIP extraction, shell paths, or filename
        # case folding. The production tree has precisely the ZIP's runtime root.
        for name, content in sorted(files.items()):
            safe_path(name)
            blob = git('hash-object', '-w', '--stdin', data=content).decode().strip()
            git('update-index', '--add', '--cacheinfo', '100644', blob, name)
        tree = git('write-tree').decode().strip()
        if old and old['Tag'] == metadata['tag']:
            if (old['Source'], old['Archive'], old['Tree']) != (metadata['commit'], metadata['sha256'], tree):
                raise ValueError('Same version has different production bytes; never overwrite it')
            before_push()
            if git('ls-remote', '--exit-code', 'origin', BRANCH).decode().split()[0] != parent:
                raise ValueError('Production changed during repeat verification')
            return dict(status='unchanged', branch='production', commit=parent, tree=tree, tag=metadata['tag'])
        markers = dict(Package=metadata['package'], Repository=metadata['repository'], Tag=metadata['tag'], Source=metadata['commit'], Archive=metadata['sha256'], Tree=tree)
        message = 'Release ' + metadata['tag'] + ' runtime\n\n' + '\n'.join('Web4SL-' + key + ': ' + markers[key] for key in MARKERS) + '\n'
        args = ['commit-tree', tree]
        if parent:
            args += ['-p', parent]
        commit = git(*args, data=message.encode()).decode().strip()
        before_push()
        # Optimistic lock plus a normal fast-forward-only push. A writer racing
        # after this check is rejected by Git's ref transaction; nothing is forced.
        current = subprocess.run(['git', 'ls-remote', '--exit-code', 'origin', BRANCH], cwd=root, env=env, capture_output=True)
        if parent is None:
            if current.returncode != 2:
                raise ValueError('Production appeared during publication; retry')
        elif current.returncode != 0 or current.stdout.decode().split()[0] != parent:
            raise ValueError('Production advanced during publication; retry')
        git('push', '--quiet', 'origin', commit + ':' + BRANCH)
        actual = git('ls-remote', '--exit-code', 'origin', BRANCH).decode().split()[0]
        if actual != commit:
            raise ValueError('Production changed after push; inspect before retrying')
        return dict(status='updated', branch='production', commit=commit, previous=parent, tree=tree, tag=metadata['tag'])


def promote(output):
    metadata = verify(output)
    context(metadata)
    verify_remote_tag(metadata)
    # Only promote the published release's verified assets, never a rebuild or
    # an unconfirmed upload. Failed/partial release publication leaves the branch.
    release = json.loads(subprocess.check_output(['gh', 'release', 'view', metadata['tag'], '--repo', metadata['repository'], '--json', 'isDraft,isPrerelease,tagName'], text=True))
    if release != dict(isDraft=False, isPrerelease=False, tagName=metadata['tag']):
        raise ValueError('Production requires a published non-prerelease')
    with tempfile.TemporaryDirectory() as temp:
        downloaded = Path(temp)
        subprocess.run(['gh', 'release', 'download', metadata['tag'], '--repo', metadata['repository'], '--dir', temp], check=True)
        verify(downloaded)
        if any(p.read_bytes() != (downloaded / p.name).read_bytes() for p in output.iterdir()):
            raise ValueError('Published release differs from the verified build')
    files = runtime_files(output, metadata)
    with tempfile.TemporaryDirectory() as temp:
        askpass = Path(temp) / 'askpass'
        askpass.write_text('#!/bin/sh\ncase "$1" in\n*Username*) printf "%s\\n" x-access-token ;;\n*Password*) printf "%s\\n" "$GH_TOKEN" ;;\n*) exit 1 ;;\nesac\n')
        askpass.chmod(0o700)
        env = dict(os.environ, GIT_ASKPASS=str(askpass), GIT_TERMINAL_PROMPT='0')
        if not env.get('GH_TOKEN'):
            raise ValueError('Scoped workflow token required')
        return update_branch(metadata, files, 'https://github.com/' + metadata['repository'] + '.git', lambda: verify_remote_tag(metadata), git_env=env)


if __name__ == '__main__':
    parser = argparse.ArgumentParser(description=__doc__)
    parser.add_argument('--output', type=Path, default=Path('.release-output'))
    args = parser.parse_args()
    try:
        print(json.dumps(promote(args.output.resolve()), sort_keys=True))
    except (ValueError, OSError, subprocess.CalledProcessError):
        # Never print a remote's raw diagnostics or an authentication environment.
        print('Production update refused; existing branch retained unless the push already completed. Inspect the job/release receipt before retrying.', file=sys.stderr)
        raise SystemExit(1)
