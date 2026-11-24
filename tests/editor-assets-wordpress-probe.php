<?php
/** Read-only WP-CLI probe: theme root, output directory, fixture base URL. */
[$theme,$output,$url]=$args;
require_once ABSPATH.'wp-admin/includes/screen.php';
require_once ABSPATH.'wp-admin/includes/class-wp-screen.php';
add_filter('theme_file_path',fn($path,$file)=>$theme.'/'.$file,10,2);
add_filter('theme_file_uri',fn($uri,$file)=>$url.'/'.$file,10,2);
require $theme.'/inc/scripts.php';
require $theme.'/inc/setup/theme.php';
require $theme.'/inc/blocks/styles.php';
FlexLine\flexline_setup();
FlexLine\flexline_register_block_styles();
$editor_css=get_block_editor_theme_styles();
foreach(['app.css','editor.css','modal.css'] as $file){
 if(!array_filter($editor_css,fn($item)=>str_ends_with($item['baseURL']??'',$file)))throw new RuntimeException('Missing canvas CSS '.$file);
}
set_current_screen('site-editor');get_current_screen()->is_block_editor(true);
wp_styles();wp_scripts();
$assets=_wp_get_iframed_editor_assets();
foreach(['flexline-scroll-admin-js','flexline-slider-admin-js','flexline-editor-css'] as $id){
 if(!str_contains($assets['scripts'].$assets['styles'],$id))throw new RuntimeException('Missing iframe asset '.$id);
}
file_put_contents($output.'/iframe-assets.html',$assets['styles'].$assets['scripts']);
// The same callback serves non-iframed editors, but must leave other admin pages alone.
wp_scripts()->queue=[];wp_styles()->queue=[];
set_current_screen('post');get_current_screen()->is_block_editor(true);
FlexLine\flexline_admin_enqueue_canvas_runtime_assets();
if(!wp_script_is('flexline-slider-admin','enqueued')||!wp_script_is('flexline-scroll-admin','enqueued'))throw new RuntimeException('Non-iframed editor runtimes missing');
wp_scripts()->queue=[];wp_styles()->queue=[];
set_current_screen('dashboard');
FlexLine\flexline_admin_enqueue_canvas_runtime_assets();
if(wp_scripts()->queue||wp_styles()->queue)throw new RuntimeException('Canvas assets leaked into dashboard');

