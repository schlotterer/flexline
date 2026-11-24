<?php
/** Isolated delivery/graph tests; real WordPress probe covers parser and hook timing. */
$enqueued = $scripts = $inlines = $registered = $registered_styles = $patterns = $posts = $types = $filters = [];
$env = 'local'; $admin = false; $head = 0; $site = 1;
define('ABSPATH', '/fake/'); define('WPINC', 'wp-includes');
function add_filter(...$args) {} function add_action(...$args) {} function do_action(...$args) {}
function wp_normalize_path($p) { return $p; }
function get_bloginfo($key) { return $GLOBALS['test_wp_version'] ?? '7.2'; }
function is_admin() { global $admin; return $admin; }
function did_action($name) { global $head; return $head; }
function wp_get_environment_type() { global $env; return $env; }
function get_option($k, $d) { return $GLOBALS['test_options'][$k] ?? $d; }
function apply_filters($k, $v, ...$args) { global $filters; return isset($filters[$k]) ? $filters[$k]($v, ...$args) : $v; }
function get_theme_file_path($f) { return dirname(__DIR__) . '/' . $f; }
function get_theme_file_uri($f) { return $f; }
function get_template_directory() { return dirname(__DIR__); }
function wp_enqueue_style($h, $u = '', $d = [], $v = '') { global $enqueued; $enqueued[$h] = [$u, $d]; }
function wp_register_style($h, ...$args) { global $registered_styles; $registered_styles[$h] = $args; }
function wp_style_is($h, $status) { global $registered_styles; return isset($registered_styles[$h]); }
function wp_add_inline_style($h, $css) { global $inlines; $inlines[$h] = $css; }
function wp_register_script($h, ...$args) { global $registered; $registered[$h] = $args; }
function wp_enqueue_script($h, ...$args) { global $scripts; $scripts[$h] = true; }
function wp_script_is($h, $status) { global $registered; return isset($registered[$h]); }
function wp_script_add_data(...$args) {} function wp_set_script_translations(...$args) {}
function get_current_blog_id() { global $site; return $site; }
function get_stylesheet() { return 'flexline'; }
function sanitize_text_field($value) { return trim(strip_tags($value)); }
function get_post($id) { global $posts; return $posts[$id] ?? null; }
function get_block_template($id, $type) { global $templates; return $templates[$id] ?? null; }
function parse_blocks($value) { return json_decode($value, true); }
class WP_Block_Patterns_Registry {
    static function get_instance() { return new self(); }
    function is_registered($slug) { global $patterns; return isset($patterns[$slug]); }
    function get_registered($slug) { global $patterns; return ['content' => json_encode($patterns[$slug])]; }
}
class WP_Block_Type_Registry {
    static function get_instance() { return new self(); }
    function get_registered($name) { global $types; return $types[$name] ?? null; }
}
class TestBlockType {
    public $style_handles = [], $view_style_handles = [], $script_handles = [], $view_script_handles = [];
    function __construct(public bool $dynamic = false) {}
    function is_dynamic() { return $this->dynamic; }
}
// Token-parser stand-in; the runtime probe uses WordPress's real HTML processor.
class WP_HTML_Tag_Processor {
    private $tags; private $index = -1;
    function __construct($html) { preg_match_all('/<[a-z][^>]*>/i', $html, $m); $this->tags = $m[0]; }
    function next_tag() { return isset($this->tags[++$this->index]); }
    function get_attribute($name) {
        if (preg_match('/\s'.preg_quote($name, '/').'="([^"]*)"/', $this->tags[$this->index], $m)) return $m[1];
        return null;
    }
}
eval('namespace FlexLine; function flexline_asset_ver($p) { return "test"; }');
require get_theme_file_path('inc/component-styles.php');
function reset_state() {
    global $enqueued, $scripts, $inlines, $filters, $head, $env, $site;
    $enqueued = $scripts = $inlines = $filters = []; $head = 0; $env = 'local'; $site = 1; $GLOBALS['test_options'] = [];
    foreach (array_keys($GLOBALS) as $key) if (str_starts_with($key, 'flexline_')) unset($GLOBALS[$key]);
}
function check($condition, $label) { if (!$condition) throw new Exception($label); echo "PASS $label\n"; }
function native($html = '<p>basic</p>', $block = []) {
    FlexLine\flexline_component_template('/fake/wp-includes/template-canvas.php');
    FlexLine\flexline_collect_component_styles($html, $block);
}
function block($name, $attrs = [], $children = [], $html = '') { return ['blockName'=>$name, 'attrs'=>$attrs, 'innerBlocks'=>$children, 'innerHTML'=>$html]; }
$types['core/group'] = new TestBlockType(true);
$types['core/paragraph'] = new TestBlockType();
reset_state(); FlexLine\flexline_enqueue_component_styles();
check($enqueued['flexline-base'][0] === 'assets/built/css/app.css' && count($scripts) === 3 && isset($enqueued['flexline-modal']), 'unknown canvas loads full CSS and all feature runtimes');
reset_state(); native(); FlexLine\flexline_enqueue_component_styles();
check(count($enqueued) === 2 && $enqueued['flexline-base'][0] === 'assets/built/css/base.css' && !$scripts, 'plain native page omits feature CSS and runtimes');
check(str_contains($inlines['flexline-component-tail'], 'toggle-active'), 'global tail retained after base');
reset_state(); native('<div class="is-style-horizontal-scroll-at-mobile"></div>'); FlexLine\flexline_enqueue_component_styles();
check(isset($enqueued['flexline-component-horizontal-scroll']) && !$scripts, 'mobile scroll adds CSS without desktop runtime');
reset_state(); native('<div class="is-style-horizontal-scroll--12"><div class="is-style-slider"></div></div>'); FlexLine\flexline_enqueue_component_styles();
check(isset($scripts['flexline-scroll'], $scripts['flexline-slider']) && count($scripts) === 2, 'desktop legacy scroller and nested slider share CSS/runtime union');
check($enqueued['flexline-component-slider'][1] === ['flexline-base','flexline-component-horizontal-scroll'] && isset($inlines['flexline-component-tail']), 'original component and tail order preserved');
reset_state(); native('<p>is-style-slider enable-modal is-style-horizontal-scroll</p><div class="not-is-style-slider is-style-horizontal-scrollish enable-modal-example"></div>'); FlexLine\flexline_enqueue_component_styles();
check(count($enqueued) === 2 && !$scripts, 'text and partial class names do not declare components');
reset_state(); native('', ['attrs'=>['enableSlider'=>true, 'enableModal'=>true]]); FlexLine\flexline_enqueue_component_styles();
check(isset($scripts['flexline-slider'], $scripts['flexline-modal'], $enqueued['flexline-modal']), 'supported attributes declare CSS and runtimes');
check($registered['flexline-slider'][1] === ['flexline-load-early','wp-i18n'], 'early slider registration has stable translation dependency');
reset_state(); native(); $filters['flexline_required_component_styles'] = fn($r) => ['slider'=>true]; FlexLine\flexline_enqueue_component_styles();
check(isset($enqueued['flexline-component-slider'], $scripts['flexline-slider']), 'legacy integration filter declares both asset types');
reset_state(); native(); $filters['flexline_required_component_styles'] = fn($r) => ['mystery'=>true]; FlexLine\flexline_enqueue_component_styles();
check(!$GLOBALS['flexline_component_delivery']['split'] && count($scripts) === 3, 'unknown declarations choose complete compatibility');
foreach (['local', 'development', 'staging', 'production'] as $environment) {
    reset_state(); native(); $env = $environment; FlexLine\flexline_enqueue_component_styles();
    check($GLOBALS['flexline_component_delivery']['split'] && $enqueued['flexline-base'][0] === 'assets/built/css/base.css' && !$scripts, "$environment defaults to conditional delivery");
}
reset_state(); native(); $GLOBALS['test_options']['flexline_conditional_component_styles'] = false; FlexLine\flexline_enqueue_component_styles();
check(!$GLOBALS['flexline_component_delivery']['split'] && $enqueued['flexline-base'][0] === 'assets/built/css/app.css' && count($scripts) === 3, 'saved false option retains complete compatibility');
reset_state(); native(); $GLOBALS['test_options']['flexline_conditional_component_styles'] = false; $filters['flexline_conditional_component_styles'] = fn($v) => true; FlexLine\flexline_enqueue_component_styles();
check($GLOBALS['flexline_component_delivery']['split'], 'filter can override saved compatibility option');
reset_state(); native(); $filters['flexline_conditional_component_styles'] = fn($v) => false; FlexLine\flexline_enqueue_component_styles();
check(!$GLOBALS['flexline_component_delivery']['split'], 'explicit compatibility filter');
reset_state();
$patterns['test/leaf'] = [block('core/group', ['enableSlider'=>true])];
$posts[42] = (object)['post_type'=>'wp_block','post_status'=>'publish','post_content'=>json_encode([block('core/pattern',['slug'=>'test/leaf'])])];
$templates['flexline//nested'] = (object)['content'=>json_encode([block('core/block',['ref'=>42])])];
$patterns['test/parent'] = [block('core/template-part', ['slug'=>'nested']), block('core/group', ['className'=>'is-style-horizontal-scroll-at-mobile'])];
$r = FlexLine\flexline_pattern_requirements('test/parent');
check(isset($r['features']['slider'], $r['features']['horizontal-scroll-mobile']) && !$r['fallback'], 'configured registered user synced and template-part references form one union');
$count = $GLOBALS['flexline_component_scan_count'];
check($r === FlexLine\flexline_pattern_requirements('test/parent') && $count === $GLOBALS['flexline_component_scan_count'], 'warm request cache replays requirements without rescanning');
$site = 2; $patterns['test/parent'] = [block('core/group', ['enableModal'=>true])];
$r = FlexLine\flexline_pattern_requirements('test/parent');
check(isset($r['features']['modal']) && !isset($r['features']['slider']), 'request cache isolates sites');
$patterns['test/cycle'] = [block('core/pattern',['slug'=>'test/cycle'])];
check(isset(FlexLine\flexline_pattern_requirements('test/cycle')['fallback']['recursive-or-deep-pattern']), 'recursive reference terminates with fallback');
check(isset(FlexLine\flexline_pattern_requirements('test/missing')['fallback']['unresolved-pattern']), 'missing reference selects fallback');
$types['test/dynamic'] = new TestBlockType(true); $types['test/dynamic']->view_script_handles = ['test-view'];
$patterns['test/dynamic'] = [block('test/dynamic')];
$r = FlexLine\flexline_pattern_requirements('test/dynamic');
check(isset($r['fallback']['dynamic-pattern-output'], $r['scripts']['test-view']), 'unknown dynamic output falls back and retains registered handle declarations');
$filters['flexline_dynamic_block_requirements'] = fn($r, $b) => ['slider'=>true];
$r = FlexLine\flexline_pattern_requirements('test/dynamic');
check(isset($r['features']['slider']) && !$r['fallback'], 'dynamic integration may supply a complete feature union');
reset_state(); $GLOBALS['flexline_component_scan_count'] = 4096;
check(isset(FlexLine\flexline_pattern_requirements('test/leaf')['fallback']['pattern-scan-budget']), 'wide traversal is bounded');
reset_state(); $head = 1; FlexLine\flexline_collect_component_styles('<div class="is-style-slider"></div>', []);
check(isset($GLOBALS['flexline_component_requirements']['slider']) && empty($GLOBALS['flexline_component_render_seen']), 'late fragments collect declarations without claiming pre-head delivery');

