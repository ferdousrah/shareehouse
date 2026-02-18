<?php
namespace Ecomus\Addons\Elementor\Builder\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Buy_X_Get_Y extends Widget_Base {
	use \Ecomus\Addons\Elementor\Builder\Traits\Product_Id_Trait;

	public function get_name() {
		return 'ecomus-buy-x-get-y';
	}

	public function get_title() {
		return esc_html__( '[Ecomus] Buy X Get Y', 'ecomus-addons' );
	}

	public function get_icon() {
		return 'eicon-woocommerce';
	}

	public function get_keywords() {
		return [ 'woocommerce', 'shop', 'store', 'buy', 'x', 'get', 'y', 'one get one', 'product' ];
	}

	public function get_categories() {
		return [ 'ecomus-addons-product' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_style',
			[
				'label'     => __( 'Style', 'ecomus-addons' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'padding',
			[
				'label'      => __( 'Padding', 'ecomus-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .ecomus-buy-x-get-y' => 'padding-top: {{TOP}}{{UNIT}}; padding-inline-end: {{RIGHT}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}}; padding-inline-start: {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'border_radius',
			[
				'label'      => __( 'Border Radius', 'ecomus-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .ecomus-buy-x-get-y' => 'border-start-start-radius: {{TOP}}{{UNIT}}; border-start-end-radius: {{RIGHT}}{{UNIT}}; border-end-end-radius: {{BOTTOM}}{{UNIT}}; border-end-start-radius: {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => esc_html__( 'Border', 'ecomus-addons' ),
				'selector' => '{{WRAPPER}} .ecomus-buy-x-get-y',
			]
		);

		$this->add_control(
			'line_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Line', 'ecomus-addons' ),
				'separator' => 'before',
			]	
		);

		$this->add_responsive_control(
			'line_margin',
			[
				'label'      => __( 'Margin', 'ecomus-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__line' => 'margin-top: {{TOP}}{{UNIT}}; margin-inline-end: {{RIGHT}}{{UNIT}}; margin-bottom: {{BOTTOM}}{{UNIT}}; margin-inline-start: {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'line_border',
				'label' => esc_html__( 'Border', 'ecomus-addons' ),
				'selector' => '{{WRAPPER}} .ecomus-buy-x-get-y__line::after',
			]
		);

		$this->add_control(
			'dot_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Dot', 'ecomus-addons' ),
			]	
		);

		$this->add_control(
			'dot_color',
			[
				'label' => esc_html__( 'Color', 'ecomus-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__line span' => 'color: {{VALUE}}',
					'{{WRAPPER}} .ecomus-buy-x-get-y__line span::before' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .ecomus-buy-x-get-y__line span::after' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'dot_background_color',
			[
				'label' => esc_html__( 'Background Color', 'ecomus-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__line span' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'dot_width',
			[
				'label' => esc_html__( 'Width', 'ecomus-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__line span' => 'width: {{SIZE}}{{UNIT}}'
				],
			]
		);

		$this->add_responsive_control(
			'dot_height',
			[
				'label' => esc_html__( 'Height', 'ecomus-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__line span' => 'height: {{SIZE}}{{UNIT}}'
				],
			]
		);

		$this->add_control(
			'icon_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Icon', 'ecomus-addons' ),
			]	
		);

		$this->add_responsive_control(
			'icon_width',
			[
				'label' => esc_html__( 'Width', 'ecomus-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__line span::before' => 'width: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .ecomus-buy-x-get-y__line span::after' => 'height: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'icon_height',
			[
				'label' => esc_html__( 'Height', 'ecomus-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__line span::before' => 'height: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .ecomus-buy-x-get-y__line span::after' => 'width: {{SIZE}}{{UNIT}}',
				],
			]
		);
        
        $this->end_controls_section();

		$this->start_controls_section(
			'section_product_style',
			[
				'label'     => __( 'Product', 'ecomus-addons' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control(
			'products_gap',
			[
				'label' => esc_html__( 'Distance between products', 'ecomus-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__products' => 'gap: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'product_padding',
			[
				'label'      => __( 'Padding', 'ecomus-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__product' => 'padding-top: {{TOP}}{{UNIT}}; padding-inline-end: {{RIGHT}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}}; padding-inline-start: {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'product_border_radius',
			[
				'label'      => __( 'Border Radius', 'ecomus-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__product' => 'border-start-start-radius: {{TOP}}{{UNIT}}; border-start-end-radius: {{RIGHT}}{{UNIT}}; border-end-end-radius: {{BOTTOM}}{{UNIT}}; border-end-start-radius: {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'product_border',
				'label' => esc_html__( 'Border', 'ecomus-addons' ),
				'selector' => '{{WRAPPER}} .ecomus-buy-x-get-y__product',
			]
		);

		$this->add_responsive_control(
			'product_gap',
			[
				'label' => esc_html__( 'Gap', 'ecomus-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__product' => 'gap: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'badge_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Product Badge', 'ecomus-addons' ),
				'separator' => 'before',
			]	
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'product_badge_typography',
				'selector' => '{{WRAPPER}} .ecomus-buy-x-get-y__product .woocommerce-badge',
			]
		);

		$this->add_control(
			'product_badge_color',
			[
				'label' => esc_html__( 'Color', 'ecomus-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__product .woocommerce-badge' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'product_badge_background_color',
			[
				'label' => esc_html__( 'Background Color', 'ecomus-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__product .woocommerce-badge' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'product_badge_padding',
			[
				'label'      => __( 'Padding', 'ecomus-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__product .woocommerce-badge' => 'padding-top: {{TOP}}{{UNIT}}; padding-inline-end: {{RIGHT}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}}; padding-inline-start: {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'product_badge_border_radius',
			[
				'label'      => __( 'Border Radius', 'ecomus-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__product .woocommerce-badge' => 'border-start-start-radius: {{TOP}}{{UNIT}}; border-start-end-radius: {{RIGHT}}{{UNIT}}; border-end-end-radius: {{BOTTOM}}{{UNIT}}; border-end-start-radius: {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'product_badge_border',
				'label' => esc_html__( 'Border', 'ecomus-addons' ),
				'selector' => '{{WRAPPER}} .ecomus-buy-x-get-y__product .woocommerce-badge',
			]
		);

		$this->add_control(
			'thumbnail_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Thumbnail', 'ecomus-addons' ),
				'separator' => 'before',
			]	
		);

		$this->add_responsive_control(
			'product_thumbnail_border_radius',
			[
				'label'      => __( 'Border Radius', 'ecomus-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__product .product-thumbnail img' => 'border-start-start-radius: {{TOP}}{{UNIT}}; border-start-end-radius: {{RIGHT}}{{UNIT}}; border-end-end-radius: {{BOTTOM}}{{UNIT}}; border-end-start-radius: {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'product_summary_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Product Summary', 'ecomus-addons' ),
				'separator' => 'before',
			]	
		);

		$this->add_responsive_control(
			'product_summary_gap',
			[
				'label' => esc_html__( 'Gap', 'ecomus-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__product-summary' => 'gap: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'title_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Product Title', 'ecomus-addons' ),
				'separator' => 'before',
			]	
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'product_title_typography',
				'selector' => '{{WRAPPER}} .ecomus-buy-x-get-y__product-summary .woocommerce-loop-product__title a',
			]
		);

		$this->add_control(
			'product_title_color',
			[
				'label' => esc_html__( 'Color', 'ecomus-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__product-summary .woocommerce-loop-product__title a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'product_title_color_hover',
			[
				'label' => esc_html__( 'Color Hover', 'ecomus-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__product-summary .woocommerce-loop-product__title a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'quantity_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Product Quantity', 'ecomus-addons' ),
				'separator' => 'before',
			]	
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'product_quantity_typography',
				'selector' => '{{WRAPPER}} .ecomus-buy-x-get-y__product-summary .qty',
			]
		);

		$this->add_control(
			'product_quantity_color',
			[
				'label' => esc_html__( 'Color', 'ecomus-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__product-summary .qty' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'select_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Product Select', 'ecomus-addons' ),
				'separator' => 'before',
			]	
		);

		$this->add_responsive_control(
			'select_max_width',
			[
				'label' => esc_html__( 'Gap', 'ecomus-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__product .attributes select' => 'max-width: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'product_select_color',
			[
				'label' => esc_html__( 'Color', 'ecomus-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__product-summary .attributes select' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'product_select_background_color',
			[
				'label' => esc_html__( 'Background Color', 'ecomus-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__product-summary .attributes select' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'product_select_border_radius',
			[
				'label'      => __( 'Border Radius', 'ecomus-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__product .attributes select' => 'border-start-start-radius: {{TOP}}{{UNIT}}; border-start-end-radius: {{RIGHT}}{{UNIT}}; border-end-end-radius: {{BOTTOM}}{{UNIT}}; border-end-start-radius: {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'product_select_border',
				'label' => esc_html__( 'Border', 'ecomus-addons' ),
				'selector' => '{{WRAPPER}} .ecomus-buy-x-get-y__product .attributes select',
			]
		);

		$this->add_control(
			'price_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Product Price', 'ecomus-addons' ),
				'separator' => 'before',
			]	
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'product_price_typography',
				'selector' => '{{WRAPPER}} .ecomus-buy-x-get-y__product-summary .price',
			]
		);

		$this->add_control(
			'product_price_color',
			[
				'label' => esc_html__( 'Color', 'ecomus-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__product-summary .price' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'product_price_column_gap',
			[
				'label' => esc_html__( 'Column Gap', 'ecomus-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__product-summary .price' => 'column-gap: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'product_price_row_gap',
			[
				'label' => esc_html__( 'Row Gap', 'ecomus-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__product-summary .price' => 'row-gap: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'price_sales_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Product Sales Price', 'ecomus-addons' ),
			]	
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'product_price_sales_typography',
				'selector' => '{{WRAPPER}} .ecomus-buy-x-get-y__product-summary .price ins',
			]
		);

		$this->add_control(
			'product_price_sales_color',
			[
				'label' => esc_html__( 'Color', 'ecomus-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__product-summary .price ins' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'price_old_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Product Old Price', 'ecomus-addons' ),
			]	
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'product_price_old_typography',
				'selector' => '{{WRAPPER}} .ecomus-buy-x-get-y__product-summary .price del',
			]
		);

		$this->add_control(
			'product_price_old_color',
			[
				'label' => esc_html__( 'Color', 'ecomus-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__product-summary .price del' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'price_text_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Total text', 'ecomus-addons' ),
			]	
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'product_price_text_typography',
				'selector' => '{{WRAPPER}} .ecomus-buy-x-get-y__product-summary .price-label',
			]
		);

		$this->add_control(
			'product_price_text_color',
			[
				'label' => esc_html__( 'Color', 'ecomus-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__product-summary .price-label' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'product_price_text_gap',
			[
				'label' => esc_html__( 'Gap', 'ecomus-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__product-summary .price-wrapper' => 'gap: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'total_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Total', 'ecomus-addons' ),
				'separator' => 'before',
			]	
		);

		$this->add_responsive_control(
			'total_padding',
			[
				'label'      => __( 'Padding', 'ecomus-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__total' => 'padding-top: {{TOP}}{{UNIT}}; padding-inline-end: {{RIGHT}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}}; padding-inline-start: {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'total_text_typography',
				'selector' => '{{WRAPPER}} .ecomus-buy-x-get-y__total .text',
			]
		);

		$this->add_control(
			'total_text_color',
			[
				'label' => esc_html__( 'Color', 'ecomus-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__total .text' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'total_price_typography',
				'selector' => '{{WRAPPER}} .ecomus-buy-x-get-y__total .total',
			]
		);

		$this->add_control(
			'total_price_color',
			[
				'label' => esc_html__( 'Color', 'ecomus-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__total .total' => 'color: {{VALUE}}',
				],
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'section_style_button',
			[
				'label' => esc_html__( 'Button', 'ecomus-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'button_margin',
			[
				'label'      => __( 'Margin', 'ecomus-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__button' => 'margin-top: {{TOP}}{{UNIT}}; margin-inline-end: {{RIGHT}}{{UNIT}}; margin-bottom: {{BOTTOM}}{{UNIT}}; margin-inline-start: {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'button_padding',
			[
				'label'      => __( 'Padding', 'ecomus-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__button button' => 'padding-top: {{TOP}}{{UNIT}}; padding-inline-end: {{RIGHT}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}}; padding-inline-start: {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'button_border_radius',
			[
				'label'      => __( 'Border Radius', 'ecomus-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__button button' => 'border-start-start-radius: {{TOP}}{{UNIT}}; border-start-end-radius: {{RIGHT}}{{UNIT}}; border-end-end-radius: {{BOTTOM}}{{UNIT}}; border-end-start-radius: {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'button_typography',
				'selector' => '{{WRAPPER}} .ecomus-buy-x-get-y__button button',
			]
		);

		$this->add_responsive_control(
			'button_border_width',
			[
				'label' => esc_html__( 'Border Width', 'ecomus-addons' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'size_units' => [ 'px', 'em', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__button button' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', 'ecomus-addons' ),
			]
		);

		$this->add_control(
			'button_background_color',
			[
				'label'     => __( 'Background Color', 'ecomus-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__button button' => '--em-button-bg-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label'     => __( 'Text Color', 'ecomus-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__button button' => '--em-button-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_border_color',
			[
				'label'     => __( 'Border Color', 'ecomus-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__button button' => '--em-button-border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __( 'Hover', 'ecomus-addons' ),
			]
		);

		$this->add_control(
			'button_background_hover_color',
			[
				'label'     => __( 'Background Color', 'ecomus-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__button button' => '--em-button-bg-color-hover: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_color',
			[
				'label'     => __( 'Text Color', 'ecomus-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__button button' => '--em-button-color-hover: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label'     => __( 'Border Color', 'ecomus-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__button button' => '--em-button-border-color-hover: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_effect_hover_color',
			[
				'label'     => __( 'Background Effect Color', 'ecomus-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ecomus-buy-x-get-y__button button' => '--em-button-eff-bg-color-hover: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

        $this->end_controls_section();
	}

	protected function render() {
		global $product;

		$product = $this->get_product();

		if ( ! $product ) {
			return;
		}

        if ( \Ecomus\Addons\Elementor\Builder\Helper::is_elementor_editor_mode() ) {
            $this->get_buy_x_get_y_html( $product );
        } else {
		    do_action( 'ecomus_buy_x_get_y_elementor' );
        }
	}

    public function get_buy_x_get_y_html( $product ) {
        ?>
            <div class="ecomus-buy-x-get-y">
				<div class="ecomus-buy-x-get-y__heading"><span>Buy one get one</span></div>
				<div class="ecomus-buy-x-get-y__products main-products">
					<div class="ecomus-buy-x-get-y__product main simple">
						<div class="product-thumbnail">
							<?php echo $product->get_image(); ?>
						</div>
						<div class="ecomus-buy-x-get-y__product-summary">
							<div class="ecomus-buy-x-get-y__product-title-wrapper">
								<div class="woocommerce-badge onsale">Buy 1</div>
								<h2 class="woocommerce-loop-product__title">
									<a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="#">Cotton jersey top</a>
								</h2>
							</div>
							<div class="price" data-price="39.9"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>39.90</span></div>
							<div class="qty" data-qty="1">Qty: 1</div>
						</div>
					</div>
					<div class="ecomus-buy-x-get-y__total main">
						<span class="text">Total:</span>
						<span class="total">$39.90</span>
					</div>
				</div>
				<div class="ecomus-buy-x-get-y__line">
					<span class="plus-icon"></span>
				</div>
				<div class="ecomus-buy-x-get-y__products sub-products">
					<div class="ecomus-buy-x-get-y__product sub variable">
						<div class="product-thumbnail change">
							<?php echo $product->get_image(); ?>
						</div>
						<div class="ecomus-buy-x-get-y__product-summary">
							<div class="ecomus-buy-x-get-y__product-title-wrapper">
								<div class="woocommerce-badge onsale">Get 1 Off 10%</div>
								<h3 class="woocommerce-loop-product__title">
									<a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="#">Fitted T-shirt</a>
								</h3>
							</div>
							<div class="price" data-price="7.191"><div class="price-hidden hidden">
								<del><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>7.99</bdi></span></del><ins><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>7.19</bdi></span></ins>								</div><del><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>7.99</bdi></span></del><ins><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>7.19</bdi></span></ins></div>
							<div class="qty" data-qty="1">Qty: 1</div>
							<div class="attributes">
								<form>
									<select name="variation_id">
										<option>Select an option</option>
										<option>Azure / L</option>
										<option>Azure / M</option>
										<option selected="selected">Azure / S</option>
										<option>Pink / L</option>
										<option>Pink / M</option>
										<option>Pink / S</option>
										<option>Gray / L</option>
										<option>Gray / M</option>
										<option>Gray / S</option>
									</select>
								</form>
							</div>
						</div>
					</div>
					<div class="ecomus-buy-x-get-y__product sub variable">
						<div class="product-thumbnail">
							<?php echo $product->get_image(); ?>
						</div>
						<div class="ecomus-buy-x-get-y__product-summary">
							<div class="ecomus-buy-x-get-y__product-title-wrapper">
								<div class="woocommerce-badge onsale">Get 2 Off <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>10.00</span></div>
								<h3 class="woocommerce-loop-product__title">
									<a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="#">Oversized T-shirt</a>
								</h3>
							</div>
							<div class="price" data-price="6.99"><div class="price-hidden hidden">
								<del><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>7.99</bdi></span></del><ins><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>5.99</bdi></span></ins>								</div><del><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>8.99</bdi></span></del><ins><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>6.99</bdi></span></ins></div>
							<div class="qty" data-qty="2">Qty: 2</div>
							<div class="attributes">
								<form>
									<select name="variation_id">
										<option>Select an option</option>
										<option>Blue / L</option>
										<option>Blue / M</option>
										<option selected="selected">Blue / S</option>
										<option>White / L</option>
										<option>White / M</option>
										<option>White / S</option>
									</select>
								</form>
							</div>
						</div>
					</div>
					<div class="ecomus-buy-x-get-y__total sub">
						<span class="text">Total:</span>
						<span class="total">$75.14</span>
					</div>
				</div>
				<div class="ecomus-buy-x-get-y__button">
					<form class="buy-x-get-y__form cart" action="#" method="post" enctype="multipart/form-data">
						<button type="submit" name="ecomus_buy_x_get_y_add_to_cart" value="" class="em-button ecomus-buy-x-get-y-add-to-cart">Grab this deal !</button>
					</form>
				</div>
			</div>
        <?php
    }
}
