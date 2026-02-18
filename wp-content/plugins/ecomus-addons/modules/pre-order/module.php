<?php
/**
 * Ecomus Addons Modules functions and definitions.
 *
 * @package Ecomus
 */

namespace Ecomus\Addons\Modules\Pre_Order;

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
			'Ecomus\Addons\Modules\Pre_Order\Settings'   => ECOMUS_ADDONS_DIR . 'modules/pre-order/settings.php',
			'Ecomus\Addons\Modules\Pre_Order\Frontend'   => ECOMUS_ADDONS_DIR . 'modules/pre-order/frontend.php',
		] );
	}

	/**
	 * Add Actions
	 *
	 * @since 1.0.0
	 *
	* @return void
	 */
	public function actions() {
		if ( get_option( 'ecomus_pre_order' ) == 'yes' ) {
			\Ecomus\Addons\Modules\Pre_Order\Product_Options::instance();
			\Ecomus\Addons\Modules\Pre_Order\Frontend::instance();
		}

		if ( is_admin() ) {
			\Ecomus\Addons\Modules\Pre_Order\Settings::instance();
		}
	}
}
