<?php

/**
 * Render theme settings tab.
 *
 * @package flexlinetheme
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
function flexlinetheme_render_documentation_tab()
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
            <section id="intro">
                <h2>Documentation</h2>
            </section>



            <!-- Add more documentation content as needed -->
        </div>
    </div>



    <!-- Add more documentation content as needed -->
<?php
}
