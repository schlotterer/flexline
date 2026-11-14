<?php
$hooks=[];$enqueued=[];$inlines=[];$env='local';$admin=false;$head=0;$filterMode='';
define('ABSPATH','/fake/');define('WPINC','wp-includes');
function add_filter(...$args){}
function wp_normalize_path($p){return $p;}
function is_admin(){global $admin;return $admin;}
function did_action($name){global $head;return $head;}
function wp_get_environment_type(){global $env;return $env;}
function get_option($k,$d){return $d;}
function apply_filters($k,$v){global $filterMode;return $k==='flexline_conditional_component_styles' && $filterMode==='off'?false:$v;}
function get_theme_file_path($f){return dirname(__DIR__).'/'.$f;}
function get_theme_file_uri($f){return $f;}
function wp_enqueue_style($h,$u,$d,$v){global $enqueued;$enqueued[$h]=[$u,$d];}
function wp_add_inline_style($h,$css){global $inlines;$inlines[$h]=$css;}
eval('namespace FlexLine; function flexline_asset_ver($p){return "test";}');
require get_theme_file_path('inc/component-styles.php');
function reset_state(){global $enqueued,$inlines;$enqueued=[];$inlines=[];unset($GLOBALS['flexline_component_native_canvas'],$GLOBALS['flexline_component_render_seen'],$GLOBALS['flexline_component_requirements']);}
function check($bool,$label){if(!$bool){throw new Exception($label);}echo "PASS $label\n";}
reset_state();FlexLine\flexline_enqueue_component_styles();check($enqueued['flexline-base'][0]==='assets/built/css/app.css','unknown canvas full fallback');
reset_state();FlexLine\flexline_component_template('/fake/wp-includes/template-canvas.php');FlexLine\flexline_collect_component_styles('<p>basic</p>',[]);FlexLine\flexline_enqueue_component_styles();check(count($enqueued)===1 && str_contains($enqueued['flexline-base'][0],'app-conditional'),'native plain page reduced base');check(str_contains($inlines['flexline-base'],'toggle-active'),'global tail retained after base');
reset_state();FlexLine\flexline_component_template('/fake/wp-includes/template-canvas.php');FlexLine\flexline_collect_component_styles('<div class="is-style-horizontal-scroll-at-mobile"><div class="is-style-slider"></div></div>',[]);FlexLine\flexline_enqueue_component_styles();check(count($enqueued)===3,'mobile scroll plus nested slider detected');check($enqueued['flexline-component-slider'][1]===['flexline-base','flexline-component-horizontal-scroll'],'original dependency order');check(isset($inlines['flexline-component-slider']),'tail follows final component');
$env='production';$enqueued=[];FlexLine\flexline_enqueue_component_styles();check($enqueued['flexline-base'][0]==='assets/built/css/app.css','production default full bundle');
$env='local';$filterMode='off';$enqueued=[];FlexLine\flexline_enqueue_component_styles();check($enqueued['flexline-base'][0]==='assets/built/css/app.css','explicit rollback filter');
