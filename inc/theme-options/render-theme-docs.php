<?php
/**
 * Render theme settings tab.
 *
 * @package flexline
 */

/**
 * Renders the documentation tab for the flexline theme.
 *
 * This function generates the HTML content for the documentation tab in the flexline theme.
 * It displays a heading and a paragraph providing instructions on how to use the theme settings,
 * including detailed descriptions and examples.
 *
 * @return void
 */
function flexline_render_documentation_tab() {
    ?>
    <style>
        .wrapper {
            display: flex;
            flex-wrap: nowrap;
        }
        .wrapper > * {
            padding: 20px;
        }
        .content-container {
            flex-shrink: 1;
           
        }
        .nav-container {
            width: 200px;
            flex-shrink: 0;
        }

    </style>
    <div class="wrapper">
        <div class="content-container">
            <h2 id="shortcodes" style="font-size: 30px;">Shortcodes</h2>
            <p>A shortcode in WordPress is a simple way to add dynamic content to your posts, pages, and widgets without writing any code. Enclosed in square brackets like [shortcode], shortcodes are provided by themes, plugins, or custom functionality. To use a shortcode, copy it from the theme or plugin documentation, then paste it into the content editor where you want the feature to appear. In the Block Editor, add a "Shortcode" block and insert the code; in the Classic Editor, paste it directly into the text. Shortcodes transform into functional elements, such as galleries, contact forms, or videos, upon publishing or updating your content, making it easy to enhance your site with interactive features.</p>

            <h3>Contact info - [flexline_contact_info]</h3>
            <p>This shortcode dynamically fetches address and phone number details from the theme settings, allowing for easy updates through the WordPress admin panel.<br>
            Place this shortcode in any post, page, or widget area to display the contact information.<br>
            <b>Note:</b> Ensure the 'flexline_main_phone_number', 'flexline_main_phone_title', 'flexline_address_street', 'flexline_address_city', 'flexline_address_state', and 'flexline_address_zip' are properly set in the Flexline theme settings to see the effects.</p>
        
        
        
        <!-- Add more documentation content as needed -->
        </div>
        <!-- Sidebar skip nav -->
        <div class="nav-container">
            <ul class="is-position-sticky">
                <li><a href="#shortcodes">Shortcodes</a></li>
            </ul>
        </div>
    </div>



    <!-- Add more documentation content as needed -->
    <?php
}
