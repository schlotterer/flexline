<?php
$_SERVER['HTTP_HOST']='127.0.0.1:8795';require '/var/www/html/wp-load.php';
if(DB_HOST!=='phase5-conditional-db')throw new RuntimeException('Disposable only');
update_option('web4sl_enable_comparison',1);
foreach(['paginated','infinite'] as $mode){
 $attrs=['showMap'=>true,'showList'=>true,'showFilters'=>true,'showFilterSearch'=>true,'listPerPage'=>2,'listNavigationMode'=>$mode,'enableComparison'=>true,'comparisonTableEnabled'=>true,'cardPatternSlug'=>'web4sl-location-sync/directory-card-grid','popoverPatternSlug'=>'web4sl-location-sync/directory-card-popover','comparisonPatternSlug'=>'web4sl-location-sync/directory-card-comparison'];
 $id=wp_insert_post(['post_type'=>'page','post_status'=>'publish','post_title'=>'Phase 5 shipped locations '.$mode,'post_name'=>'phase5-shipped-locations-'.$mode,'post_content'=>'<!-- wp:web4sl/location-map '.wp_json_encode($attrs).' /-->']);echo $id.' '.get_permalink($id)."\n";
}
