<?php
/** Run with wp eval-file on the explicitly authorized Local /testing/ subsite. */
if (wp_get_environment_type() !== 'local' || get_current_blog_id() !== 5 || DOMAIN_CURRENT_SITE !== 'mylifesite2026.test') {
 throw new RuntimeException('Only mylifesite2026.test/testing/ is authorized');
}
$registry = WP_Block_Patterns_Registry::get_instance();
$slugs = ['components-ctas','components-galleries','components-misc','heroes','modules','sections','template-parts','templates','templates-list-views','templates-starter-content'];
$ids = get_option('flexline_phase5_demo_pages', []);
$report = [];
foreach ($slugs as $suffix) {
 $slug = 'flexline/demo-patterns-'.$suffix;
 $pattern = $registry->get_registered($slug);
 if (!$pattern || empty($pattern['content'])) throw new RuntimeException('Missing '.$slug);
 if (!isset($ids[$suffix])) {
  $id = wp_insert_post(['post_type'=>'page','post_status'=>'publish','post_title'=>'Phase 5 — '.$suffix,'post_name'=>'phase5-'.$suffix,'post_content'=>'<!-- wp:pattern {"slug":"'.$slug.'"} /-->'],true);
  if (is_wp_error($id)) throw new RuntimeException($id->get_error_message());
  $ids[$suffix]=$id;
  update_post_meta($id,'_flexline_phase5_fixture',true);
 }
 $report[$slug]=['id'=>$ids[$suffix],'url'=>get_permalink($ids[$suffix]),'registered_content_sha256'=>hash('sha256',$pattern['content'])];
}
update_option('flexline_phase5_demo_pages',$ids);
$index_id = (int) get_option('flexline_phase5_demo_index', 0);
if (!$index_id) {
 $links = '<!-- wp:paragraph --><p>Local regression pages using the existing FlexLine documentation patterns.</p><!-- /wp:paragraph -->';
 foreach($report as $slug=>$page) $links .= '<!-- wp:paragraph --><p><a href="'.esc_url(add_query_arg('phase5','1',$page['url'])).'">'.esc_html($slug).'</a></p><!-- /wp:paragraph -->';
 $index_id = wp_insert_post(['post_type'=>'page','post_status'=>'publish','post_title'=>'Phase 5 regression demos','post_name'=>'phase5-regression','post_content'=>$links]);
 update_option('flexline_phase5_demo_index',$index_id);
}
echo wp_json_encode(['parent_path'=>get_template_directory(),'child'=>get_stylesheet(),'wordpress'=>get_bloginfo('version'),'pages'=>$report,'index'=>get_permalink($index_id)],JSON_PRETTY_PRINT);
