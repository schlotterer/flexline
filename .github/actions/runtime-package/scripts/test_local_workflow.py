"""Exercise the vendored composite entry points and caller trust boundaries."""
import hashlib
import json
import os
from pathlib import Path
import re
import subprocess
import tempfile
import unittest


ACTION = Path(__file__).resolve().parents[1]
ROOT = ACTION.parents[2]


class LocalWorkflow(unittest.TestCase):
    def test_upstream_bytes_have_not_drifted(self):
        receipt = json.loads((ACTION / 'UPSTREAM.json').read_text())
        self.assertEqual(receipt['commit'], '1f74bb9a8bedeebf8744c394c37edb66b3c7ae17')
        for name, expected in receipt['sha256'].items():
            with self.subTest(name=name):
                self.assertEqual(hashlib.sha256((ACTION / name).read_bytes()).hexdigest(), expected)

    def test_local_action_is_excluded_from_runtime_allowlist(self):
        config = json.loads((ROOT / 'release-package.json').read_text())
        for name in config['include']:
            self.assertFalse(name == '.' or name.startswith('.github'))
        self.assertIn('vendor', config['include'])
        self.assertIn('assets/fonts/Montserrat/Montserrat-VariableFont_wght.woff2', config['required'])

    def test_write_jobs_checkout_exact_event_commit_before_artifact_and_action(self):
        workflow = (ROOT / '.github/workflows/release.yml').read_text()
        self.assertNotIn('schlotterer/web4sl-ci@', workflow)
        self.assertEqual(workflow.count('uses: ./.github/actions/runtime-package'), 3)
        jobs = dict(re.findall(r'^  (package|publish|production):\n(.*?)(?=^  \w+:\n|\Z)', workflow, re.M | re.S))
        self.assertEqual(set(jobs), {'package', 'publish', 'production'})
        for job, dependency in [('publish', 'package'), ('production', 'publish')]:
            with self.subTest(job=job):
                text = jobs[job]
                self.assertIn("if: github.event_name == 'push' && startsWith(github.ref, 'refs/tags/')", text)
                self.assertIn('needs: ' + dependency, text)
                self.assertIn('contents: write', text)
                self.assertIn('ref: ${{ github.sha }}', text)
                self.assertIn('persist-credentials: false', text)
                self.assertLess(text.index('uses: actions/checkout@'), text.index('uses: actions/download-artifact@'))
                self.assertLess(text.index('uses: actions/download-artifact@'), text.index('uses: ./.github/actions/runtime-package'))
                self.assertIn('mode: ' + job, text)
                self.assertIn('GH_TOKEN: ${{ github.token }}', text)
        self.assertNotIn('GH_TOKEN:', jobs['package'])
        self.assertNotIn('contents: write', jobs['package'])
        self.assertIn('fetch-depth: 0', jobs['package'])
        self.assertIn('persist-credentials: false', jobs['package'])
        self.assertIn('python3 -B -m unittest discover', jobs['package'])
        self.assertIn('contents: read', workflow.split('jobs:')[0])
        self.assertIn('group: production-${{ github.repository }}', jobs['production'])

    def test_composite_build_passes_tag_only_for_tag_refs(self):
        text = (ACTION / 'action.yml').read_text()
        # Execute the actual multiline Bash step with a recording Python stand-in.
        shell = text.split('      run: |\n', 1)[1].split('    - name:', 1)[0]
        shell = '\n'.join(line[8:] for line in shell.splitlines())
        with tempfile.TemporaryDirectory() as temp:
            temp = Path(temp)
            python = temp / 'python3'
            python.write_text('#!/bin/sh\nprintf "%s\\n" "$@"\n')
            python.chmod(0o700)
            for ref in ['refs/heads/release-2.2.2', 'refs/heads/main', 'refs/pull/7/merge', 'refs/tags/v2.2.2']:
                with self.subTest(ref=ref):
                    env = dict(os.environ, PATH=str(temp) + os.pathsep + os.environ['PATH'],
                               GITHUB_REF=ref, RELEASE_TOOL=str(ACTION / 'scripts/package_release.py'),
                               RELEASE_OUTPUT='output with spaces')
                    args = subprocess.check_output(['bash', '-c', shell], env=env, text=True).splitlines()
                    expected = [env['RELEASE_TOOL'], 'build', '--execute', '--output', 'output with spaces']
                    if ref.startswith('refs/tags/'):
                        expected += ['--tag', 'v2.2.2']
                    self.assertEqual(args, expected)

    def test_action_mode_refuses_unknown_command(self):
        text = (ACTION / 'action.yml').read_text()
        shell = re.search(r"      run: '(\[\[.*\]\])'", text)[1]
        for mode in ['build', 'publish', 'production', 'invalid', 'build; exit 0']:
            result = subprocess.run(['bash', '-c', shell], env=dict(os.environ, RELEASE_MODE=mode))
            self.assertEqual(result.returncode == 0, mode in ['build', 'publish', 'production'])


if __name__ == '__main__':
    unittest.main()
