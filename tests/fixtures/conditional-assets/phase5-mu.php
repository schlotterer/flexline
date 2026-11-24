<?php
/** Synthetic fixtures: install only in the disposable Phase 5 container. */
if ( ! defined('DB_HOST') || DB_HOST !== 'phase5-conditional-db' ) return;
add_filter('flexline_conditional_component_styles',fn()=>!isset($_GET['complete']));
add_action('init',function(){
 $slider='<!-- wp:group {"enableSlider":true,"className":"is-style-slider slider-navigation"} --><div class="wp-block-group is-style-slider slider-navigation" style="--slider-height-default:180px"><!-- wp:paragraph --><p>First test slide</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Second test slide</p><!-- /wp:paragraph --></div><!-- /wp:group -->';
 $scroll='<!-- wp:columns {"className":"is-style-horizontal-scroll horizontal-scroller-navigation"} --><div class="wp-block-columns is-style-horizontal-scroll horizontal-scroller-navigation">';
 foreach(range(1,5) as $i)$scroll.='<!-- wp:column --><div class="wp-block-column" style="min-width:260px"><p>Test card '.$i.'</p></div><!-- /wp:column -->';
 $scroll.='</div><!-- /wp:columns -->';
 $title='<!-- wp:post-title {"level":3} /-->';
 foreach(['slider'=>$slider,'scroll'=>$scroll,'location-card'=>$title.$slider,'location-popover'=>$title.$scroll,'floor-list'=>$title,'floor-panel'=>$title.$slider.'<!-- wp:web4sl/floor-plan-media-toggle /-->'] as $slug=>$content){register_block_pattern('phase5/'.$slug,['title'=>'Phase 5 '.$slug,'content'=>$content]);}
},20);


add_action('wp_footer',function(){echo '<script type="application/json" id="phase5-delivery">'.wp_json_encode($GLOBALS['flexline_component_delivery']??[]).'</script>';});
