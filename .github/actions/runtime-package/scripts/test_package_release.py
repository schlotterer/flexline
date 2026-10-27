import importlib.util
import json
from pathlib import Path
import subprocess
import tempfile
import unittest
from unittest.mock import patch
import os
import shutil
import zipfile

spec = importlib.util.spec_from_file_location('release', Path(__file__).with_name('package_release.py'))
r = importlib.util.module_from_spec(spec)
spec.loader.exec_module(r)


class Releases(unittest.TestCase):
    def setUp(self):
        self.tmp = tempfile.TemporaryDirectory()
        self.addCleanup(self.tmp.cleanup)
        self.root = Path(self.tmp.name) / 'repo'
        self.root.mkdir()
        self.out = Path(self.tmp.name) / 'out'
        (self.root / 'example.php').write_text('<?php\n/**\n * Version: 1.2.3\n */\n')
        self.config = {'slug': 'example', 'repository': 'schlotterer/example', 'type': 'plugin', 'entry': 'example.php', 'include': ['example.php'], 'required': ['example.php'], 'checks': [['php', '-l', 'example.php']], 'compatibility': {'recovery': 'Reinstall previous tested ZIP'}}
        self.save()
        for args in (['init', '-b', 'main'], ['config', 'user.email', 'fixture@example.test'], ['config', 'user.name', 'Fixture'], ['add', '.'], ['commit', '-m', 'fixture'], ['tag', 'v1.2.3'], ['update-ref', 'refs/remotes/origin/main', 'HEAD']):
            subprocess.run(['git', *args], cwd=self.root, check=True, capture_output=True)

    def save(self):
        (self.root / 'release-package.json').write_text(json.dumps(self.config))

    def test_valid_archive_and_reproducible_bytes(self):
        r.build(self.root, self.out, tag='v1.2.3')
        other = self.out.with_name('other')
        r.build(self.root, other, tag='v1.2.3')
        self.assertEqual((self.out / 'example-1.2.3.zip').read_bytes(), (other / 'example-1.2.3.zip').read_bytes())
        self.assertEqual(r.verify(self.out)['commit'], r.run(['git', 'rev-parse', 'HEAD'], self.root))
        with zipfile.ZipFile(self.out / 'example-1.2.3.zip') as z:
            self.assertEqual(z.namelist(), ['example/example.php'])

    def test_existing_output_refused(self):
        self.out.mkdir()
        with self.assertRaises(ValueError): r.build(self.root, self.out)

    def test_bad_tag_or_version_refused(self):
        for tag in ('main', 'v01.2.3', 'v1.2.4', 'v1.2.3-beta'):
            with self.subTest(tag=tag), self.assertRaises(ValueError):
                r.build(self.root, self.out, tag=tag)

    def test_version_mismatch_refused(self):
        (self.root / 'package.json').write_text('{"version":"0.0.1"}')
        with self.assertRaises(ValueError): r.build(self.root, self.out)

    def test_missing_runtime_file_refused(self):
        self.config['required'].append('missing.js'); self.save()
        with self.assertRaises(ValueError): r.build(self.root, self.out)

    def test_symlink_refused(self):
        (self.root / 'example.php').unlink()
        (self.root / 'example.php').symlink_to('/etc/hosts')
        with self.assertRaises(ValueError): r.build(self.root, self.out)

    def test_path_escape_refused(self):
        self.config['include'] = ['../secret']; self.save()
        with self.assertRaises(ValueError): r.build(self.root, self.out)

    def test_tamper_refused(self):
        r.build(self.root, self.out)
        with (self.out / 'example-1.2.3.zip').open('ab') as f: f.write(b'tampered')
        with self.assertRaises(ValueError): r.verify(self.out)

    def test_extra_asset_refused(self):
        r.build(self.root, self.out)
        (self.out / 'secret').write_text('not allowed')
        with self.assertRaises(ValueError): r.verify(self.out)

    def test_missing_block_asset_refused(self):
        p = self.root / 'build'; p.mkdir()
        (p / 'block.json').write_text('{"viewScript":"file:./view.js"}')
        self.config['include'].append('build'); self.save()
        with self.assertRaises(ValueError): r.build(self.root, self.out)

    def test_block_parent_reference_inside_package_is_valid(self):
        p = self.root / 'build/blocks/example'; p.mkdir(parents=True)
        (p / 'block.json').write_text('{"render":"file:../../../includes/render.php"}')
        inc = self.root / 'includes'; inc.mkdir()
        (inc / 'render.php').write_text('<?php // fixture')
        self.config['include'] += ['build', 'includes']; self.save()
        r.build(self.root, self.out)
        r.verify(self.out)

    def test_block_parent_reference_cannot_escape_package(self):
        p = self.root / 'build'; p.mkdir()
        (p / 'block.json').write_text('{"render":"file:../../secret.php"}')
        self.config['include'].append('build'); self.save()
        with self.assertRaises(ValueError): r.build(self.root, self.out)

    def test_finder_metadata_is_omitted(self):
        assets = self.root / 'assets'; assets.mkdir()
        (assets / '.DS_Store').write_bytes(b'finder')
        (assets / 'view.js').write_text('// runtime')
        self.config['include'].append('assets'); self.save()
        r.build(self.root, self.out)
        self.assertNotIn('assets/.DS_Store', r.verify(self.out)['files'])

    def test_whole_missing_compiled_block_refused(self):
        p = self.root / 'src/blocks/example'; p.mkdir(parents=True)
        (p / 'block.json').write_text('{}')
        with self.assertRaises(ValueError): r.build(self.root, self.out)

    def test_unexpected_source_rewrite_refused(self):
        (self.root / 'example.php').write_text('changed')
        with self.assertRaises(ValueError): r.check_source(self.root, self.config)

    def test_preview_publication_refused_without_network(self):
        r.build(self.root, self.out)
        with self.assertRaises(ValueError): r.publish(self.out)

    def publish_context(self):
        return {'GITHUB_REPOSITORY': 'schlotterer/example', 'GITHUB_SHA': r.run(['git', 'rev-parse', 'HEAD'], self.root), 'GITHUB_REF': 'refs/tags/v1.2.3'}

    def test_unchecked_tag_publication_refused(self):
        r.build(self.root, self.out, tag='v1.2.3')
        with patch.dict(os.environ, self.publish_context()), self.assertRaises(ValueError):
            r.publish(self.out)

    def test_existing_release_never_overwritten(self):
        r.build(self.root, self.out, execute=True, tag='v1.2.3')
        with patch.dict(os.environ, self.publish_context()), patch.object(r.subprocess, 'run', return_value=subprocess.CompletedProcess([], 0)) as call:
            with self.assertRaises(ValueError): r.publish(self.out)
            self.assertEqual(call.call_count, 1)
            self.assertEqual(call.call_args[0][0][:3], ['gh', 'release', 'view'])

    def test_publication_only_after_download_verification(self):
        r.build(self.root, self.out, execute=True, tag='v1.2.3')
        commands = []
        def fake_run(args, **kwargs):
            commands.append(args)
            if args[:3] == ['gh', 'release', 'view']:
                return subprocess.CompletedProcess(args, 1)
            if args[:3] == ['gh', 'release', 'download']:
                target = Path(args[args.index('--dir') + 1])
                for f in self.out.iterdir(): shutil.copyfile(f, target / f.name)
            return subprocess.CompletedProcess(args, 0)
        context = self.publish_context()
        with patch.dict(os.environ, context), patch.object(r.subprocess, 'run', side_effect=fake_run), patch.object(r.subprocess, 'check_output', return_value=json.dumps({'object': {'type': 'commit', 'sha': context['GITHUB_SHA']}})):
            r.publish(self.out)
        self.assertEqual(commands[-1][:3], ['gh', 'release', 'edit'])
        self.assertIn('--draft=false', commands[-1])

    def test_upload_mismatch_leaves_draft(self):
        r.build(self.root, self.out, execute=True, tag='v1.2.3')
        commands = []
        def fake_run(args, **kwargs):
            commands.append(args)
            if args[:3] == ['gh', 'release', 'view']: return subprocess.CompletedProcess(args, 1)
            if args[:3] == ['gh', 'release', 'download']:
                target = Path(args[args.index('--dir') + 1])
                for f in self.out.iterdir(): shutil.copyfile(f, target / f.name)
                (target / 'SHA256SUMS').write_text('corrupt')
            return subprocess.CompletedProcess(args, 0)
        context = self.publish_context()
        with patch.dict(os.environ, context), patch.object(r.subprocess, 'run', side_effect=fake_run), patch.object(r.subprocess, 'check_output', return_value=json.dumps({'object': {'type': 'commit', 'sha': context['GITHUB_SHA']}})):
            with self.assertRaises(ValueError): r.publish(self.out)
        self.assertFalse(any(args[:3] == ['gh', 'release', 'edit'] for args in commands))

    def test_remote_tag_movement_blocks_draft_creation(self):
        r.build(self.root, self.out, execute=True, tag='v1.2.3')
        commands = []
        def fake_run(args, **kwargs):
            commands.append(args)
            return subprocess.CompletedProcess(args, 1 if args[:3] == ['gh', 'release', 'view'] else 0)
        context = self.publish_context()
        with patch.dict(os.environ, context), patch.object(r.subprocess, 'run', side_effect=fake_run), patch.object(r.subprocess, 'check_output', return_value=json.dumps({'object': {'type': 'commit', 'sha': '0' * 40}})):
            with self.assertRaises(ValueError): r.publish(self.out)
        self.assertFalse(any(args[:3] == ['gh', 'release', 'create'] for args in commands))

    def test_remote_tag_movement_during_upload_keeps_draft(self):
        r.build(self.root, self.out, execute=True, tag='v1.2.3')
        commands = []
        def fake_run(args, **kwargs):
            commands.append(args)
            if args[:3] == ['gh', 'release', 'view']: return subprocess.CompletedProcess(args, 1)
            if args[:3] == ['gh', 'release', 'download']:
                target = Path(args[args.index('--dir') + 1])
                for f in self.out.iterdir(): shutil.copyfile(f, target / f.name)
            return subprocess.CompletedProcess(args, 0)
        context = self.publish_context()
        with patch.dict(os.environ, context), patch.object(r.subprocess, 'run', side_effect=fake_run), patch.object(r.subprocess, 'check_output', side_effect=[json.dumps({'object': {'type': 'commit', 'sha': sha}}) for sha in (context['GITHUB_SHA'], '0' * 40)]):
            with self.assertRaises(ValueError): r.publish(self.out)
        self.assertFalse(any(args[:3] == ['gh', 'release', 'edit'] for args in commands))

    def test_root_path_not_a_runtime_allowlist_entry(self):
        self.config['include'] = ['.']; self.save()
        with self.assertRaises(ValueError): r.build(self.root, self.out)

    def test_exact_annotated_tag_namespace_is_resolved(self):
        context = self.publish_context()
        metadata = {'repository': 'schlotterer/example', 'tag': 'v1.2.3', 'commit': context['GITHUB_SHA']}
        responses = [json.dumps({'object': {'type': 'tag', 'sha': '1' * 40}}), json.dumps({'object': {'type': 'commit', 'sha': context['GITHUB_SHA']}})]
        with patch.object(r.subprocess, 'check_output', side_effect=responses) as call:
            r.verify_remote_tag(metadata)
        self.assertIn('repos/schlotterer/example/git/ref/tags/v1.2.3', call.call_args_list[0][0][0])
        self.assertIn('repos/schlotterer/example/git/tags/' + '1' * 40, call.call_args_list[1][0][0])

    def test_remote_tag_cannot_point_to_a_tree(self):
        metadata = {'repository': 'schlotterer/example', 'tag': 'v1.2.3', 'commit': '2' * 40}
        with patch.object(r.subprocess, 'check_output', return_value=json.dumps({'object': {'type': 'tree', 'sha': '1' * 40}})):
            with self.assertRaises(ValueError): r.verify_remote_tag(metadata)

    def test_tag_off_main_refused(self):
        subprocess.run(['git', 'checkout', '--orphan', 'other'], cwd=self.root, check=True, capture_output=True)
        subprocess.run(['git', 'commit', '-m', 'unrelated'], cwd=self.root, check=True, capture_output=True)
        subprocess.run(['git', 'tag', '-f', 'v1.2.3'], cwd=self.root, check=True, capture_output=True)
        with self.assertRaises(subprocess.CalledProcessError): r.build(self.root, self.out, tag='v1.2.3')


if __name__ == '__main__': unittest.main()
