<?php
if (wp_get_environment_type() !== 'local' || get_current_blog_id() !== 5 || DOMAIN_CURRENT_SITE !== 'mylifesite2026.test') throw new RuntimeException('Local /testing/ only');
if (get_option('flexline_phase5_floorplan_fixture')) {echo wp_json_encode(get_option('flexline_phase5_floorplan_fixture'));return;}
$images=get_posts(['post_type'=>'attachment','post_mime_type'=>'image','posts_per_page'=>2,'fields'=>'ids']);
if (!$images) throw new RuntimeException('Existing demo media required');
$ids=[];$terms=[];
foreach(['Cedar','Maple'] as $i=>$name){
 $term=wp_insert_term('Phase 5 '.$name,'floor_plan_taxonomy',['slug'=>'phase5-'.strtolower($name)]);
 if(is_wp_error($term))throw new RuntimeException($term->get_error_message());
 $terms[]=$term['term_id'];
 $id=wp_insert_post(['post_type'=>'floor_plan','post_status'=>'publish','post_title'=>'Phase 5 '.$name]);
 foreach(['_fp_beds'=>1+$i,'_fp_baths'=>1,'_fp_square_feet'=>800+$i*200,'_fp_number_available'=>1,'_fp_starting_price'=>2000+$i*500,'_fp_description'=>'Synthetic regression floor plan','_fp_image_floor_plan_2d'=>$images[0],'_fp_image_floor_plan_3d'=>$images[1]??$images[0]] as $k=>$v)update_post_meta($id,$k,$v);
 wp_set_object_terms($id,[$term['term_id']],'floor_plan_taxonomy');$ids[]=$id;
}
$attrs=['listPatternSlug'=>'web4sl-advanced-floor-plans/fp-card-list','panelPatternSlug'=>'web4sl-advanced-floor-plans/fp-detail-panel','showFrontendSort'=>true,'tabs'=>[['slug'=>'phase5-cedar'],['slug'=>'phase5-maple']]];
$page=wp_insert_post(['post_type'=>'page','post_status'=>'publish','post_title'=>'Phase 5 — floorplans','post_name'=>'phase5-floorplans','post_content'=>'<!-- wp:web4sl/advanced-floor-plans '.wp_json_encode($attrs).' /-->']);
$data=['records'=>$ids,'terms'=>$terms,'page'=>$page,'url'=>get_permalink($page)];update_option('flexline_phase5_floorplan_fixture',$data);echo wp_json_encode($data,JSON_PRETTY_PRINT);
