<?php
/**
 * Render theme settings tab.
 *
 * @package flexlinetheme
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
function flexlinetheme_render_settings_tab() {
    ?>
    <form method="post" action="options.php">
        <?php settings_fields( 'flexlinetheme_theme_options_group' ); ?>
        <?php do_settings_sections( 'flexlinetheme_theme_options_group' ); ?>
        
        <h2>Menu Settings</h2>
        <hr />
        <table class="form-table">
            <tr valign="top">
                <th scope="row"><strong>Use menu icon at all breakpoints</strong></th>
                <td><input type="checkbox" name="flexlinetheme_use_menu_icon" value="1" <?php checked(1, get_option('flexlinetheme_use_menu_icon'), true); ?> /></td>
            </tr>
            <tr valign="top">
                <th scope="row"><strong>Hide search/menu at tablet</strong></th>
                <td><input type="checkbox" name="flexlinetheme_hide_search_tablet" value="1" <?php checked(1, get_option('flexlinetheme_hide_search_tablet'), true); ?> /></td>
            </tr>
            <tr valign="top">
                <th scope="row"><strong>Hide search/menu at desktop</strong></th>
                <td><input type="checkbox" name="flexlinetheme_hide_search_desktop" value="1" <?php checked(1, get_option('flexlinetheme_hide_search_desktop'), true); ?> /></td>
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
                    <img id="feature-fallback-image" src="<?php echo esc_url( get_option('flexlinetheme_feature_fallback') ); ?>" style="max-width: 100px; display: block; margin-bottom: 10px;">
                    <input type="hidden" name="flexlinetheme_feature_fallback" id="feature-fallback-input" value="<?php echo esc_url( get_option('flexlinetheme_feature_fallback') ); ?>">
                    <input type="button" class="button-primary" value="Upload Image" id="upload-button" />
                </td>
            </tr>
        </table>
        
        <?php submit_button(); ?>
    </form>
    <?php
}


