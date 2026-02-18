<?php

namespace Ecomus\Addons\Elementor\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Featured Product widget
 */
class Featured_Product extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ecomus-featured-product';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( '[Ecomus] Featured Product', 'ecomus-addons' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-single-product';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'ecomus-addons' ];
	}

    public function get_script_depends() {
		return [
            'imagesLoaded',
			'ecomus-elementor-widgets',
		];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'section_products',
			[ 'label' => esc_html__( 'Products', 'ecomus-addons' ) ]
		);

		$this->add_control(
			'product_id',
			[
				'label' => __( 'Products', 'ecomus-addons' ),
				'type' => 'ecomus-autocomplete',
				'placeholder' => esc_html__( 'Click here and start typing...', 'ecomus-addons' ),
				'default' => '',
				'multiple'    => false,
				'source'      => 'product',
				'sortable'    => true,
				'label_block' => true,
			]
		);

		$this->add_control(
			'product_title_size',
			[
				'label' => __( 'Product Title HTML Tag', 'ecomus-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'h2',
			]
		);

		$this->add_responsive_control(
			'gallery_layout',
			[
				'label'                => esc_html__( 'Gallery Layout', 'ecomus-addons' ),
				'type'                 => Controls_Manager::CHOOSE,
				'label_block'          => false,
				'options'              => [
					'left'   => [
						'title' => esc_html__( 'Left', 'ecomus-addons' ),
						'icon'  => 'eicon-h-align-left',
					],
					'bottom'  => [
						'title' => esc_html__( 'Bottom', 'ecomus-addons' ),
						'icon'  => 'eicon-v-align-bottom',
					],
				],
				'default' => 'bottom',
				'separator' => 'before',
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render icon box widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 */
	protected function render() {
        $settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'wrapper', 'class', [ 'ecomus-featured-product', 'single-product', 'woocommerce', 'ecomus-featured-product__gallery--' . $settings['gallery_layout'] ] );

        if( empty( $settings['product_id'] ) ) {
            return;
        }

        $product = wc_get_product( intval( $settings['product_id'] ) );
	?>
        <div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>

            <?php
            if( empty( $product ) ) {
                echo '<p>'. esc_html__( 'No products were found matching your selection.', 'ecomus-addons' ) .'</p>';
            } else {
				add_filter( 'woocommerce_single_product_image_gallery_classes', array( $this, 'single_product_image_gallery_classes' ), 20, 1 );
				add_filter( 'ecomus_product_card_title_heading_tag', array( $this, 'product_card_title_heading_tag' ), 5 );
                $original_post = $GLOBALS['post'];

                $GLOBALS['post'] = get_post( intval( $settings['product_id'] ) );
                setup_postdata( $GLOBALS['post'] );
				wc_get_template_part( 'content', 'single-product-summary' );
				$GLOBALS['post'] = $original_post;
                wp_reset_postdata();
				remove_filter( 'woocommerce_single_product_image_gallery_classes', array( $this, 'single_product_image_gallery_classes' ), 20, 1 );
				remove_filter( 'ecomus_product_card_title_heading_tag', array( $this, 'product_card_title_heading_tag' ), 5 );
            }
            ?>
        </div>
    <?php
	}

	public function single_product_image_gallery_classes( $classes ) {
		$key = array_search( 'images', $classes );
		if ( $key !== false ) {
			unset( $classes[ $key ] );
		}
		return $classes;
	}

	public function product_card_title_heading_tag( $tag ) {
		$settings = $this->get_settings_for_display();
		return ! empty( $settings['product_title_size'] ) ? esc_attr( $settings['product_title_size'] ) : $tag;
	}
}