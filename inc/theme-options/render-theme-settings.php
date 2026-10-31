<?php
/**
 * Render theme settings tab.
 *
 * @package flexline
 */

/**
 * Renders the settings tab for the flexline theme.
 *
 * This function generates the HTML form for the settings tab in the flexline theme.
 * It includes various settings related to the menu, phone, address, and fallback options.
 * The form is submitted to the `options.php` file.
 *
 * @return void
 */
function flexline_render_settings_tab() {
	?>
	<form method="post" action="options.php">
		<?php settings_fields( 'flexline_theme_options_group' ); ?>
		<?php do_settings_sections( 'flexline_theme_options_group' ); ?>
		<h2>Menu Settings</h2>
		<hr />
		<table class="form-table">
			<tr valign="top">
				<th scope="row"><label for="flexline-use-menu-icon"><strong>Use menu icon at all breakpoints</strong></label></th>
				<td><input id="flexline-use-menu-icon" type="checkbox" name="flexline_use_menu_icon" value="1" <?php checked( 1, get_option( 'flexline_use_menu_icon' ), true ); ?> /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="flexline-hide-search-tablet"><strong>Hide search/menu at tablet</strong></label></th>
				<td><input id="flexline-hide-search-tablet" type="checkbox" name="flexline_hide_search_tablet" value="1" <?php checked( 1, get_option( 'flexline_hide_search_tablet' ), true ); ?> /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="flexline-hide-search-desktop"><strong>Hide search/menu at desktop</strong></label></th>
				<td><input id="flexline-hide-search-desktop" type="checkbox" name="flexline_hide_search_desktop" value="1" <?php checked( 1, get_option( 'flexline_hide_search_desktop' ), true ); ?> /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="flexline-show-menu-on-scroll-up"><strong>Use Headroom</strong></label></th>
				<td><input id="flexline-show-menu-on-scroll-up" type="checkbox" name="flexline_show_menu_on_scroll_up" value="1" <?php checked( 1, get_option( 'flexline_show_menu_on_scroll_up', 0 ), true ); ?> /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="flexline-show-menu-all-the-time"><strong>Headroom - always show menu. (requires Headroom)</strong></label></th>
				<td><input id="flexline-show-menu-all-the-time" type="checkbox" name="flexline_show_menu_all_the_time" value="1" <?php checked( 1, get_option( 'flexline_show_menu_all_the_time', 0 ), true ); ?> /></td>
			</tr>
		</table>

		<h2>Block Editor Settings</h2>
		<hr />
		<table class="form-table">
			<tr valign="top">
				<th scope="row">
					<label for="flexline-enable-core-block-hide"><strong>Enable WordPress core Hide controls</strong></label>
					<p>Default is off. Keep disabled to avoid conflicts with FlexLine visibility controls and breakpoint mismatches.</p>
				</th>
				<td><input id="flexline-enable-core-block-hide" type="checkbox" name="flexline_enable_core_block_hide" value="1" <?php checked( 1, get_option( 'flexline_enable_core_block_hide', 0 ), true ); ?> /></td>
			</tr>
		</table>
		<h2>Fallback Settings</h2>
		<hr />
		<table class="form-table">
			<tr valign="top">
				<th scope="row"><strong>Feature image fallback</strong>
					<p>This image will be used as a fallback if there is no featured image for a post or page. It will be displayed on the post or page's featured image area.</p>
				</th>
				<td>
					<?php if ( get_option( 'flexline_feature_fallback' ) ) : ?>
						<button type="button" class="button" style="margin:10px 0;" id="remove-fallback-image">Remove Image</button>
					<?php endif; ?>
					<img id="feature-fallback-image" src="<?php echo esc_url( get_option( 'flexline_feature_fallback' ) ); ?>" alt="" style="max-width: 100px; display: block; margin-bottom: 10px;">
					<input type="hidden" name="flexline_feature_fallback" id="feature-fallback-input" value="<?php echo esc_url( get_option( 'flexline_feature_fallback' ) ); ?>">
					<input type="button" class="button-primary" value="Upload Image" id="upload-button" />
				</td>
			</tr>
		</table>
		<?php /* Utilities plugin notice removed; features are part of the theme. */ ?>

		<?php submit_button(); ?>
	</form>
	<?php
}
