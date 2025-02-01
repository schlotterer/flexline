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
                <th scope="row"><strong>Use menu icon at all breakpoints</strong></th>
                <td><input type="checkbox" name="flexline_use_menu_icon" value="1" <?php checked(1, get_option('flexline_use_menu_icon'), true); ?> /></td>
            </tr>
            <tr valign="top">
                <th scope="row"><strong>Hide search/menu at tablet</strong></th>
                <td><input type="checkbox" name="flexline_hide_search_tablet" value="1" <?php checked(1, get_option('flexline_hide_search_tablet'), true); ?> /></td>
            </tr>
            <tr valign="top">
                <th scope="row"><strong>Hide search/menu at desktop</strong></th>
                <td><input type="checkbox" name="flexline_hide_search_desktop" value="1" <?php checked(1, get_option('flexline_hide_search_desktop'), true); ?> /></td>
            </tr>
            <tr valign="top">
                <th scope="row"><strong>Show main navigation when scrolling up.</strong></th>
                <td><input type="checkbox" name="flexline_show_menu_on_scroll_up" value="1" <?php checked(1, get_option('flexline_show_menu_on_scroll_up'), true); ?> /></td>
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
                    <img id="feature-fallback-image" src="<?php echo esc_url( get_option('flexline_feature_fallback') ); ?>" style="max-width: 100px; display: block; margin-bottom: 10px;">
                    <input type="hidden" name="flexline_feature_fallback" id="feature-fallback-input" value="<?php echo esc_url( get_option('flexline_feature_fallback') ); ?>">
                    <input type="button" class="button-primary" value="Upload Image" id="upload-button" />
                </td>
            </tr>
        </table>
        
        <?php submit_button(); ?>
    </form>
    <?php
}


