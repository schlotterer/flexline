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
        </table>
        
        <h2>Phone Settings</h2>
        <hr />
        <table class="form-table">
            <tr valign="top">
                <th scope="row"><strong>Phone link text</strong>
                    <p>This optional text will display as the text and alt tag for the phone link</p>
                </th>
                <td><input type="text" name="flexline_main_phone_title" value="<?php echo esc_attr( get_option('flexline_main_phone_title') ); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row"><strong>Main phone number</strong>
                    <p>This can be a phone number with 10 numeric digits, or it can be an anchor (#) link to a phone directory, or any other link.</p>
                </th>
                <td><input type="text" name="flexline_main_phone_number" value="<?php echo esc_attr( get_option('flexline_main_phone_number') ); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row"><strong>Hide header phone link on desktop</strong></th>
                <td><input type="checkbox" name="flexline_hide_phone_desktop" value="1" <?php checked(1, get_option('flexline_hide_phone_desktop'), true); ?> /></td>
            </tr>
            <tr valign="top">
                <th scope="row"><strong>Hide header phone link on tablet</strong></th>
                <td><input type="checkbox" name="flexline_hide_phone_tablet" value="1" <?php checked(1, get_option('flexline_hide_phone_tablet'), true); ?> /></td>
            </tr>
            <tr valign="top">
                <th scope="row"><strong>Hide header phone link on mobile</strong></th>
                <td><input type="checkbox" name="flexline_hide_phone_mobile" value="1" <?php checked(1, get_option('flexline_hide_phone_mobile'), true); ?> /></td>
            </tr>
        </table>
        
        <h2>Address Settings</h2>
        <hr />
        <p>You can use the following shortcodes to display the address information:</p>
        <ul>
            <li><strong>[flexline_city_state]</strong> - This shortcode displays the city and state in a simple inline format which can be easily inserted into posts, pages, or widgets. It only displays the address if both city and state are configured in the theme's customizer settings.</li>
            <li><strong>[flexline_contact_info]</strong> - This shortcode dynamically fetches address and phone number details from the theme settings, allowing for easy updates through the WordPress admin panel.</li>
        </ul>
        <table class="form-table">
            <tr valign="top">
                <th scope="row"><strong>Street</strong></th>
                <td><input type="text" name="flexline_address_street" value="<?php echo esc_attr( get_option('flexline_address_street') ); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row"><strong>City</strong></th>
                <td><input type="text" name="flexline_address_city" value="<?php echo esc_attr( get_option('flexline_address_city') ); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row"><strong>State</strong></th>
                <td><input type="text" name="flexline_address_state" value="<?php echo esc_attr( get_option('flexline_address_state') ); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row"><strong>Zip code</strong></th>
                <td><input type="text" name="flexline_address_zip" value="<?php echo esc_attr( get_option('flexline_address_zip') ); ?>" /></td>
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


