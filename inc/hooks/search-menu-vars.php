<?php
/**
 * Pass Search Menu Variables to JS
 *
 * @package flexline
 */

namespace FlexLine\flexline;

function flexline_customize_search_menu_js_settings() {
    ?>
    <script type="text/javascript">
        var FlexlineCustomizerSearchMenuSettings = {
            useMenuIconOnDesktop: <?php echo get_theme_mod('flexline_use_menu_icon', false) ? 'true' : 'false'; ?>,
            hideSearchOnDesktop: <?php echo get_theme_mod('flexline_hide_search_desktop', false) ? 'true' : 'false'; ?>,
        };
    </script>
    <?php
}
add_action('wp_head', __NAMESPACE__ . '\flexline_customize_search_menu_js_settings');