$base=json_decode(file_get_contents($theme.'/theme.json'),true);
$overrides=['color'=>['text'=>'#123456','background'=>'#dceeff'],'border'=>['width'=>'4px','style'=>'dashed','radius'=>'12px','color'=>'#456789'],'typography'=>['lineHeight'=>'2'],'spacing'=>['padding'=>['top'=>'8px','right'=>'0','bottom'=>'8px','left'=>'0']]];
$cases=['defaults'=>null,'global'=>['styles'=>['blocks'=>['core/button'=>['typography'=>['fontSize'=>'23px']]]]],'variation'=>['styles'=>['blocks'=>['core/button'=>['variations'=>['text-link'=>$overrides,'outline'=>$overrides]]]]],'child'=>['styles'=>['blocks'=>['core/button'=>['variations'=>['text-link'=>$overrides,'outline'=>$overrides]]]]]];
$links='';
$fixture_data=$base;
add_filter('wp_theme_json_data_theme',function()use(&$fixture_data){return new WP_Theme_JSON_Data($fixture_data,'theme');},999);
add_filter('wp_theme_json_data_user',fn()=>new WP_Theme_JSON_Data(['version'=>3],'custom'),999);
foreach($cases as $case=>$patch){
 $tree=new WP_Theme_JSON($base,'theme');
 if($patch)$tree->merge(new WP_Theme_JSON(array_merge(['version'=>3],$patch),$case==='child'?'theme':'custom'));
 $css=$tree->get_stylesheet(['variables','styles','presets'],null,['include_block_style_variations'=>true]);
 $fixture_data=$tree->get_raw_data();
 WP_Theme_JSON_Resolver::clean_cached_data();
 if(isset(wp_styles()->registered['block-style-variation-styles']))unset(wp_styles()->registered['block-style-variation-styles']->extra['after']);
 $buttons='';
 foreach(['text-link','outline'] as $style){
  foreach(['canonical'=>'is-style-'.$style,'suffixed'=>'is-style-'.$style.' is-style-'.$style.'--18','legacy'=>'is-style-'.$style.'--19','individual'=>'is-style-'.$style] as $type=>$classes){
   $inline=$type==='individual'?'style="padding:8px 0;color:#123456;background-color:#dceeff;border:4px dashed #456789;border-radius:12px;line-height:2"':'';
   $markup='<div class="wp-block-button flexline-icon-internal-link '.$classes.'"><a id="'.$style.'-'.$type.'" class="wp-block-button__link wp-element-button" href="#" '.$inline.'>Contact</a></div>';
   $buttons.='<p>'.$style.' / '.$type.'</p>'.do_blocks('<!-- wp:button '.wp_json_encode(['className'=>$classes.' flexline-icon-internal-link']).' -->'.$markup.'<!-- /wp:button -->');
  }
 }
 $css.=implode("\n",wp_styles()->get_data('block-style-variation-styles','after')?:[]);
 file_put_contents($output.'/buttons-'.$case.'.html','<!doctype html><html><head><meta charset="utf-8"><style>'.$css.'</style><link rel="stylesheet" href="assets/built/css/app.css?phase4=final"><style>body{padding:24px} .wp-block-button{display:inline-block}</style></head><body><h1>Phase 4 button test: '.$case.'</h1>'.$buttons.'</body></html>');
 $links.='<li><a href="buttons-'.$case.'.html">'.$case.'</a></li>';
}
file_put_contents($output.'/index.html','<h1>Phase 4 isolated fixtures</h1><ul>'.$links.'</ul>');
file_put_contents($output.'/editor-report.json',wp_json_encode(['wordpress'=>get_bloginfo('version'),'theme_styles'=>array_map(fn($s)=>['url'=>$s['baseURL']??null,'bytes'=>strlen($s['css'])],$editor_css),'iframe_runtime_ids'=>['flexline-scroll-admin-js','flexline-slider-admin-js'],'scope'=>'Read-only canvas asset collection and theme JSON merge fixtures'],JSON_PRETTY_PRINT));
$canvas_css=implode("\n",array_column($editor_css,'css'));
$canvas='<html><head><meta charset="utf-8"><style>'.$canvas_css.'</style><style>body{padding:20px}.wp-block-group>div{padding:20px;background:#d9e9ed}.is-style-horizontal-scroll>div{min-width:300px;padding:24px;background:#eee}</style>'.$assets['styles'].'</head><body><h2>Editor canvas test fixture</h2><button id="insert">Insert slider and scrolling pattern</button><button id="preview">Toggle slider preview</button><div class="editor-styles-wrapper" id="canvas"></div><template id="pattern"><div class="wp-block-group is-style-slider slider-navigation" style="--slider-height-default:200px"><div>First preview slide</div><div>Second preview slide</div></div><div class="wp-block-columns is-style-horizontal-scroll horizontal-scroller-navigation"><div>First pattern card</div><div>Second pattern card</div><div>Third pattern card</div><div>Fourth pattern card</div></div></template>'.$assets['scripts'].'<script>document.querySelector("#insert").onclick=()=>{document.querySelector("#canvas").innerHTML=document.querySelector("#pattern").innerHTML;window.FlexlineHorizontalScroll?.init(document.querySelector("#canvas"));};document.querySelector("#preview").onclick=()=>{const slider=document.querySelector(".is-style-slider");slider?.classList.toggle("slider-preview-mode");window.FlexlineSlider?.init(slider);};</script></body></html>';
file_put_contents($output.'/canvas.html',$canvas);
file_put_contents($output.'/editor-iframe.html','<!doctype html><meta charset="utf-8"><h1>Phase 4 isolated editor iframe</h1><iframe title="Editor canvas" src="canvas.html" style="width:100%;height:700px;border:1px solid #ccc"></iframe>');
echo "PASS complete editor CSS, iframe runtime collection, and button fixture generation\n";
