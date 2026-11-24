<?php
/**
 * Read-only WP-CLI integration probe; run with --skip-themes --skip-plugins.
 * Arguments: theme root, Location Sync main root, Floor Plans main root,
 * existing output directory, and local HTTP URL serving that directory/assets.
 * No posts, options, themes, or plugins are installed or saved by this probe.
 */
if (count($args) < 5) { throw new RuntimeException('Supply theme, plugin roots, output directory and fixture URL.'); }
[$theme, $location_root, $floorplans_root, $output, $fixture_url] = $args;
require $theme.'/inc/scripts.php';
require $theme.'/inc/setup/preload-scripts.php';
remove_action('wp_print_styles','print_emoji_styles');
add_filter('theme_file_path',fn($path,$file)=>$theme.'/'.$file,10,2);
add_filter('theme_file_uri',fn($uri,$file)=>rtrim($fixture_url,'/').'/'.$file,10,2);
add_filter('flexline_conditional_component_styles','__return_true');
// Load source-of-truth plugin files; skip their installed counterparts and theme at CLI bootstrap.
require $location_root.'/web4sl-location-sync.php';
require $floorplans_root.'/web4sl-advanced-floor-plans.php';
Web4SL_Location_Sync\Plugin::register_assets();
Web4SL_Location_Sync\Plugin::register_blocks();
Web4SL_Location_Sync\Plugin::register_block_patterns();
Web4SL_Advanced_Floor_Plans\Plugin::register_blocks();
Web4SL_Advanced_Floor_Plans\Plugin::register_block_patterns();
FlexLine\flexline_register_component_assets();
$slider='<!-- wp:group {"enableSlider":true,"className":"is-style-slider slider-navigation","style":{"dimensions":{"minHeight":"240px"}}} --><div class="wp-block-group is-style-slider slider-navigation" style="--slider-height-default:240px;min-height:240px"><!-- wp:group --><div class="wp-block-group"><h2>First slide</h2></div><!-- /wp:group --><!-- wp:group --><div class="wp-block-group"><h2>Second slide</h2></div><!-- /wp:group --></div><!-- /wp:group -->';
$scroll='<!-- wp:columns {"className":"is-style-horizontal-scroll horizontal-scroller-navigation"} --><div class="wp-block-columns is-style-horizontal-scroll horizontal-scroller-navigation">';
foreach(range(1,6) as $i) $scroll.='<!-- wp:column --><div class="wp-block-column"><p>Card '.$i.'</p></div><!-- /wp:column -->';
$scroll.='</div><!-- /wp:columns -->';
$mobile='<!-- wp:group {"className":"is-style-horizontal-scroll-at-mobile"} --><div class="wp-block-group is-style-horizontal-scroll-at-mobile"><ul><li>First mobile card with content</li><li>Second mobile card with content</li><li>Third mobile card with content</li></ul></div><!-- /wp:group -->';
register_block_pattern('phase2/slider',['title'=>'Probe','content'=>$slider]);
register_block_pattern('phase2/scroll',['title'=>'Probe','content'=>$scroll]);
register_block_pattern('phase2/nested',['title'=>'Probe','content'=>'<!-- wp:pattern {"slug":"phase2/slider"} /-->'.$mobile]);
$report=['wordpress'=>get_bloginfo('version'),'source_files'=>[(new ReflectionClass(Web4SL_Location_Sync\Plugin::class))->getFileName(),(new ReflectionClass(Web4SL_Advanced_Floor_Plans\Plugin::class))->getFileName()],'cases'=>[]];
$fixtures=['plain'=>'<!-- wp:paragraph --><p>Plain page: no feature bundles.</p><!-- /wp:paragraph -->','slider'=>$slider,'scroll'=>$scroll,'mobile'=>$mobile,'both'=>$slider.$scroll,'compatibility'=>$slider.$scroll,'nested'=>'<!-- wp:pattern {"slug":"phase2/nested"} /-->'];
foreach($fixtures as $name=>$markup){
 foreach(array_keys($GLOBALS) as $key) if(str_starts_with($key,'flexline_component_')||$key==='flexline_pattern_assets'||$key==='flexline_pattern_requirements_cache') unset($GLOBALS[$key]);
 wp_styles()->queue=[];wp_styles()->done=[];wp_scripts()->queue=[];wp_scripts()->done=[];
 foreach(['flexline-base','flexline-component-slider','flexline-component-horizontal-scroll'] as $handle) wp_deregister_style($handle);
 foreach(wp_styles()->registered as $style) unset($style->extra['after']);
 FlexLine\flexline_component_template(ABSPATH.WPINC.'/template-canvas.php');
 $html=do_blocks($markup);
 if($name==='compatibility') add_filter('flexline_conditional_component_styles','__return_false',99);
 FlexLine\flexline_enqueue_styles();
 if($name==='compatibility') remove_filter('flexline_conditional_component_styles','__return_false',99);
 $report['cases'][$name]=['delivery'=>$GLOBALS['flexline_component_delivery'],'styles'=>wp_styles()->queue,'scripts'=>wp_scripts()->queue];
 ob_start();wp_print_styles();$css=ob_get_clean();
 ob_start();wp_print_scripts();print_footer_scripts();$js=ob_get_clean();
 file_put_contents($output.'/'.$name.'.html','<!doctype html><html><head><meta name="viewport" content="width=device-width,initial-scale=1"><title>Phase 2 '.$name.'</title>'.$css.'<style>body{margin:24px;--wp--custom--transition-time:.2s;--wp--preset--spacing--medium:12px;--wp--preset--spacing--large:16px;--wp--preset--color--contrast:#123;--wp--preset--color--base:#fff}.is-style-slider>div{background:#d9e9ed;padding:32px}.is-style-slider>div:nth-child(2){background:#f3dabf}.is-style-horizontal-scroll>div{min-width:300px;background:#d9e9ed;margin:12px;padding:24px}</style></head><body><h1>Phase 2 '.$name.'</h1>'.$html.'<script>window.FlexLineCustomizerSearchMenuSettings={};</script>'.$js.'</body></html>');
}
// Empty parent output still declares every configured pattern without rendering any records.
foreach(['location'=>['web4sl/location-map',['cardPatternSlug'=>'phase2/scroll','popoverPatternSlug'=>'phase2/slider','comparisonPatternSlug'=>'phase2/nested']], 'floorplans'=>['web4sl/advanced-floor-plans',['listPatternSlug'=>'phase2/scroll','panelPatternSlug'=>'phase2/slider']]] as $name=>[$block,$attrs]){
 foreach(array_keys($GLOBALS) as $key) if(str_starts_with($key,'flexline_component_')||$key==='flexline_pattern_assets'||$key==='flexline_pattern_requirements_cache') unset($GLOBALS[$key]);
 wp_styles()->queue=[];wp_scripts()->queue=[];
 FlexLine\flexline_component_template(ABSPATH.WPINC.'/template-canvas.php');
 $empty_query = function($posts,$query){ return in_array($query->get('post_type'), ['directory_locations','floor_plan','floor_plans'],true) ? [] : $posts; };
 add_filter('posts_pre_query',$empty_query,10,2);
 $parent_html=render_block(['blockName'=>$block,'attrs'=>$attrs,'innerBlocks'=>[],'innerHTML'=>'','innerContent'=>[]]);
 remove_filter('posts_pre_query',$empty_query,10);
 $report['cases'][$name.'-rendered-bytes']=strlen($parent_html);
 FlexLine\flexline_enqueue_styles();
 $report['cases'][$name.'-empty']=['delivery'=>$GLOBALS['flexline_component_delivery'],'styles'=>wp_styles()->queue,'scripts'=>wp_scripts()->queue];
}
file_put_contents($output.'/runtime.json',wp_json_encode($report,JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES));
foreach (['plain'=>[], 'slider'=>['slider'], 'scroll'=>['horizontal-scroll'], 'mobile'=>['horizontal-scroll-mobile'], 'both'=>['slider','horizontal-scroll'], 'floorplans-empty'=>['slider','horizontal-scroll']] as $case=>$expected) {
 $actual=array_keys($report['cases'][$case]['delivery']['features']);sort($actual);sort($expected);
 if ($actual!==$expected || !$report['cases'][$case]['delivery']['split']) throw new RuntimeException('Unexpected delivery for '.$case);
}
if ($report['cases']['compatibility']['delivery']['split']) throw new RuntimeException('Compatibility mode failed');
if (!isset($report['cases']['location-empty']['delivery']['features']['slider'], $report['cases']['location-empty']['delivery']['features']['horizontal-scroll'])) throw new RuntimeException('Empty map missed configured features');
echo "PASS WordPress component asset probe\n";
