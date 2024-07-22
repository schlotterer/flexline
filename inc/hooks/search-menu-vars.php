<?php
/**
 * Pass Search Menu Variables to JS
 *
 * @package flexlinetheme
 */

namespace Flexlinetheme\flexlinetheme;

/**
 * Outputs JavaScript settings for customizing the search menu.
 *
 * This function generates a script block with settings for the search menu,
 * based on theme customizer options. These settings control the visibility
 * of the search feature and the use of a menu icon on desktop.
 *
 * @return void
 */
function flexlinetheme_customize_search_menu_js_settings() {
	?>
	<script type="text/javascript">
		var FlexlineCustomizerSearchMenuSettings = {
			useMenuIconOnDesktop: <?php echo get_option( 'flexlinetheme_use_menu_icon', false ) ? 'true' : 'false'; ?>,
			hideSearchOnTablet: <?php echo get_option( 'flexlinetheme_hide_search_tablet', false ) ? 'true' : 'false'; ?>,
			hideSearchOnDesktop: <?php echo get_option( 'flexlinetheme_hide_search_desktop', false ) ? 'true' : 'false'; ?>,
		};
	</script>
	<?php
}
add_action( 'wp_head', __NAMESPACE__ . '\flexlinetheme_customize_search_menu_js_settings' );