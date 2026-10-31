"""Real Git publication against local bare remotes; GitHub calls are mocked."""
import json
import os
from pathlib import Path
import subprocess
import tempfile
import unittest
from unittest.mock import patch
import zipfile

import package_release as release
import production_branch as production


class Production(unittest.TestCase):
    def setUp(self):
        self.temp = tempfile.TemporaryDirectory()
        self.addCleanup(self.temp.cleanup)
        self.base = Path(self.temp.name)
        self.source = self.base / 'source'
        self.source.mkdir()
        self.remote = self.base / 'remote.git'
        self.git('init', '-b', 'main')
        self.git('config', 'user.name', 'Fixture')
        self.git('config', 'user.email', 'fixture@example.invalid')
        subprocess.run(['git', 'init', '--bare', '--quiet', str(self.remote)], check=True)
        self.git('remote', 'add', 'origin', str(self.remote))
        self.number = 0
        self.make_release('1.2.3', {'example.php': b'<?php // runtime\n', 'assets/runtime.js': b'// runtime\n', 'obsolete.php': b'<?php // prior file\n'})

    def git(self, *args):
        return subprocess.check_output(['git', *args], cwd=self.source, stderr=subprocess.PIPE).decode().strip()

    def ref(self):
        value = subprocess.run(['git', '--git-dir', str(self.remote), 'rev-parse', '--verify', production.BRANCH], capture_output=True, text=True)
        return value.stdout.strip() if value.returncode == 0 else None

    def make_release(self, version, files):
        self.number += 1
        (self.source / 'version').write_text(version)
        self.git('add', '.'); self.git('commit', '-m', 'Version ' + version)
        self.git('tag', 'v' + version); self.git('push', '--quiet', 'origin', 'main', 'refs/tags/v' + version)
        self.files = files
        self.metadata = dict(schema=1, package='example', type='plugin', version=version, repository='fixture/example',
            commit=self.git('rev-parse', 'HEAD'), tag='v' + version, checks_passed=True, archive='example-' + version + '.zip', files={n:release.digest(v) for n,v in files.items()})
        self.output = self.base / ('output-' + str(self.number)); self.output.mkdir()
        with zipfile.ZipFile(self.output / self.metadata['archive'], 'w') as z:
            for name, content in files.items():
                info = zipfile.ZipInfo('example/' + name); info.external_attr = 0o100644 << 16
                z.writestr(info, content)
        self.metadata['sha256'] = release.digest((self.output / self.metadata['archive']).read_bytes())
        self.write_metadata()

    def write_metadata(self):
        (self.output / 'release.json').write_text(json.dumps(self.metadata))
        (self.output / 'SHA256SUMS').write_text(''.join(release.digest((self.output / name).read_bytes()) + '  ' + name + '\n' for name in [self.metadata['archive'], 'release.json']))

    def update(self, before=lambda: None):
        return production.update_branch(self.metadata, production.runtime_files(self.output, release.verify(self.output)), str(self.remote), before)

    def test_branch_root_matches_zip_and_deployer_style_archive(self):
        before_main = self.git('rev-parse', 'HEAD')
        result = self.update()
        self.assertEqual(result['status'], 'updated')
        archive = self.base / 'branch.zip'
        subprocess.run(['git', '--git-dir', str(self.remote), 'archive', '--format=zip', '--output='+str(archive), production.BRANCH], check=True)
        with zipfile.ZipFile(archive) as z:
            contents = {n:z.read(n) for n in z.namelist() if not n.endswith('/')}
        self.assertEqual(contents, self.files)
        self.assertEqual(self.git('rev-parse', 'HEAD'), before_main)
        self.assertNotIn('release.json', contents)

    def test_repeat_is_noop_without_new_commit(self):
        first = self.update(); second = self.update()
        self.assertEqual(second['status'], 'unchanged')
        self.assertEqual(first['commit'], second['commit'])

    def test_upgrade_removes_obsolete_files_and_retains_recovery_tree(self):
        old_files = self.files.copy(); old = self.update()['commit']
        self.make_release('1.2.4', {'example.php': b'<?php // upgraded\n', 'new.php': b'<?php // added\n'})
        new = self.update()
        parent = subprocess.check_output(['git', '--git-dir', str(self.remote), 'rev-parse', new['commit']+'^']).decode().strip()
        self.assertEqual(parent, old)
        self.assertNotIn('obsolete.php', subprocess.check_output(['git', '--git-dir', str(self.remote), 'ls-tree', '-r', '--name-only', new['commit']]).decode())
        for name, content in old_files.items():
            self.assertEqual(subprocess.check_output(['git', '--git-dir', str(self.remote), 'show', old+':'+name]), content)

    def test_late_old_release_cannot_replace_newer_branch(self):
        old_metadata, old_output = self.metadata.copy(), self.output
        self.update(); self.make_release('1.2.4', self.files); self.update(); current = self.ref()
        self.metadata, self.output = old_metadata, old_output
        with self.assertRaises(ValueError): self.update()
        self.assertEqual(self.ref(), current)

    def test_different_bytes_for_same_version_are_refused(self):
        self.update(); current = self.ref(); self.metadata['sha256'] = '0'*64
        with self.assertRaises(ValueError):
            production.update_branch(self.metadata, self.files, str(self.remote), lambda:None)
        self.assertEqual(self.ref(), current)

    def test_unmanaged_production_is_not_overwritten(self):
        self.git('push', '--quiet', 'origin', 'HEAD:refs/heads/production'); current = self.ref()
        with self.assertRaises(ValueError): self.update()
        self.assertEqual(self.ref(), current)

    def test_tag_movement_guard_prevents_push(self):
        def moved():raise ValueError('tag moved')
        with self.assertRaises(ValueError): self.update(moved)
        self.assertIsNone(self.ref())

    def test_racing_writer_preserved(self):
        old = self.update()['commit']; self.make_release('1.2.4', self.files)
        competing = self.git('rev-parse', 'HEAD')
        def race():
            # Simulate a separately privileged writer replacing the remote ref.
            subprocess.run(['git', '--git-dir', str(self.remote), 'update-ref', production.BRANCH, competing, old], check=True)
        with self.assertRaises(ValueError): self.update(race)
        self.assertEqual(self.ref(), competing)

    def test_failed_push_retains_branch(self):
        old = self.update()['commit']; self.make_release('1.2.4', self.files)
        hook = self.remote / 'hooks/pre-receive'
        hook.write_text('#!/bin/sh\nexit 1\n');hook.chmod(0o700)
        with self.assertRaises(subprocess.CalledProcessError): self.update()
        self.assertEqual(self.ref(), old)

    def test_tag_off_main_is_refused(self):
        self.git('checkout', '--orphan', 'unrelated'); self.git('commit', '-m', 'Unrelated')
        self.git('push', '--quiet', 'origin', 'HEAD:refs/heads/unrelated')
        self.metadata['commit'] = self.git('rev-parse', 'HEAD')
        with self.assertRaises(subprocess.CalledProcessError):
            production.update_branch(self.metadata, self.files, str(self.remote), lambda:None)
        self.assertIsNone(self.ref())

    def test_no_context_or_preview_can_reach_git(self):
        with patch.dict(os.environ, {}, clear=True), patch.object(production, 'update_branch') as update:
            with self.assertRaises(ValueError):production.promote(self.output)
            update.assert_not_called()
        self.metadata['tag'] = None;self.write_metadata()
        with self.assertRaises(ValueError):production.context(self.metadata)

    def test_tampered_zip_refused_before_remote_access(self):
        with (self.output/self.metadata['archive']).open('ab') as f:f.write(b'tampered')
        with patch.object(production, 'verify_remote_tag') as remote:
            with self.assertRaises(ValueError):production.promote(self.output)
            remote.assert_not_called()

    def test_draft_release_never_reaches_git(self):
        env=dict(GITHUB_REPOSITORY='fixture/example',GITHUB_SHA=self.metadata['commit'],GITHUB_REF='refs/tags/'+self.metadata['tag'],GITHUB_EVENT_NAME='push')
        with patch.dict(os.environ,env),patch.object(production,'verify_remote_tag'),patch.object(production.subprocess,'check_output',return_value=json.dumps(dict(isDraft=True,isPrerelease=False,tagName=self.metadata['tag']))),patch.object(production,'update_branch') as update:
            with self.assertRaises(ValueError):production.promote(self.output)
            update.assert_not_called()

    def test_full_promotion_checks_published_bytes_and_tag_before_git(self):
        env=dict(GITHUB_REPOSITORY='fixture/example',GITHUB_SHA=self.metadata['commit'],GITHUB_REF='refs/tags/'+self.metadata['tag'],GITHUB_EVENT_NAME='push',GH_TOKEN='synthetic-token')
        def download(args,**kwargs):
            import shutil
            self.assertEqual(args[:3],['gh','release','download'])
            for p in self.output.iterdir():shutil.copyfile(p,Path(args[args.index('--dir')+1])/p.name)
        def update(metadata,files,remote,guard,**kwargs):
            self.assertEqual(files,self.files);self.assertNotIn('synthetic-token',remote)
            self.assertEqual(Path(kwargs['git_env']['GIT_ASKPASS']).stat().st_mode & 0o777,0o700)
            guard();return {'status':'updated'}
        with patch.dict(os.environ,env),patch.object(production,'verify_remote_tag') as tag,patch.object(production.subprocess,'check_output',return_value=json.dumps(dict(isDraft=False,isPrerelease=False,tagName=self.metadata['tag']))),patch.object(production.subprocess,'run',side_effect=download),patch.object(production,'update_branch',side_effect=update):
            self.assertEqual(production.promote(self.output),{'status':'updated'})
            self.assertEqual(tag.call_count,2)


    def test_missing_published_release_never_reaches_git(self):
        env=dict(GITHUB_REPOSITORY='fixture/example',GITHUB_SHA=self.metadata['commit'],GITHUB_REF='refs/tags/'+self.metadata['tag'],GITHUB_EVENT_NAME='push')
        with patch.dict(os.environ,env),patch.object(production,'verify_remote_tag'),patch.object(production.subprocess,'check_output',side_effect=subprocess.CalledProcessError(1,['gh','release','view'])),patch.object(production,'update_branch') as update:
            with self.assertRaises(subprocess.CalledProcessError):production.promote(self.output)
            update.assert_not_called()

    def test_published_asset_tampering_never_reaches_git(self):
        env=dict(GITHUB_REPOSITORY='fixture/example',GITHUB_SHA=self.metadata['commit'],GITHUB_REF='refs/tags/'+self.metadata['tag'],GITHUB_EVENT_NAME='push')
        def download(args,**kwargs):
            import shutil
            target=Path(args[args.index('--dir')+1])
            for p in self.output.iterdir():shutil.copyfile(p,target/p.name)
            (target/self.metadata['archive']).write_bytes(b'tampered published asset')
        with patch.dict(os.environ,env),patch.object(production,'verify_remote_tag'),patch.object(production.subprocess,'check_output',return_value=json.dumps(dict(isDraft=False,isPrerelease=False,tagName=self.metadata['tag']))),patch.object(production.subprocess,'run',side_effect=download),patch.object(production,'update_branch') as update:
            with self.assertRaises(ValueError):production.promote(self.output)
            update.assert_not_called()

    def test_manual_dispatch_cannot_promote_a_tag(self):
        env=dict(GITHUB_REPOSITORY='fixture/example',GITHUB_SHA=self.metadata['commit'],GITHUB_REF='refs/tags/'+self.metadata['tag'],GITHUB_EVENT_NAME='workflow_dispatch')
        with patch.dict(os.environ,env),patch.object(production,'update_branch') as update:
            with self.assertRaises(ValueError):production.promote(self.output)
            update.assert_not_called()

if __name__ == '__main__': unittest.main()