// Public plugin resolvers are the adapter boundary, including main's grid comparison semantics.
eval('namespace Web4SL_Location_Sync; class Plugin { static function resolve_effective_pattern(string $view, string $override = ""): string { return $view . ":" . ($override ?: "default"); } }');
eval('namespace Web4SL_Advanced_Floor_Plans; class Plugin { static function resolve_effective_pattern(string $view, string $override = ""): string { return $view . ":" . ($override ?: "default"); } }');
$r = FlexLine\flexline_configured_pattern_references(block('web4sl/location-map', ['listViewType'=>'list','cardPatternSlug'=>'cards','popoverPatternSlug'=>'popup']));
check($r === ['list:cards','popover:popup','grid:cards'], 'location adapter preserves renderer view and comparison fallback semantics');
$r = FlexLine\flexline_configured_pattern_references(block('web4sl/advanced-floor-plans', ['panelPatternSlug'=>'panel-custom']));
check($r === ['list:default','panel:panel-custom'], 'floor-plan adapter delegates default and override resolution');
reset_state(); $posts[43] = (object)['post_type'=>'wp_block','post_status'=>'draft','post_content'=>'[]'];
check(isset(FlexLine\flexline_pattern_requirements('user-pattern:43')['fallback']['unresolved-pattern']), 'unpublished patterns are not inspected on frontend');
reset_state(); native(); $filters['flexline_required_component_styles'] = fn($r) => null; FlexLine\flexline_enqueue_component_styles();
check(!$GLOBALS['flexline_component_delivery']['split'], 'malformed filter safely selects compatibility');

echo "All component contracts passed.\n";

reset_state(); native(); $GLOBALS["test_wp_version"]="6.5.7"; FlexLine\flexline_enqueue_component_styles();
check(isset($enqueued["flexline-button-compat"]), "WordPress 6.5 retains Plain Text defaults");
reset_state(); native(); $GLOBALS["test_wp_version"]="6.6"; FlexLine\flexline_enqueue_component_styles();
check(!isset($enqueued["flexline-button-compat"]), "Modern WordPress uses editable variation defaults without compatibility CSS");
