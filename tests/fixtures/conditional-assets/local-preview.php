<?php
/** Local-only Phase 5 branch preview. Remove this file to restore normal package resolution. */
if ( ! defined('ABSPATH') || wp_get_environment_type() !== 'local' || get_current_blog_id() !== 5 ) return;
if ( ! defined('DOMAIN_CURRENT_SITE') || DOMAIN_CURRENT_SITE !== 'mylifesite2026.test' ) return;
$phase5_folder = isset($_GET['phase5_release']) ? 'flexline-phase5-release' : 'flexline-phase5-source';
$phase5_base = __DIR__.'/'.$phase5_folder;
$phase5_base_uri = content_url('/mu-plugins/'.$phase5_folder);
$phase5_root = $phase5_base.'/flexline';
$phase5_uri = $phase5_base_uri.'/flexline';
register_theme_directory(WP_CONTENT_DIR.'/themes');
register_theme_directory($phase5_base);
add_filter('pre_option_template_root',static fn()=>$phase5_base);
add_filter('pre_option_stylesheet_root',static fn()=>WP_CONTENT_DIR.'/themes');
foreach (['template_directory','stylesheet_directory'] as $filter) {
 add_filter($filter, static fn($path,$slug) => $slug === 'flexline' ? $phase5_root : $path, 99, 2);
}
foreach (['template_directory_uri','stylesheet_directory_uri'] as $filter) {
 add_filter($filter, static fn($uri,$slug) => $slug === 'flexline' ? $phase5_uri : $uri, 99, 2);
}
add_filter('theme_root', static fn($root) => $phase5_base, 99);
add_filter('theme_root_uri', static fn($uri) => $phase5_base_uri, 99);
add_filter('site_option_active_sitewide_plugins', static function($plugins) {
 foreach (['web4sl-location-sync/web4sl-location-sync.php','web4sl-advanced-floor-plans/web4sl-advanced-floor-plans.php'] as $plugin) {
  if (isset($plugins[$plugin])) { $plugins['phase5-candidates/'.$plugin]=$plugins[$plugin]; unset($plugins[$plugin]); }
 }
 return $plugins;
});
add_filter('flexline_conditional_component_styles', static fn()=> !isset($_GET['complete']), 999);
add_action('send_headers', static function(){header('X-FlexLine-Phase5: codex-conditional-css-plan');});

// Explicit fixture routes avoid the site's existing primary-term catch-all rule.
add_action('init',static function(){add_rewrite_rule('^phase5-([^/]+)/?$', 'index.php?pagename=phase5-$matches[1]', 'top');},99);
