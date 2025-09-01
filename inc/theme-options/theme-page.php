<?php
/**
 * Theme options page.
 *
 * This file is responsible for rendering the theme options page.
 *
 * @package FlexLine
 * @since   0.9.2
 */

require_once __DIR__ . '/render-theme-docs.php';

/**
 * Displays the FlexLine theme options page.
 *
 * @return void
 */
function flexline_theme_options_page() {
		// Define the tabs and their content.
	$tabs = array(
		'settings'      => array(
			'title'   => 'Settings',
			'content' => 'flexline_render_settings_tab',
		),
		'documentation' => array(
			'title'   => 'Documentation',
			'content' => '\FlexLine\flexline_render_documentation_tab',
		),
	);
	?>
	<div class="wrap">
		<h1>FlexLine Theme Options</h1>
		
		<!-- Tabs -->
		<h2 class="nav-tab-wrapper">
						<?php foreach ( $tabs as $tab_id => $tab ) : ?>
								<a href="#<?php echo esc_attr( $tab_id ); ?>" class="nav-tab" data-tab="<?php echo esc_attr( $tab_id ); ?>" onclick="openTab(event, '<?php echo esc_attr( $tab_id ); ?>')"><?php echo esc_html( $tab['title'] ); ?></a>
						<?php endforeach; ?>
				</h2>
		
		<!-- Tab Contents -->
				<?php foreach ( $tabs as $tab_id => $tab ) : ?>
						<div id="<?php echo esc_attr( $tab_id ); ?>" class="tab-content">
								<?php call_user_func( $tab['content'] ); ?>
						</div>
				<?php endforeach; ?>
	</div>
	
	<style>
		.tab-content {
			display: none;
		}
		.tab-content.active {
			display: block;
		}
		.nav-tab {
			cursor: pointer;
		}
		#feature-fallback-input {
			width: 100%;
			max-width: 600px;
			padding: 5px;
		}
	</style>
	<script>
		function openTab(event, tabId) {
			var i, tabcontent, tablinks;
			tabcontent = document.getElementsByClassName("tab-content");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].classList.remove("active");
			}
			tablinks = document.getElementsByClassName("nav-tab");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].classList.remove("nav-tab-active");
			}
			document.getElementById(tabId).classList.add("active");
			event.currentTarget.classList.add("nav-tab-active");
		}

		document.addEventListener('DOMContentLoaded', function() {
			var defaultTab = document.querySelector('.nav-tab');
			if (defaultTab) {
				defaultTab.click();
			}

			var uploadButton = document.getElementById('upload-button');
			if (uploadButton) {
				var featureFallbackInput = document.getElementById('feature-fallback-input');
				var featureFallbackImage = document.getElementById('feature-fallback-image');
				
				uploadButton.addEventListener('click', function(e) {
					e.preventDefault();
					
										// Create the media frame.
					var imageFrame = wp.media({
						title: 'Upload Image',
						multiple: false,
						library: {
							type: 'image'
						},
						button: {
							text: 'Use this image'
						}
					});

										// When an image is selected, run a callback.
					imageFrame.on('select', function() {
						var attachment = imageFrame.state().get('selection').first().toJSON();
						featureFallbackInput.value = attachment.url;
						featureFallbackImage.src = attachment.url;
					});

										// Finally, open the modal.
					imageFrame.open();
				});
			}
		});
	</script>
	<?php
}
