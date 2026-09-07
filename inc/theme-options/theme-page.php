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
require_once __DIR__ . '/render-theme-frames.php';
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
		'frames'        => array(
			'title'   => 'Section Frames',
			'content' => 'flexline_render_frames_tab',
		),
		'documentation' => array(
			'title'   => 'Documentation',
			'content' => '\FlexLine\flexline_render_documentation_tab',
		),
	);

	$requested_tab = filter_input( INPUT_GET, 'tab', FILTER_UNSAFE_RAW );
	$current_tab   = $requested_tab ? sanitize_key( $requested_tab ) : 'settings';
	if ( ! isset( $tabs[ $current_tab ] ) ) {
		$current_tab = 'settings';
	}
	?>
	<div class="wrap">
		<h1>FlexLine Theme Options</h1>

		<!-- Tabs -->
		<div class="nav-tab-wrapper" role="tablist" aria-label="FlexLine options sections">
			<?php
			foreach ( $tabs as $tab_id => $tab ) :
				$button_id = 'flexline-tab-button-' . $tab_id;
				$panel_id  = 'flexline-tab-panel-' . $tab_id;
				$is_active = $current_tab === $tab_id;
				$tab_url   = add_query_arg(
					array(
						'page' => 'flexline_theme_options',
						'tab'  => $tab_id,
					),
					admin_url( 'themes.php' )
				);
				?>
				<a
					href="<?php echo esc_url( $tab_url ); ?>"
					id="<?php echo esc_attr( $button_id ); ?>"
					class="nav-tab<?php echo $is_active ? ' nav-tab-active' : ''; ?>"
					role="tab"
					aria-selected="<?php echo $is_active ? 'true' : 'false'; ?>"
					aria-controls="<?php echo esc_attr( $panel_id ); ?>"
					data-tab-target="<?php echo esc_attr( $panel_id ); ?>"
					data-tab-id="<?php echo esc_attr( $tab_id ); ?>"
				>
					<?php echo esc_html( $tab['title'] ); ?>
				</a>
				<?php
			endforeach;
			?>
		</div>

		<!-- Tab Contents -->
		<?php
		foreach ( $tabs as $tab_id => $tab ) :
			$button_id = 'flexline-tab-button-' . $tab_id;
			$panel_id  = 'flexline-tab-panel-' . $tab_id;
			$is_active = $current_tab === $tab_id;
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
		.flexline-frame-guidance {
			align-items: start;
			display: grid;
			gap: 1rem;
			grid-template-columns: minmax(280px, 1fr) minmax(320px, 1fr);
			margin: 1rem 0;
			max-width: 980px;
		}
		.flexline-frame-guidance h3 {
			margin-top: 0;
		}
		.flexline-frame-guidance ul {
			list-style: disc;
			margin-left: 1.25rem;
		}
		.flexline-frame-examples {
			display: grid;
			gap: 0.75rem;
			grid-template-columns: repeat(2, minmax(0, 1fr));
		}
		.flexline-frame-examples figure {
			background: #fff;
			border: 1px solid #c3c4c7;
			margin: 0;
			padding: 0.75rem;
		}
		.flexline-frame-examples svg {
			background:
				linear-gradient(45deg, #f0f0f1 25%, transparent 25%),
				linear-gradient(-45deg, #f0f0f1 25%, transparent 25%),
				linear-gradient(45deg, transparent 75%, #f0f0f1 75%),
				linear-gradient(-45deg, transparent 75%, #f0f0f1 75%);
			background-position: 0 0, 0 8px, 8px -8px, -8px 0;
			background-size: 16px 16px;
			display: block;
			height: 72px;
			width: 100%;
		}
		.flexline-frame-examples path {
			fill: #1d2327;
		}
		.flexline-frame-examples figcaption {
			margin-top: 0.5rem;
		}
		.flexline-frame-svg-preview {
			align-items: center;
			background:
				linear-gradient(45deg, #f0f0f1 25%, transparent 25%),
				linear-gradient(-45deg, #f0f0f1 25%, transparent 25%),
				linear-gradient(45deg, transparent 75%, #f0f0f1 75%),
				linear-gradient(-45deg, transparent 75%, #f0f0f1 75%);
			background-color: #fff;
			background-position: 0 0, 0 6px, 6px -6px, -6px 0;
			background-size: 12px 12px;
			border: 1px solid #c3c4c7;
			display: flex;
			height: 52px;
			justify-content: center;
			margin-bottom: 0.5rem;
			max-width: 180px;
			overflow: hidden;
		}
		.flexline-frame-svg-preview:empty::before {
			color: #646970;
			content: "No preview";
			font-size: 12px;
		}
		.flexline-frame-svg-preview img {
			display: block;
			height: 100%;
			object-fit: fill;
			width: 100%;
		}
		.flexline-frame-svg-actions {
			align-items: center;
			display: flex;
			gap: 0.5rem;
			margin: 0;
		}
		@media (max-width: 960px) {
			.flexline-frame-guidance,
			.flexline-frame-examples {
				grid-template-columns: 1fr;
			}
		}
	</style>
	<?php
}
