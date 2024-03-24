<?php
/**
 * Adds custom classes to apply to <main>
 *
 * @package flexline
 */

namespace FlexLine\flexline;

function flexline_customize_js_settings() {
    // Use the existing function to get the processed phone link
    $href = flexline_get_phone_button_link();
    $mainPhoneTitle = get_theme_mod('flexline_main_phone_title', ''); // Fetch the main phone title for use in aria-label/title

    // Define an accessible label based on the link type and main phone title
    $aria_label = !empty($mainPhoneTitle) ? esc_html($mainPhoneTitle) : "Contact us";

    ?>
    <script type="text/javascript">
        var FlexlineCustomizerSettings = {
            phoneLink: '<?php echo $href; ?>', // This now uses the processed phone link
            ariaLabel: '<?php echo $aria_label; ?>', // Uses the main phone title if available
            hideOnDesktop: <?php echo get_theme_mod('flexline_hide_phone_desktop', false) ? 'true' : 'false'; ?>,
            hideOnTablet: <?php echo get_theme_mod('flexline_hide_phone_tablet', false) ? 'true' : 'false'; ?>,
            hideOnMobile: <?php echo get_theme_mod('flexline_hide_phone_mobile', false) ? 'true' : 'false'; ?>
        };
    </script>
    <?php
}
add_action('wp_head', __NAMESPACE__ . '\flexline_customize_js_settings');