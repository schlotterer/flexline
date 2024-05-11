<?php
/**
 * Enable multiple WYSIWYG editors in the theme customizer.
 *
 * @package flexline
 */

namespace FlexLine\flexline;

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}

/**
 * Class to create a custom text editor control
 */
final class Text_Editor_Custom_Control extends \WP_Customize_Control {

	/**
	 * Keep track of if scripts were added.
	 *
	 * @var $did_scripts
	 */
	protected static $did_scripts = false;

	/**
	 * Render the content on the theme customizer page
	 *
	 * @author Joel Schlotterer
	 */
	public function render_content() {
		?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
		</label>
		<div class="flexline-customize-text-editor">
			<?php
			// Setttings for the editor.
			$settings = array(
				'textarea_name' => $this->id,
				'textarea_rows' => 4,
				'media_buttons' => true,
			);

			// Add the editor.
			wp_editor( $this->value(), $this->id, $settings );

			// Only enqueue scripts once.
			if ( ! self::$did_scripts ) {
				$this->enqueue_scripts();
				$this->add_footer_scripts();

				self::$did_scripts = true;
			}
			?>
		</div>
		<?php
	}

	/**
	 * Enqueue scripts.
	 *
	 * @author Joel Schlotterer
	 */
	protected function enqueue_scripts() {
		wp_enqueue_script( 'tiny_mce' );
		wp_enqueue_script( 'flexline-customize-editor-js', get_template_directory_uri() . '/inc/customizer/assets/scripts/tinymce.js', array( 'jquery' ), '1.0.0', true );
	}

	/**
	 * Add footer scripts for Tinymce.
	 *
	 * @author Joel Schlotterer
	 */
	protected function add_footer_scripts() {
		do_action( 'flexline_admin_print_footer_scripts' );
	}
}
