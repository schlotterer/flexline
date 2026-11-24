<?php
$_SERVER['HTTP_HOST']='127.0.0.1:8795';require '/var/www/html/wp-load.php';if(DB_HOST!=='phase5-conditional-db')exit(1);
require_once ABSPATH.'wp-admin/includes/image.php';
$ids=[];foreach(['2d','3d'] as $kind){$upload=wp_upload_bits('phase5-'.$kind.'.png',null,file_get_contents(get_template_directory().'/screenshot.png'));$id=wp_insert_attachment(['post_title'=>'Synthetic '.$kind.' fixture','post_mime_type'=>'image/png','post_status'=>'inherit'],$upload['file']);wp_update_attachment_metadata($id,wp_generate_attachment_metadata($id,$upload['file']));$ids[$kind]=$id;}
foreach(get_option('phase5_seeded')['floorplans'] as $id){update_post_meta($id,'_fp_image_floor_plan_2d',$ids['2d']);update_post_meta($id,'_fp_image_floor_plan_3d',$ids['3d']);}echo wp_json_encode($ids),"\n";
