<?php
/**
 * Variation Image By Attributes
 *
 * @package Ecomus
 */

namespace Ecomus\Addons\Modules\Variation_Image_By_Attributes;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Addons Modules
 */
class Module {

	/**
	 * Instance
	 *
	 * @var $instance
	 */
	private static $instance;


	/**
	 * Initiator
	 *
	 * @since 1.0.0
	 * @return object
	 */
	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Instantiate the object.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function __construct() {
		$this->includes();
		$this->actions();
		add_action('admin_init', array( $this, 'settings'));
	}

	/**
	 * Includes files
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	private function includes() {
		\Ecomus\Addons\Auto_Loader::register( [
			'Ecomus\Addons\Modules\Variation_Image_By_Attributes\Settings'   => ECOMUS_ADDONS_DIR . 'modules/variation-image-by-attributes/settings.php',
			'Ecomus\Addons\Modules\Variation_Image_By_Attributes\Frontend'   => ECOMUS_ADDONS_DIR . 'modules/variation-image-by-attributes/frontend.php',
		] );
	}

	/**
	 * Settings
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function settings() {
		if ( is_admin() ) {
			\Ecomus\Addons\Modules\Variation_Image_By_Attributes\Settings::instance();
		}
	}

	/**
	 * Add Actions
	 *
	 * @since 1.0.0
	 *
	* @return void
	 */
	public function actions() {
		if ( get_option( 'ecomus_variation_image_by_attributes' ) == 'yes' ) {
			\Ecomus\Addons\Modules\Variation_Image_By_Attributes\Frontend::instance();
		}
	}

}
