<?php
/**
 * FlexLine theme options admin page and tabs.
 *
 * @package flexline
 */

/**
 * Theme options page.
 *
 * This file is responsible for rendering the theme options page.
 *
 * @package FlexLine
 * @since   0.9.2
 */

require_once __DIR__ . '/render-theme-docs.php';
require_once __DIR__ . '/render-theme-utilities.php';

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
		'utilities'     => array(
			'title'   => 'Utilities',
			'content' => 'flexline_render_utilities_tab',
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
		<div class="nav-tab-wrapper" role="tablist" aria-label="FlexLine options sections">
			<?php
			$tab_index = 0;
			foreach ( $tabs as $tab_id => $tab ) :
				$button_id = 'flexline-tab-button-' . $tab_id;
				$panel_id  = 'flexline-tab-panel-' . $tab_id;
				$is_active = 0 === $tab_index;
				?>
				<button
					type="button"
					id="<?php echo esc_attr( $button_id ); ?>"
					class="nav-tab<?php echo $is_active ? ' nav-tab-active' : ''; ?>"
					role="tab"
					aria-selected="<?php echo $is_active ? 'true' : 'false'; ?>"
					aria-controls="<?php echo esc_attr( $panel_id ); ?>"
					data-tab-target="<?php echo esc_attr( $panel_id ); ?>"
				>
					<?php echo esc_html( $tab['title'] ); ?>
				</button>
				<?php
				++$tab_index;
			endforeach;
			?>
		</div>

		<!-- Tab Contents -->
		<?php
		$panel_index = 0;
		foreach ( $tabs as $tab_id => $tab ) :
			$button_id = 'flexline-tab-button-' . $tab_id;
			$panel_id  = 'flexline-tab-panel-' . $tab_id;
			$is_active = 0 === $panel_index;
			?>
			<div
				id="<?php echo esc_attr( $panel_id ); ?>"
				class="tab-content<?php echo $is_active ? ' active' : ''; ?>"
				role="tabpanel"
				aria-labelledby="<?php echo esc_attr( $button_id ); ?>"
				<?php if ( ! $is_active ) : ?>
					hidden
				<?php endif; ?>
			>
				<?php call_user_func( $tab['content'] ); ?>
			</div>
			<?php
			++$panel_index;
		endforeach;
		?>
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
	<?php
}
