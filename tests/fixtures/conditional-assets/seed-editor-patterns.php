<?php
/** Use unmodified shipped patterns for real editor acceptance. */
$_SERVER['HTTP_HOST'] = '127.0.0.1:8795';
require '/var/www/html/wp-load.php';
if (DB_HOST !== 'phase5-conditional-db' || DB_NAME !== 'wordpress') {
 throw new RuntimeException('Disposable combined-stack database required');
}
$registry = WP_Block_Patterns_Registry::get_instance();
foreach (['flexline/hero-slider', 'flexline/section-timeline-columns'] as $slug) {
 $pattern = $registry->get_registered($slug);
 if (!$pattern || empty($pattern['content'])) throw new RuntimeException('Missing pattern: '.$slug);
 $key = 'phase5_editor_'.sanitize_key($slug);
 $id = wp_insert_post([
  'ID' => (int) get_option($key, 0),
  'post_type' => 'page', 'post_status' => 'draft',
  'post_title' => 'Editor acceptance: '.$slug,
  'post_content' => wp_slash($pattern['content']),
 ], true);
 if (is_wp_error($id)) throw new RuntimeException($id->get_error_message());
 update_option($key, $id);
 echo $slug.': '.$id."\n";
}
