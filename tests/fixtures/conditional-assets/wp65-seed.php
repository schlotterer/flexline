<?php
$_SERVER['HTTP_HOST']='127.0.0.1:8796';define('WP_INSTALLING',true);require '/var/www/html/wp-load.php';require_once ABSPATH.'wp-admin/includes/upgrade.php';
if(DB_HOST!=='phase5-conditional-db'||DB_NAME!=='phase5_wp65')throw new RuntimeException('Disposable database required');
if(!is_blog_installed())wp_install('Phase 5 WordPress 6.5','phase5-admin','phase5@example.test',false,'','phase5-fixture-password');
update_option('home','http://127.0.0.1:8796');update_option('siteurl','http://127.0.0.1:8796');switch_theme('flexline');
$content='';foreach(['text-link','outline'] as $style)$content.='<!-- wp:button {"className":"is-style-'.$style.' flexline-icon-internal-link"} --><div class="wp-block-button is-style-'.$style.' flexline-icon-internal-link"><a class="wp-block-button__link wp-element-button" href="#">Contact '.$style.'</a></div><!-- /wp:button -->';
$id=wp_insert_post(['post_type'=>'page','post_status'=>'publish','post_title'=>'Minimum-version buttons','post_content'=>$content]);echo "Page $id; WordPress ".get_bloginfo('version')."\n";
