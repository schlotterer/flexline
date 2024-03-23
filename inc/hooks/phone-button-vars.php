<?php
/**
 * Adds custom classes to apply to <main>
 *
 * @package flexline
 */

namespace FlexLine\flexline;

function flexline_customize_js_settings() {
    $phone_number = get_theme_mod('flexline_main_phone_number', '');
    $is_anchor_link = strpos($phone_number, '#') !== false;
    $href = $is_anchor_link ? esc_url($phone_number) : 'tel:' . preg_replace('/\D+/', '', $phone_number);
    // Define an accessible label based on the link type
    $aria_label = $is_anchor_link ? "Visit our call links." : "Call us at " . esc_html($phone_number);
    ?>
    <script type="text/javascript">
        var FlexlineCustomizerSettings = {
            phoneLink: '<?php echo $href; ?>',
            ariaLabel: '<?php echo $aria_label; ?>',
            hideOnDesktop: <?php echo get_theme_mod('flexline_hide_phone_desktop', false) ? 'true' : 'false'; ?>,
            hideOnTablet: <?php echo get_theme_mod('flexline_hide_phone_tablet', false) ? 'true' : 'false'; ?>,
            hideOnMobile: <?php echo get_theme_mod('flexline_hide_phone_mobile', false) ? 'true' : 'false'; ?>
        };
    </script>
    <?php
}
add_action('wp_head', __NAMESPACE__ . '\flexline_customize_js_settings');
