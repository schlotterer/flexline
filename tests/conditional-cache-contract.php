<?php
/** Isolated provider shims: no WordPress cache or external endpoint is touched. */
$opts = $network = $transients = $calls = $hooks = [];
$sg_ok = true; $cron = false; $site = 1; $pages = [];
function add_action(...$args) { $GLOBALS['hooks'][]=$args; }
function get_option($k,$d=false) { return $GLOBALS['opts'][$GLOBALS['site']][$k] ?? $d; }
function add_option($k,$v,...$args) { if(get_option($k)!==false)return false; $GLOBALS['opts'][$GLOBALS['site']][$k]=$v;return true; }
function update_option($k,$v,...$args) { $GLOBALS['opts'][$GLOBALS['site']][$k]=$v; }
function delete_option($k) { unset($GLOBALS['opts'][$GLOBALS['site']][$k]); }
function apply_filters($k,$v) { return new class { function get($key) { return new class { function delete_used_css_rows() { $GLOBALS['calls'][]='used-css'; } }; } }; }
function home_url($path) { return 'https://example.test/site'.$GLOBALS['site'].$path; }
function is_wp_error($v) { return false; }
function is_multisite() { return true; }
function wp_doing_cron() { return $GLOBALS['cron']; }
function wp_installing() { return false; }
function get_site_option($k,$d=false) { return $GLOBALS['network'][$k]??$d; }
function update_site_option($k,$v) { $GLOBALS['network'][$k]=$v; }
function get_site_transient($k) { return $GLOBALS['transients'][$k]??false; }
function set_site_transient($k,$v,$ttl) { $GLOBALS['transients'][$k]=$v; }
function get_sites($args) { return array_slice($GLOBALS['pages'],$args['offset'],$args['number']); }
function get_current_blog_id() { return $GLOBALS['site']; }
function get_current_network_id() { return 1; }
function get_blog_option($id,$k,$d=false) { return $GLOBALS['opts'][$id][$k]??$d; }
function get_site_url($id,$path) { return 'https://example.test/site'.$id.'/'.$path; }
function add_query_arg($key,$val,$url) { return $url.'?'.$key.'='.$val; }
function wp_remote_post($url,$args) { $GLOBALS['calls'][]=['wake',$url,$args]; return false; }
if (($argv[1]??'') !== 'absent') {
 function get_rocket_option($key,$default) { return true; }
 function rocket_clean_minify() { $GLOBALS['calls'][]='minify'; }
 function rocket_clean_domain() { $GLOBALS['calls'][]='rocket'; }
 function sg_cachepress_purge_cache($url) { $GLOBALS['calls'][]=['sg',$url]; return $GLOBALS['sg_ok']; }
}
require dirname(__DIR__).'/inc/hooks/class-conditional-assets-cache.php';
use FlexLine\Conditional_Assets_Cache as Cache;
function check($v,$m) { if(!$v)throw new Exception($m); echo "PASS $m\n"; }
Cache::run();
check(get_option(Cache::OPTION)['complete'],'first unauthenticated request completes');
$first=$calls; Cache::run(); check($calls===$first,'completed revision never repeats');
if (($argv[1]??'') === 'absent') { check(!$calls,'missing providers are safe'); exit; }
check($calls===['used-css','minify','rocket',['sg','https://example.test/site1/']],'used CSS and optimized assets clear before Rocket and scoped SiteGround HTML');
$site=2; $sg_ok=false; $calls=[]; Cache::run();
check(empty(get_option(Cache::OPTION)['complete']) && get_option(Cache::OPTION)['rocket'],'failure does not mark completion and preserves Rocket progress');
$first=$calls;Cache::run();check($first===$calls,'failed provider retries are throttled');
$state=get_option(Cache::OPTION);$state['retry_after']=0;update_option(Cache::OPTION,$state);$sg_ok=true;$calls=[];Cache::run();
check($calls===[['sg','https://example.test/site2/']] && get_option(Cache::OPTION)['complete'],'retry only repeats failed provider in correct site context');
$site=3;add_option(Cache::LOCK,time());$calls=[];Cache::run();check(!$calls,'concurrent request respects lock');
update_option(Cache::LOCK,time()-301);Cache::run();check(get_option(Cache::OPTION)['complete'],'expired lock recovers');
$site=1;$calls=[];$pages=[(object)['blog_id'=>1],(object)['blog_id'=>4],(object)['blog_id'=>5]];
$opts[4]['template']='flexline';$opts[5]['template']='other';
Cache::wake_sites();check(count($calls)===1 && str_contains($calls[0][1],'/site4/wp-cron.php?'),'network wakes only pending FlexLine sites without switching plugin context');
check(empty($network[Cache::OPTION.'_wake_complete']),'dispatched request is not proof of completion');
$transients=[];$opts[4][Cache::OPTION]=['complete'=>true];Cache::wake_sites();check($network[Cache::OPTION.'_wake_complete'],'network traversal stops once all affected sites complete');
$calls=[];$transients=[];Cache::wake_sites();check(!$calls,'completed network does no more loopbacks');
$network=[];$cron=true;Cache::wake_sites();check(!$calls,'cron worker cannot recursively fan out');
