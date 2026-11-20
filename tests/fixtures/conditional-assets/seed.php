<?php
/** Execute only inside the disposable Phase 5 WordPress container. */
$_SERVER['HTTP_HOST']='127.0.0.1:8795';
require '/var/www/html/wp-load.php';
if(DB_HOST!=='phase5-conditional-db')throw new RuntimeException('Disposable database required');
require_once ABSPATH.'wp-admin/includes/plugin.php';
foreach(['web4sl/web4sl.php','web4sl-location-sync/web4sl-location-sync.php','web4sl-advanced-floor-plans/web4sl-advanced-floor-plans.php'] as $plugin){$r=activate_plugin($plugin);if(is_wp_error($r))throw new RuntimeException($r->get_error_message());}
switch_theme('flexline');
update_option('permalink_structure','/%postname%/');flush_rewrite_rules(true);
// Rerun in a fresh PHP process after activation before seeding content.
if(!post_type_exists('floor_plan')){echo "Activated; rerun to seed\n";exit;}
if(get_option('phase5_seeded')){echo wp_json_encode(get_option('phase5_seeded'));exit;}
$ids=[];
foreach(['Cedar','Maple','Willow','Oak'] as $index=>$name){
 $id=wp_insert_post(['post_type'=>'directory_locations','post_status'=>'publish','post_title'=>'Phase 5 '.$name]);
 update_post_meta($id,'location_lat',40+$index*.02);update_post_meta($id,'location_lng',-89+$index*.02);update_post_meta($id,'location_city',$name);$ids['locations'][]=$id;
 $fp=wp_insert_post(['post_type'=>'floor_plan','post_status'=>'publish','post_title'=>'Plan '.$name]);
 update_post_meta($fp,'_fp_beds','2');update_post_meta($fp,'_fp_square_feet',900+$index*100);$ids['floorplans'][]=$fp;
}
$map=['showMap'=>true,'showList'=>true,'listPerPage'=>2,'listNavigationMode'=>'pagination','cardPatternSlug'=>'phase5/location-card','popoverPatternSlug'=>'phase5/location-popover','enableComparison'=>true,'comparisonPatternSlug'=>'phase5/location-card','comparisonTableEnabled'=>true];
$floor=['listPatternSlug'=>'phase5/floor-list','panelPatternSlug'=>'phase5/floor-panel'];
$pages=['plain'=>'<!-- wp:paragraph --><p>Plain acceptance page</p><!-- /wp:paragraph -->','slider'=>'<!-- wp:pattern {"slug":"phase5/slider"} /-->','scroll'=>'<!-- wp:pattern {"slug":"phase5/scroll"} /-->','both'=>'<!-- wp:pattern {"slug":"phase5/slider"} /--><!-- wp:pattern {"slug":"phase5/scroll"} /-->','locations'=>'<!-- wp:web4sl/location-map '.wp_json_encode($map).' /-->','floorplans'=>'<!-- wp:web4sl/advanced-floor-plans '.wp_json_encode($floor).' /-->'];
foreach($pages as $name=>$content){$id=wp_insert_post(['post_type'=>'page','post_status'=>'publish','post_title'=>'Phase 5 '.$name,'post_name'=>'phase5-'.$name,'post_content'=>$content]);$ids['pages'][$name]=$id;}
update_option('phase5_seeded',$ids);echo wp_json_encode($ids,JSON_PRETTY_PRINT),"\n";
