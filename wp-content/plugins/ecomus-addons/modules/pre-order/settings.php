<?php

namespace Ecomus\Addons\Modules\Pre_Order;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main class of plugin for admin
 */
class Settings  {

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
		add_filter( 'woocommerce_get_sections_products', array( $this, 'pre_order_section' ), 90, 2 );
		add_filter( 'woocommerce_get_settings_products', array( $this, 'pre_order_settings' ), 90, 2 );
	}

	/**
	 * Free Shipping Bar section
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public function pre_order_section( $sections ) {
		$sections['pre_order'] = esc_html__( 'Pre-Order', 'ecomus-addons' );

		return $sections;
	}

	/**
	 * Adds settings to product display settings
	 *
	 * @since 1.0.0
	 *
	 * @param array $settings
	 * @param string $section
	 *
	 * @return array
	 */
	public function pre_order_settings( $settings, $section ) {
		if ( 'pre_order' == $section ) {
			$settings = array();

			$settings[] = array(
				'id'    => 'ecomus_pre_order_options',
				'title' => esc_html__( 'Pre-Order', 'ecomus-addons' ),
				'type'  => 'title',
			);

			$settings[] = array(
				'id'      => 'ecomus_pre_order',
				'title'   => esc_html__( 'Pre-Order', 'ecomus-addons' ),
				'desc'    => esc_html__( 'Enable Pre-Order', 'ecomus-addons' ),
				'type'    => 'checkbox',
				'default' => 'no',
			);

			$settings[] = array(
				'id'      => 'ecomus_pre_order_auto_status',
				'title'   => esc_html__( 'Automatic status', 'ecomus-addons' ),
				'desc'    => esc_html__( 'Enable automatic status changes when release date arrives', 'ecomus-addons' ),
				'type'    => 'checkbox',
				'default' => 'no',
			);

			$settings[] = array(
				'id'   => 'ecomus_pre_order_options',
				'type' => 'sectionend',
			);
		}

		return $settings;
	}
}