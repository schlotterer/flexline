<?php
/** Disposable failure-injection probe: append a shipped pattern only to later REST fragments. */
if(!defined('DB_HOST')||DB_HOST!=='phase5-conditional-db'||DB_NAME!=='wordpress')return;
add_filter('rest_post_dispatch',static function($response,$server,$request){
 if($request->get_route()!=='/web4sl-location-sync/v1/location-cards'||!str_contains($_SERVER['HTTP_REFERER']??'','/phase5-late-pattern/')||!get_option('phase5_late_scroller'))return $response;
 $data=$response->get_data();if(!is_array($data)||!isset($data['html']))return $response;
 $data['html'].=do_blocks('<!-- wp:pattern {"slug":"flexline/section-timeline-columns"} /-->');
 $data['assets']=\FlexLine\flexline_fragment_asset_metadata(null,$data['html']);
 $response->set_data($data);return $response;
},20,3);
