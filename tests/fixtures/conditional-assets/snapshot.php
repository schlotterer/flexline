<?php
$_SERVER['HTTP_HOST']='127.0.0.1:8795';require '/var/www/html/wp-load.php';
if(DB_HOST!=='phase5-conditional-db')throw new RuntimeException('Disposable database required');
$ids=get_option('phase5_seeded');$data=[];foreach(array_merge($ids['locations'],$ids['floorplans'],array_values($ids['pages'])) as $id){$p=get_post($id);$meta=get_post_meta($id);unset($meta['_edit_lock'],$meta['_edit_last']);$data[]=[$id,$p->post_title,$p->post_content,$p->post_status,$meta];}
echo hash('sha256',wp_json_encode($data)),"\n";
