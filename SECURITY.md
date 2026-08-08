# FlexLine authentication and security ownership

FlexLine no longer provides an alternate login URL, fallback credentials, strict
login blocking, or custom 2FA behavior. Standard WordPress authentication uses
`/wp-login.php`.

On SiteGround-hosted sites, enforce administrator and editor 2FA through
SiteGround Security Optimizer. On Wordfence-managed sites, use Wordfence Login
Security and require 2FA for administrators, super administrators, and other
privileged editors. The official WordPress Two-Factor plugin is an alternative
only where user enrollment and compliance can be audited operationally.

Do not run overlapping login-security features unnecessarily. Verify password
reset, multisite login, `/wp-admin`, and standard login URLs after deployment.

Before deploying the login-removal migration, inventory sites that still have
`custom_login_enabled=1` in `flexline_utilities` and notify their
administrators. On multisite, review each site with a read-only WP-CLI query
before rollout; the migration removes the five retired keys but does not
redirect the old slug.
