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
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Use menu icon at all breakpoints</th>
                <td><input type="checkbox" name="flexline_use_menu_icon" value="1" <?php checked(1, get_option('flexline_use_menu_icon'), true); ?> /></td>
            </tr>
            <tr valign="top">
                <th scope="row">Hide Search/Menu at tablet</th>
                <td><input type="checkbox" name="flexline_hide_search_tablet" value="1" <?php checked(1, get_option('flexline_hide_search_tablet'), true); ?> /></td>
            </tr>
            <tr valign="top">
                <th scope="row">Hide Search/Menu at Desktop</th>
                <td><input type="checkbox" name="flexline_hide_search_desktop" value="1" <?php checked(1, get_option('flexline_hide_search_desktop'), true); ?> /></td>
            </tr>
        </table>
        
        <h2>Phone Settings</h2>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Main Phone Link Text</th>
                <td><input type="text" name="flexline_main_phone_title" value="<?php echo esc_attr( get_option('flexline_main_phone_title') ); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row">Main Phone Number</th>
                <td><input type="text" name="flexline_main_phone_number" value="<?php echo esc_attr( get_option('flexline_main_phone_number') ); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row">Hide header phone link on Desktop</th>
                <td><input type="checkbox" name="flexline_hide_phone_desktop" value="1" <?php checked(1, get_option('flexline_hide_phone_desktop'), true); ?> /></td>
            </tr>
            <tr valign="top">
                <th scope="row">Hide header phone link on Tablet</th>
                <td><input type="checkbox" name="flexline_hide_phone_tablet" value="1" <?php checked(1, get_option('flexline_hide_phone_tablet'), true); ?> /></td>
            </tr>
            <tr valign="top">
                <th scope="row">Hide header phone link on Mobile</th>
                <td><input type="checkbox" name="flexline_hide_phone_mobile" value="1" <?php checked(1, get_option('flexline_hide_phone_mobile'), true); ?> /></td>
            </tr>
        </table>
        
        <h2>Address Settings</h2>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Street</th>
                <td><input type="text" name="flexline_address_street" value="<?php echo esc_attr( get_option('flexline_address_street') ); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row">City</th>
                <td><input type="text" name="flexline_address_city" value="<?php echo esc_attr( get_option('flexline_address_city') ); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row">State</th>
                <td><input type="text" name="flexline_address_state" value="<?php echo esc_attr( get_option('flexline_address_state') ); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row">Zip code</th>
                <td><input type="text" name="flexline_address_zip" value="<?php echo esc_attr( get_option('flexline_address_zip') ); ?>" /></td>
            </tr>
        </table>
        
        <h2>Fallback Settings</h2>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Feature Image Fallback</th>
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