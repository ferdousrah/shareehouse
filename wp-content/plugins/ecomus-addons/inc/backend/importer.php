<?php
/**
 * Hooks for importer
 *
 * @package Ecomus
 */

namespace Ecomus\Addons;


/**
 * Class Importter
 */
class Importer {

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
		add_filter( 'soo_demo_packages', array( $this, 'importer' ), 20 );
		add_action( 'soodi_before_import_content', array( $this,'import_product_attributes') );
		add_action( 'soodi_before_import_content', array( $this,'enable_svg_upload') );
		add_action( 'soodi_after_setup_pages', array( $this,'disable_svg_upload') );
		add_action('soodi_after_setup_pages', array( $this,'update_page_option') );

		add_filter('soodi_before_select_demo_page', array( $this, 'check_elementor_container_grid' ));
	}

	public function import_menu_parent_slug() {
		return 'ecomus_dashboard';
	}

	/**
	 * Importer the demo content
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	function importer() {
		return array(
			array(
				'name'       => 'Home Multi Brand(Women)',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/women/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/women/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/women/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/women/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home Women',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
				),
				'options'    => array(
					'woocommerce_thumbnail_cropping' => 'custom',
					'woocommerce_thumbnail_cropping_custom_width' => 2,
					'woocommerce_thumbnail_cropping_custom_height' => 3,
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Multi Brand(Men)',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/men/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/men/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/men/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/men/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home Men',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
				),
				'options'    => array(
					'woocommerce_thumbnail_cropping' => 'custom',
					'woocommerce_thumbnail_cropping_custom_width' => 2,
					'woocommerce_thumbnail_cropping_custom_height' => 3,
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Multi Brand(Kids)',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/kids/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/kids/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/kids/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/kids/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home Kids',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
				),
				'options'    => array(
					'shop_catalog_image_size'   => array(
						'width'  => 350,
						'height' => 350,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 600,
						'height' => 600,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Fashion v1',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/v1/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/v1/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/v1/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/v1/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home v1',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
				),
				'options'    => array(
					'woocommerce_thumbnail_cropping' => 'custom',
					'woocommerce_thumbnail_cropping_custom_width' => 2,
					'woocommerce_thumbnail_cropping_custom_height' => 3,
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Fashion v2',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/v2/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/v2/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/v2/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/v2/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home v2',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
				),
				'options'    => array(
					'woocommerce_thumbnail_cropping' => 'custom',
					'woocommerce_thumbnail_cropping_custom_width' => 2,
					'woocommerce_thumbnail_cropping_custom_height' => 3,
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),

			array(
				'name'       => 'Home Fashion v3',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/v3/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/v3/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/v3/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/v3/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home v3',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'socials' 		=> 'social-menu',
				),
				'options'    => array(
					'woocommerce_thumbnail_cropping' => 'custom',
					'woocommerce_thumbnail_cropping_custom_width' => 2,
					'woocommerce_thumbnail_cropping_custom_height' => 3,
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Fashion v4',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/v4/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/v4/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/v4/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/v4/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home v4',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'socials' 		=> 'social-menu',
				),
				'options'    => array(
					'woocommerce_thumbnail_cropping' => 'custom',
					'woocommerce_thumbnail_cropping_custom_width' => 2,
					'woocommerce_thumbnail_cropping_custom_height' => 3,
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Fashion v5',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/v5/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/v5/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/v5/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/v5/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home v5',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
				),
				'options'    => array(
					'woocommerce_thumbnail_cropping' => 'custom',
					'woocommerce_thumbnail_cropping_custom_width' => 2,
					'woocommerce_thumbnail_cropping_custom_height' => 3,
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Fashion v6',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/v6/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/v6/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/v6/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/v6/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home v6',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
				),
				'options'    => array(
					'woocommerce_thumbnail_cropping' => 'custom',
					'woocommerce_thumbnail_cropping_custom_width' => 2,
					'woocommerce_thumbnail_cropping_custom_height' => 3,
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Fashion v7',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/v7/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/v7/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/v7/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/v7/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home v7',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
				),
				'options'    => array(
					'woocommerce_thumbnail_cropping' => 'custom',
					'woocommerce_thumbnail_cropping_custom_width' => 2,
					'woocommerce_thumbnail_cropping_custom_height' => 3,
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Fashion v8',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/v8/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/v8/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/v8/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-fashion/v8/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home v8',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
				),
				'options'    => array(
					'woocommerce_thumbnail_cropping' => 'custom',
					'woocommerce_thumbnail_cropping_custom_width' => 2,
					'woocommerce_thumbnail_cropping_custom_height' => 3,
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Activewear',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-activewear/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-activewear/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-activewear/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-activewear/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home Activewear',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
				),
				'options'    => array(
					'woocommerce_thumbnail_cropping' => 'custom',
					'woocommerce_thumbnail_cropping_custom_width' => 2,
					'woocommerce_thumbnail_cropping_custom_height' => 3,
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home POD',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-pod/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-pod/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-pod/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-pod/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home POD',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
				),
				'options'    => array(
					'woocommerce_thumbnail_cropping' => 'custom',
					'woocommerce_thumbnail_cropping_custom_width' => 2,
					'woocommerce_thumbnail_cropping_custom_height' => 3,
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Gift Card',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-gift-card/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-gift-card/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-gift-card/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-gift-card/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home Gift Card',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
				),
				'options'    => array(
					'woocommerce_thumbnail_cropping' => 'custom',
					'woocommerce_thumbnail_cropping_custom_width' => 38,
					'woocommerce_thumbnail_cropping_custom_height' => 27,
					'shop_catalog_image_size'   => array(
						'width'  => 315,
						'height' => 224,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 661,
						'height' => 469,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Decor',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-decor/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-decor/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-decor/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-decor/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home Decor',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
				),
				'options'    => array(
					'woocommerce_thumbnail_cropping' => 'custom',
					'woocommerce_thumbnail_cropping_custom_width' => 2,
					'woocommerce_thumbnail_cropping_custom_height' => 3,
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Furniture',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-furniture/v1/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-furniture/v1/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-furniture/v1/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-furniture/v1/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home Furniture',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
				),
				'options'    => array(
					'woocommerce_thumbnail_cropping' => 'custom',
					'woocommerce_thumbnail_cropping_custom_width' => 5,
					'woocommerce_thumbnail_cropping_custom_height' => 7,
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Furniture v2',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-furniture/v2/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-furniture/v2/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-furniture/v2/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-furniture/v2/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home Furniture v2',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
				),
				'options'    => array(
					'woocommerce_thumbnail_cropping' => 'custom',
					'woocommerce_thumbnail_cropping_custom_width' => 5,
					'woocommerce_thumbnail_cropping_custom_height' => 7,
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Sunglasses',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-sunglasses/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-sunglasses/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-sunglasses/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-sunglasses/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home Sunglasses',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
				),
				'options'    => array(
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Electronic',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-electronic/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-electronic/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-electronic/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-electronic/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home Electronic',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
				),
				'options'    => array(
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Setup Gear',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-setup-gear/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-setup-gear/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-setup-gear/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-setup-gear/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home Setup Gear',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
				),
				'options'    => array(
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Grocery',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-grocery/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-grocery/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-grocery/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-grocery/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home Grocery',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
					'category-menu' 		=> 'category-menu',
				),
				'options'    => array(
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Accessories',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-accessories/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-accessories/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-accessories/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-accessories/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home Accessories',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
					'category-menu' 		=> 'category-menu',
				),
				'options'    => array(
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Electronic',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-electronic/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-electronic/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-electronic/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-electronic/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home Electronic',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
				),
				'options'    => array(
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Setup Gear',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-setup-gear/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-setup-gear/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-setup-gear/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-setup-gear/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home Setup Gear',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
				),
				'options'    => array(
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Bike',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-bike/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-bike/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-bike/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-bike/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home Bike',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
					'category-menu' 	=> 'category-menu',
				),
				'options'    => array(
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Skincare',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-skincare/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-skincare/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-skincare/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-skincare/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home Skincare',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
					'category-menu' 	=> 'category-menu',
				),
				'options'    => array(
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Sneaker',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-sneaker/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-sneaker/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-sneaker/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-sneaker/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home Sneaker',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
					'category-menu' 	=> 'category-menu',
				),
				'options'    => array(
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Dog Accessories',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-dog-accessories/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-dog-accessories/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-dog-accessories/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-dog-accessories/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home Dog Accessories',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
					'category-menu' 	=> 'category-menu',
				),
				'options'    => array(
					'woocommerce_thumbnail_cropping' => 'custom',
					'woocommerce_thumbnail_cropping_custom_width' => 169,
					'woocommerce_thumbnail_cropping_custom_height' => 193,
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Kitchen Wear',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-kitchen-wear/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-kitchen-wear/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-kitchen-wear/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-kitchen-wear/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home Kitchen Wear',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
					'category-menu' 	=> 'category-menu',
				),
				'options'    => array(
					'woocommerce_thumbnail_cropping' => 'custom',
					'woocommerce_thumbnail_cropping_custom_width' => 345,
					'woocommerce_thumbnail_cropping_custom_height' => 259,
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Handbag',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-handbag/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-handbag/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-handbag/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-handbag/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home Handbag',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
					'category-menu' 	=> 'category-menu',
				),
				'options'    => array(
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Cosmetic',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-cosmetic/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-cosmetic/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-cosmetic/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-cosmetic/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home Cosmetic',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
					'category-menu' 	=> 'category-menu',
				),
				'options'    => array(
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Socks',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-socks/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-socks/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-socks/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-socks/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home Socks',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
					'category-menu' 	=> 'category-menu',
				),
				'options'    => array(
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Footwear',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-footwear/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-footwear/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-footwear/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-footwear/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home Footwear',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
					'category-menu' 	=> 'category-menu',
				),
				'options'    => array(
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Baby',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-baby/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-baby/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-baby/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-baby/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home Baby',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
					'category-menu' 	=> 'category-menu',
				),
				'options'    => array(
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Tee',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-tee/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-tee/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-tee/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-tee/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home Tee',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
					'category-menu' 	=> 'category-menu',
				),
				'options'    => array(
					'woocommerce_thumbnail_cropping' => 'custom',
					'woocommerce_thumbnail_cropping_custom_width' => 5,
					'woocommerce_thumbnail_cropping_custom_height' => 7,
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Phonecase',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-phonecase/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-phonecase/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-phonecase/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-phonecase/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home Phonecase',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
					'category-menu' 	=> 'category-menu',
				),
				'options'    => array(
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'       => 'Home Headphone',
				'content'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-headphone/demo-content.xml',
				'widgets'     => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-headphone/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-headphone/customizer.dat',
				'preview'   => 'https://raw.githubusercontent.com/drfuri/demo-content/main/ecomus/home-headphone/preview.jpg',
				'pages'      => array(
					'front_page' => 'Home Headphone',
					'blog'       => 'Blog',
					'cart'		 => 'shop-cart',
					'checkout'	 => 'shop-checkout',
				),
				'menus'      => array(
					'primary-menu' 		=> 'primary-menu',
					'secondary-menu' 	=> 'secondary-menu',
					'social-menu' 		=> 'social-menu',
					'category-menu' 	=> 'category-menu',
				),
				'options'    => array(
					'woocommerce_thumbnail_cropping' => 'custom',
					'woocommerce_thumbnail_cropping_custom_width' => 5,
					'woocommerce_thumbnail_cropping_custom_height' => 7,
					'shop_catalog_image_size'   => array(
						'width'  => 337,
						'height' => 472,
						'crop'   => 1,
					),
					'shop_single_image_size'    => array(
						'width'  => 560,
						'height' => 840,
						'crop'   => 1,
					),
					'shop_thumbnail_image_size' => array(
						'width'  => 70,
						'height' => 70,
						'crop'   => 1,
					),
				),
			),
			array(
				'name'    => 'Home Jewelry',
				'content'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-jewelry/demo-content.xml',
				'widgets'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-jewelry/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-jewelry/customizer.dat',
				'preview'  => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-jewelry/preview.jpg',
				'pages'   => array(
				  'front_page' => 'Home Jewelry',
				  'blog'    => 'Blog',
				  'cart'    => 'shop-cart',
				  'checkout'  => 'shop-checkout',
				),
				'menus'   => array(
				  'primary-menu'   => 'primary-menu',
				  'secondary-menu'  => 'secondary-menu',
				  'social-menu'    => 'social-menu',
				  'category-menu'   => 'category-menu',
				),
				'options'  => array(
				  'shop_catalog_image_size'  => array(
					'width' => 337,
					'height' => 472,
					'crop'  => 1,
				  ),
				  'shop_single_image_size'  => array(
					'width' => 560,
					'height' => 840,
					'crop'  => 1,
				  ),
				  'shop_thumbnail_image_size' => array(
					'width' => 70,
					'height' => 70,
					'crop'  => 1,
				  ),
				),
			),
			array(
				'name'    => 'Home Strollers',
				'content'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-strollers/demo-content.xml',
				'widgets'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-strollers/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-strollers/customizer.dat',
				'preview'  => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-strollers/preview.jpg',
				'pages'   => array(
				  'front_page' => 'Home Stroller',
				  'blog'    => 'Blog',
				  'cart'    => 'shop-cart',
				  'checkout'  => 'shop-checkout',
				),
				'menus'   => array(
				  'primary-menu'   => 'primary-menu',
				  'secondary-menu'  => 'secondary-menu',
				  'social-menu'    => 'social-menu',
				  'category-menu'   => 'category-menu',
				),
				'options'  => array(
				  'shop_catalog_image_size'  => array(
					'width' => 337,
					'height' => 472,
					'crop'  => 1,
				  ),
				  'shop_single_image_size'  => array(
					'width' => 560,
					'height' => 840,
					'crop'  => 1,
				  ),
				  'shop_thumbnail_image_size' => array(
					'width' => 70,
					'height' => 70,
					'crop'  => 1,
				  ),
				),
			),
			array(
				'name'    => 'Home Paddle Boards',
				'content'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-paddle-boards/demo-content.xml',
				'widgets'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-paddle-boards/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-paddle-boards/customizer.dat',
				'preview'  => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-paddle-boards/preview.jpg',
				'pages'   => array(
					'front_page' => 'Home Paddle Boards',
					'blog'    => 'Blog',
					'cart'    => 'shop-cart',
					'checkout'  => 'shop-checkout',
				),
				'menus'   => array(
					'primary-menu'   => 'primary-menu',
					'secondary-menu'  => 'secondary-menu',
					'social-menu'    => 'social-menu',
					'category-menu'   => 'category-menu',
				),
				'options'  => array(
					'shop_catalog_image_size'  => array(
					'width' => 337,
					'height' => 472,
					'crop'  => 1,
					),
					'shop_single_image_size'  => array(
					'width' => 560,
					'height' => 840,
					'crop'  => 1,
					),
					'shop_thumbnail_image_size' => array(
					'width' => 70,
					'height' => 70,
					'crop'  => 1,
					),
				),
			),
			array(
				'name'    => 'Home Skateboard',
				'content'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-skateboard/demo-content.xml',
				'widgets'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-skateboard/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-skateboard/customizer.dat',
				'preview'  => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-skateboard/preview.jpg',
				'pages'   => array(
					'front_page' => 'Home Skateboard',
					'blog'    => 'Blog',
					'cart'    => 'shop-cart',
					'checkout'  => 'shop-checkout',
				),
				'menus'   => array(
					'primary-menu'   => 'primary-menu',
					'secondary-menu'  => 'secondary-menu',
					'social-menu'    => 'social-menu',
					'category-menu'   => 'category-menu',
				),
				'options'  => array(
					'shop_catalog_image_size'  => array(
					'width' => 337,
					'height' => 472,
					'crop'  => 1,
					),
					'shop_single_image_size'  => array(
					'width' => 560,
					'height' => 840,
					'crop'  => 1,
					),
					'shop_thumbnail_image_size' => array(
					'width' => 70,
					'height' => 70,
					'crop'  => 1,
					),
				),
			),
			array(
				'name'    => 'Home Food',
				'content'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-food/demo-content.xml',
				'widgets'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-food/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-food/customizer.dat',
				'preview'  => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-food/preview.jpg',
				'pages'   => array(
					'front_page' => 'Home Food',
					'blog'    => 'Blog',
					'cart'    => 'shop-cart',
					'checkout'  => 'shop-checkout',
				),
				'menus'   => array(
					'primary-menu'   => 'primary-menu',
					'secondary-menu'  => 'secondary-menu',
					'social-menu'    => 'social-menu',
					'category-menu'   => 'category-menu',
				),
				'options'  => array(
					'shop_catalog_image_size'  => array(
					'width' => 337,
					'height' => 472,
					'crop'  => 1,
					),
					'shop_single_image_size'  => array(
					'width' => 560,
					'height' => 840,
					'crop'  => 1,
					),
					'shop_thumbnail_image_size' => array(
					'width' => 70,
					'height' => 70,
					'crop'  => 1,
					),
				),
			),
			array(
				'name'    => 'Home Plant',
				'content'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-plant/demo-content.xml',
				'widgets'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-plant/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-plant/customizer.dat',
				'preview'  => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-plant/preview.jpg',
				'pages'   => array(
					'front_page' => 'Home Plant',
					'blog'    => 'Blog',
					'cart'    => 'shop-cart',
					'checkout'  => 'shop-checkout',
				),
				'menus'   => array(
					'primary-menu'   => 'primary-menu',
					'secondary-menu'  => 'secondary-menu',
					'social-menu'    => 'social-menu',
					'category-menu'   => 'category-menu',
				),
				'options'  => array(
					'shop_catalog_image_size'  => array(
					'width' => 337,
					'height' => 472,
					'crop'  => 1,
					),
					'shop_single_image_size'  => array(
					'width' => 560,
					'height' => 840,
					'crop'  => 1,
					),
					'shop_thumbnail_image_size' => array(
					'width' => 70,
					'height' => 70,
					'crop'  => 1,
					),
				),
			),
			array(
				'name'    => 'Home Footwear',
				'content'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-footwear/demo-content.xml',
				'widgets'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-footwear/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-footwear/customizer.dat',
				'preview'  => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-footwear/preview.jpg',
				'pages'   => array(
					'front_page' => 'Home Footwear',
					'blog'    => 'Blog',
					'cart'    => 'shop-cart',
					'checkout'  => 'shop-checkout',
				),
				'menus'   => array(
					'primary-menu'   => 'primary-menu',
					'secondary-menu'  => 'secondary-menu',
					'social-menu'    => 'social-menu',
					'category-menu'   => 'category-menu',
				),
				'options'  => array(
					'shop_catalog_image_size'  => array(
					'width' => 337,
					'height' => 472,
					'crop'  => 1,
					),
					'shop_single_image_size'  => array(
					'width' => 560,
					'height' => 840,
					'crop'  => 1,
					),
					'shop_thumbnail_image_size' => array(
					'width' => 70,
					'height' => 70,
					'crop'  => 1,
					),
				),
			),
			array(
				'name'    => 'Home Swimwear',
				'content'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-swimwear/demo-content.xml',
				'widgets'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-swimwear/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-swimwear/customizer.dat',
				'preview'  => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-swimwear/preview.jpg',
				'pages'   => array(
					'front_page' => 'Home Swimwear',
					'blog'    => 'Blog',
					'cart'    => 'shop-cart',
					'checkout'  => 'shop-checkout',
				),
				'menus'   => array(
					'primary-menu'   => 'primary-menu',
					'secondary-menu'  => 'secondary-menu',
					'social-menu'    => 'social-menu',
					'category-menu'   => 'category-menu',
				),
				'options'  => array(
					'shop_catalog_image_size'  => array(
					'width' => 337,
					'height' => 472,
					'crop'  => 1,
					),
					'shop_single_image_size'  => array(
					'width' => 560,
					'height' => 840,
					'crop'  => 1,
					),
					'shop_thumbnail_image_size' => array(
					'width' => 70,
					'height' => 70,
					'crop'  => 1,
					),
				),
			),
			array(
				'name'    => 'Home Camp and Hike',
				'content'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-camp-and-hike/demo-content.xml',
				'widgets'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-camp-and-hike/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-camp-and-hike/customizer.dat',
				'preview'  => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-camp-and-hike/preview.jpg',
				'pages'   => array(
					'front_page' => 'Home Camp and Hike',
					'blog'    => 'Blog',
					'cart'    => 'shop-cart',
					'checkout'  => 'shop-checkout',
				),
				'menus'   => array(
					'primary-menu'   => 'primary-menu',
					'secondary-menu'  => 'secondary-menu',
					'social-menu'    => 'social-menu',
					'category-menu'   => 'category-menu',
				),
				'options'  => array(
					'shop_catalog_image_size'  => array(
					'width' => 337,
					'height' => 472,
					'crop'  => 1,
					),
					'shop_single_image_size'  => array(
					'width' => 560,
					'height' => 840,
					'crop'  => 1,
					),
					'shop_thumbnail_image_size' => array(
					'width' => 70,
					'height' => 70,
					'crop'  => 1,
					),
				),
			),
			array(
				'name'    => 'Home Ceramic',
				'content'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-ceramic/demo-content.xml',
				'widgets'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-ceramic/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-ceramic/customizer.dat',
				'preview'  => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-ceramic/preview.jpg',
				'pages'   => array(
					'front_page' => 'Home Ceramic',
					'blog'    => 'Blog',
					'cart'    => 'shop-cart',
					'checkout'  => 'shop-checkout',
				),
				'menus'   => array(
					'primary-menu'   => 'primary-menu',
					'secondary-menu'  => 'secondary-menu',
					'social-menu'    => 'social-menu',
					'category-menu'   => 'category-menu',
				),
				'options'  => array(
					'shop_catalog_image_size'  => array(
					'width' => 337,
					'height' => 472,
					'crop'  => 1,
					),
					'shop_single_image_size'  => array(
					'width' => 560,
					'height' => 840,
					'crop'  => 1,
					),
					'shop_thumbnail_image_size' => array(
					'width' => 70,
					'height' => 70,
					'crop'  => 1,
					),
				),
			),
			array(
				'name'    => 'Home Pickleball',
				'content'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-pickleball/demo-content.xml',
				'widgets'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-pickleball/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-pickleball/customizer.dat',
				'preview'  => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-pickleball/preview.jpg',
				'pages'   => array(
					'front_page' => 'Home Pickleball',
					'blog'    => 'Blog',
					'cart'    => 'shop-cart',
					'checkout'  => 'shop-checkout',
				),
				'menus'   => array(
					'primary-menu'   => 'primary-menu',
					'secondary-menu'  => 'secondary-menu',
					'social-menu'    => 'social-menu',
					'category-menu'   => 'category-menu',
				),
				'options'  => array(
					'shop_catalog_image_size'  => array(
					'width' => 337,
					'height' => 472,
					'crop'  => 1,
					),
					'shop_single_image_size'  => array(
					'width' => 560,
					'height' => 840,
					'crop'  => 1,
					),
					'shop_thumbnail_image_size' => array(
					'width' => 70,
					'height' => 70,
					'crop'  => 1,
					),
				),
			),
			array(
				'name'    => 'Home Personalized Pod',
				'content'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-personalized-pod/demo-content.xml',
				'widgets'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-personalized-pod/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-personalized-pod/customizer.dat',
				'preview'  => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-personalized-pod/preview.jpg',
				'pages'   => array(
					'front_page' => 'Home Personalized Pod',
					'blog'    => 'Blog',
					'cart'    => 'shop-cart',
					'checkout'  => 'shop-checkout',
				),
				'menus'   => array(
					'primary-menu'   => 'primary-menu',
					'secondary-menu'  => 'secondary-menu',
					'social-menu'    => 'social-menu',
					'category-menu'   => 'category-menu',
				),
				'options'  => array(
					'shop_catalog_image_size'  => array(
					'width' => 337,
					'height' => 472,
					'crop'  => 1,
					),
					'shop_single_image_size'  => array(
					'width' => 560,
					'height' => 840,
					'crop'  => 1,
					),
					'shop_thumbnail_image_size' => array(
					'width' => 70,
					'height' => 70,
					'crop'  => 1,
					),
				),
			),
			array(
				'name'    => 'Home Book Store',
				'content'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-book-store/demo-content.xml',
				'widgets'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-book-store/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-book-store/customizer.dat',
				'preview'  => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-book-store/preview.jpg',
				'pages'   => array(
					'front_page' => 'Home Book Store',
					'blog'    => 'Blog',
					'cart'    => 'shop-cart',
					'checkout'  => 'shop-checkout',
				),
				'menus'   => array(
					'primary-menu'   => 'primary-menu',
					'secondary-menu'  => 'secondary-menu',
					'social-menu'    => 'social-menu',
					'category-menu'   => 'category-menu',
				),
				'options'  => array(
					'shop_catalog_image_size'  => array(
					'width' => 337,
					'height' => 472,
					'crop'  => 1,
					),
					'shop_single_image_size'  => array(
					'width' => 560,
					'height' => 840,
					'crop'  => 1,
					),
					'shop_thumbnail_image_size' => array(
					'width' => 70,
					'height' => 70,
					'crop'  => 1,
					),
				),
			),
			array(
				'name'    => 'Home Gaming Accessories',
				'content'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-gaming-accessories/demo-content.xml',
				'widgets'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-gaming-accessories/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-gaming-accessories/customizer.dat',
				'preview'  => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-gaming-accessories/preview.jpg',
				'pages'   => array(
					'front_page' => 'Home Gaming Accessories',
					'blog'    => 'Blog',
					'cart'    => 'shop-cart',
					'checkout'  => 'shop-checkout',
				),
				'menus'   => array(
					'primary-menu'   => 'primary-menu',
					'secondary-menu'  => 'secondary-menu',
					'social-menu'    => 'social-menu',
					'category-menu'   => 'category-menu',
				),
				'options'  => array(
					'shop_catalog_image_size'  => array(
					'width' => 337,
					'height' => 472,
					'crop'  => 1,
					),
					'shop_single_image_size'  => array(
					'width' => 560,
					'height' => 840,
					'crop'  => 1,
					),
					'shop_thumbnail_image_size' => array(
					'width' => 70,
					'height' => 70,
					'crop'  => 1,
					),
				),
			),
			array(
				'name'    => 'Home Drinkwear',
				'content'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-drinkwear/demo-content.xml',
				'widgets'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-drinkwear/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-drinkwear/customizer.dat',
				'preview'  => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-drinkwear/preview.jpg',
				'pages'   => array(
					'front_page' => 'Home Drinkwear',
					'blog'    => 'Blog',
					'cart'    => 'shop-cart',
					'checkout'  => 'shop-checkout',
				),
				'menus'   => array(
					'primary-menu'   => 'primary-menu',
					'secondary-menu'  => 'secondary-menu',
					'social-menu'    => 'social-menu',
					'category-menu'   => 'category-menu',
				),
				'options'  => array(
					'shop_catalog_image_size'  => array(
					'width' => 337,
					'height' => 472,
					'crop'  => 1,
					),
					'shop_single_image_size'  => array(
					'width' => 560,
					'height' => 840,
					'crop'  => 1,
					),
					'shop_thumbnail_image_size' => array(
					'width' => 70,
					'height' => 70,
					'crop'  => 1,
					),
				),
			),
			array(
				'name'    => 'Home Supplement',
				'content'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-supplement/demo-content.xml',
				'widgets'   => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-supplement/widgets.wie',
				'customizer' => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-supplement/customizer.dat',
				'preview'  => 'https://raw.githubusercontent.com/drfuri/demo-content/refs/heads/main/ecomus/home-supplement/preview.jpg',
				'pages'   => array(
					'front_page' => 'Home Supplement',
					'blog'    => 'Blog',
					'cart'    => 'shop-cart',
					'checkout'  => 'shop-checkout',
				),
				'menus'   => array(
					'primary-menu'   => 'primary-menu',
					'secondary-menu'  => 'secondary-menu',
					'social-menu'    => 'social-menu',
					'category-menu'   => 'category-menu',
				),
				'options'  => array(
					'shop_catalog_image_size'  => array(
					'width' => 337,
					'height' => 472,
					'crop'  => 1,
					),
					'shop_single_image_size'  => array(
					'width' => 560,
					'height' => 840,
					'crop'  => 1,
					),
					'shop_thumbnail_image_size' => array(
					'width' => 70,
					'height' => 70,
					'crop'  => 1,
					),
				),
			)
			
		);
	}

	/**
	 * Prepare product attributes before import demo content
	 *
	 * @param $file
	 */
	function import_product_attributes( $file ) {
		global $wpdb;

		if ( ! class_exists( 'WXR_Parser' ) ) {
			if ( ! file_exists( WP_PLUGIN_DIR . '/soo-demo-importer/includes/parsers.php' ) ) {
				return;
			}

			require_once WP_PLUGIN_DIR . '/soo-demo-importer/includes/parsers.php';
		}

		$parser      = new \WXR_Parser();
		$import_data = $parser->parse( $file );

		if ( empty( $import_data ) || is_wp_error( $import_data ) ) {
			return;
		}

		if ( isset( $import_data['posts'] ) ) {
			$posts = $import_data['posts'];

			if ( $posts && sizeof( $posts ) > 0 ) {
				foreach ( $posts as $post ) {
					if ( 'product' === $post['post_type'] ) {
						if ( ! empty( $post['terms'] ) ) {
							foreach ( $post['terms'] as $term ) {
								if ( strstr( $term['domain'], 'pa_' ) ) {
									if ( ! taxonomy_exists( $term['domain'] ) ) {
										$attribute_name = wc_sanitize_taxonomy_name( str_replace( 'pa_', '', $term['domain'] ) );

										// Create the taxonomy
										if ( ! in_array( $attribute_name, wc_get_attribute_taxonomies() ) ) {
											$attribute = array(
												'attribute_label'   => $attribute_name,
												'attribute_name'    => $attribute_name,
												'attribute_type'    => 'select',
												'attribute_orderby' => 'menu_order',
												'attribute_public'  => 0
											);
											$wpdb->insert( $wpdb->prefix . 'woocommerce_attribute_taxonomies', $attribute );
											delete_transient( 'wc_attribute_taxonomies' );
										}

										// Register the taxonomy now so that the import works!
										register_taxonomy(
											$term['domain'],
											apply_filters( 'woocommerce_taxonomy_objects_' . $term['domain'], array( 'product' ) ),
											apply_filters( 'woocommerce_taxonomy_args_' . $term['domain'], array(
												'hierarchical' => true,
												'show_ui'      => false,
												'query_var'    => true,
												'rewrite'      => false,
											) )
										);
									}
								}
							}
						}
					}
				}
			}
		}
	}

	/**
	 * Enable svg upload
	 *
	 * @param $file
	 */
	function enable_svg_upload() {
		add_filter('upload_mimes', array($this, 'svg_upload_types'));
	}

	/**
	 * Enable svg upload
	 *
	 * @param $file
	 */
	function svg_upload_types($file_types) {
		$new_filetypes = array();
		$new_filetypes['svg'] = 'image/svg+xml';
		$new_filetypes['webp'] = 'image/webp';
		$file_types = array_merge($file_types, $new_filetypes );
		return $file_types;
	}

	/**
	 * Enable svg upload
	 *
	 * @param $file
	 */
	function disable_svg_upload() {
		remove_filter('upload_mimes', array($this, 'svg_upload_types'));
	}

	/**
	 * Update page option
	 *
	 * @param $file
	 */
	function update_page_option($demo) {
		if ( isset( $demo['help_center_page'] ) ) {
			$page = $this->get_page_by_slug( $demo['help_center_page'] );
			if ( $page ) {
				update_option( 'help_center_page_id', $page->ID );
			}
		}

		if ( isset( $demo['order_tracking_page'] ) ) {
			$page = $this->get_page_by_slug( $demo['order_tracking_page'] );
			if ( $page ) {
				update_option( 'order_tracking_page_id', $page->ID );
			}
		}
	}


	/**
	 * Get page by slug
	 *
	 * @param $page_slug
	 */
	public function get_page_by_slug($page_slug) {
		$args = array(
			'name'           => $page_slug,
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'posts_per_page' => 1
		);
		$posts = get_posts( $args );
		$post = $posts ? $posts[0] : '';
		wp_reset_postdata();

		return $post;
	}

	public function check_elementor_container_grid($data_tabs) {
		if (class_exists('\Elementor\Plugin') && ! \Elementor\Plugin::$instance->experiments->is_feature_active( 'container' ) ) {
			echo sprintf('<h4>%s</h4>', esc_html('In order to use Ecomus demo, first you need to active Container in Elementor. Go to Elementor > Settings > Features > Container to select active option.', 'ecomus-addons'));
			echo sprintf('<a href="%s">%s</a>', esc_url(admin_url('admin.php?page=elementor-settings#tab-experiments')), esc_html('Active Elementor Container', 'ecomus-addons'));
			$data_tabs = array();

		}
		return $data_tabs;

	}
}