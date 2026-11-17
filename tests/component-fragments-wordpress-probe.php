<?php
/** Read-only WP-CLI probe. Accepts the same five arguments as component-assets-wordpress-probe.php. */
require __DIR__.'/component-assets-wordpress-probe.php';
$GLOBALS['flexline_component_requirements']=[];
$fragment=do_blocks($slider.$scroll);
$manifest=FlexLine\flexline_fragment_asset_metadata(null,$fragment);
$expected=['flexline-component-horizontal-scroll','flexline-component-slider','flexline-scroll','flexline-slider'];
if(array_column($manifest['assets'],'handle')!==$expected)throw new RuntimeException('Wrong manifest order');
foreach(['Web4SL_Location_Sync\\Utils\\Block_Render_Helper','Web4SL_Advanced_Floor_Plans\\Utils\\Block_Render_Helper'] as $helper){
 $response=$helper::fragment_response(['html'=>$fragment,'ids'=>[42]],$fragment);
 if($response['html']!==$fragment||$response['assets']!==$manifest)throw new RuntimeException('Fragment metadata mismatch');
 remove_filter('web4sl_fragment_assets','FlexLine\\flexline_fragment_asset_metadata',10);
 if(isset($helper::fragment_response(['html'=>$fragment],$fragment)['assets']))throw new RuntimeException('Old theme compatibility failed');
 add_filter('web4sl_fragment_assets','FlexLine\\flexline_fragment_asset_metadata',10,2);
}
$config=['schema'=>1,'complete'=>false,'catalog'=>FlexLine\flexline_fragment_asset_catalog()];
file_put_contents($output.'/fragment.json',wp_json_encode(['html'=>$fragment,'assets'=>$manifest]));
$plain=file_get_contents($output.'/plain.html');
// The fixture begins with base CSS and no feature runtime; use actual WordPress-generated catalog.
$boot='<script>window.FlexlineComponentAssets='.wp_json_encode($config).';</script><script src="assets/built/js/component-loader.js"></script>';
$ui=<<<'HTML'
<h2>Phase 3 late-fragment test fixture</h2><p>Isolated test content; no client page changes.</p><button id="insert">Load two concurrent fragments</button><button id="clone">Clone initialized content</button><button id="remove">Remove content</button><p id="status" role="status">Ready: no component assets loaded</p><section id="results"><p>Existing content remains until loading succeeds.</p></section>
<script>
const results=document.querySelector('#results'),status=document.querySelector('#status');
const notify=root=>window.dispatchEvent(new CustomEvent('flexline:content-updated',{detail:{root}}));
document.querySelector('#insert').onclick=async()=>{try{const payload=await fetch('fragment.json').then(r=>r.json());await Promise.all([FlexlineComponents.ensure(payload.assets),FlexlineComponents.ensure(payload.assets)]);FlexlineComponents.teardown(results);results.innerHTML=payload.html;notify(results);status.textContent='Loaded: CSS and runtimes ready';}catch(e){status.textContent=e.message;}};
document.querySelector('#clone').onclick=()=>{const copy=results.cloneNode(true);copy.removeAttribute('id');FlexlineComponents.teardown(results);results.replaceChildren(...copy.childNodes);notify(results);status.textContent='Cloned content initialized';};
document.querySelector('#remove').onclick=()=>{FlexlineComponents.teardown(results);results.replaceChildren();status.textContent='Removed and torn down';};
</script>
HTML;
file_put_contents($output.'/late-fragment.html',str_replace('</body>',$boot.$ui.'</body>',$plain));
echo "PASS real WordPress fragment catalogs and old-theme response compatibility\n";
