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
function flexline_render_documentation_tab()
{
?>
    <style>
        .wrapper {
            display: flex;
            flex-wrap: nowrap;
        }

        .wrapper>* {
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
            <section id="shortcodes">
                <h2 style="font-size: 30px;">Shortcodes</h2>
                <p>A shortcode in WordPress is a simple way to add dynamic content to your posts, pages, and widgets without writing any code. Enclosed in square brackets like [shortcode], shortcodes are provided by themes, plugins, or custom functionality. To use a shortcode, copy it from the theme or plugin documentation, then paste it into the content editor where you want the feature to appear. In the Block Editor, add a "Shortcode" block and insert the code; in the Classic Editor, paste it directly into the text. Shortcodes transform into functional elements, such as galleries, contact forms, or videos, upon publishing or updating your content, making it easy to enhance your site with interactive features.</p>
                <hr />
                <section id="flexline_site_name">
                    <h3>Site Name - [flexline_site_name]</h3>
                    <p>Tenders a formatted address displaying the city and state as set in the theme options. This shortcode specifically outputs the city and state in a simple inline format which can be easily inserted into posts, pages, or widgets. It only displays the address if both city and state are configured in the theme's theme settings.</p>
                </section>
                <hr />
                <section id="flexline_city_state">
                    <h3>Site Name - [flexline_city_state]</h3>
                    <p>This shortcode dynamically fetches the site name from the WordPress settings, allowing for easy updates through the WordPress admin panel.<br>
                        Place this shortcode in any post, page, or widget area to display the site name.</p>
                </section>
                <hr />
                <section id="flexline_phone_number">
                    <h3>Phone Link - [flexline_phone_number]</h3>
                    <p>This shortcode generates a telephone link or an anchor link based on the presence of a "#" symbol in the phone number. It utilizes the "Main Phone Title" from the Flexline theme options for the link text and aria-label by default. Users can override the link URL and text via shortcode attributes for custom usage.</p>
                    <h4>Usage</h4>
                    <ul>
                        <li>[flexline_phone_number] - Uses the phone number and "Main Phone Title" from the Flexline theme options settings.</li>
                        <li>[flexline_phone_number link="tel:6665554444"] - Overrides the default or Flexline theme options-defined link with a custom link - make sure to include the "tel:" prefix if it's a phone number.</li>
                        <li>[flexline_phone_number text="Custom Text"] - Overrides the default or Flexline theme options-defined link text with custom text.</li>
                        <li>[flexline_phone_number link="http://example.com" text="Custom Text"] - Overrides both the link and text.</li>
                    </ul>
                </section>
                <hr />
                <section id="flexline_contact_info">
                    <h3>Contact info - [flexline_contact_info]</h3>
                    <p>This shortcode dynamically fetches address and phone number details from the theme settings, allowing for easy updates through the WordPress admin panel.<br>
                        Place this shortcode in any post, page, or widget area to display the contact information.<br>
                        <b>Note:</b> Ensure the 'flexline_main_phone_number', 'flexline_main_phone_title', 'flexline_address_street', 'flexline_address_city', 'flexline_address_state', and 'flexline_address_zip' are properly set in the Flexline theme settings to see the effects.
                    </p>
                </section>
                <hr />
                <section id="flexline_copyright_year">
                    <h3>Copyright Year - [flexline_copyright_year]</h3>
                    <p>
                        This shortcode generates a copyright year text. It can display the current year or a range from a specific starting year to the current year.
                    </p>
                    <h4>Usage</h4>
                    <ul>
                        <li>[flexline_copyright_year] - Displays the current year.</li>
                        <li>[flexline_copyright_year starting_year="2015"] - Displays a range from the starting year to the current year.</li>
                        <li>[flexline_copyright_year starting_year="2010" separator=" to "] - Customizes the separator in the range.</li>
                    </ul>
                </section>
            </section>



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
