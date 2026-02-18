<?php
namespace Ecomus\Addons\Elementor\Builder\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Archive_Description extends Widget_Base {

	public function get_name() {
		return 'ecomus-archive-description';
	}

	public function get_title() {
		return esc_html__( '[Ecomus] Archive Description', 'ecomus-addons' );
	}

	public function get_icon() {
		return 'eicon-header';
	}

	public function get_keywords() {
		return [ 'woocommerce', 'shop', 'store', 'archive', 'product', 'page', 'description' ];
	}

	public function get_categories() {
		return [ 'ecomus-addons-archive-product' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
            'archive_description_content',
            [
                'label' => __( 'Archive Description', 'ecomus-addons' ),
            ]
        );

		$this->add_control(
			'source',
			[
				'label' => esc_html__( 'Source', 'ecomus-addons' ),
				'type' => Controls_Manager::SELECT,
				'label_block' => true,
				'options' => [
					'term_description'       => esc_html__('Term Description', 'ecomus'),
					'custom_description'  => esc_html__('Custom Description', 'ecomus'),
				],
				'default' => [ 'term_description' ],
			]
		);

		$this->add_control(
			'shop_header_number_words',
			[
				'label' => esc_html__( 'Number Words Of Description', 'ecomus-addons' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 5,
				'max' => 100,
				'step' => 1,
				'default' => 20,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'page_header_style',
            [
                'label' => __( 'Style', 'ecomus-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_responsive_control(
			'alignment',
			[
				'label'       => esc_html__( 'Alignment', 'ecomus-addons' ),
				'type'        => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options'     => [
					'left'   => [
						'title' => esc_html__( 'Left', 'ecomus-addons' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'ecomus-addons' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right'  => [
						'title' => esc_html__( 'Right', 'ecomus-addons' ),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'default'     => '',
				'selectors'   => [
					'{{WRAPPER}} .page-header__content' => 'text-align: {{VALUE}}',
				],
			]
		);


		$this->add_responsive_control(
			'padding',
			[
				'label'      => __( 'Padding', 'ecomus-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .page-header.page-header--shop' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'.ecomus-rtl-smart {{WRAPPER}} .page-header.page-header--shop' => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .page-header__description',
			]
		);

		$this->add_control(
			'description_color',
			[
				'label' => esc_html__( 'Color', 'ecomus-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .page-header__description' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		?>
		<div class="ecomus-archive-description">
			<div class="ecomus-archive-description__content">
				<?php 
					$this->description( $settings );
				?>
			</div>
		</div>
		<?php
	}

	/**
	 * Get description
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function description( $settings, $description = '' ) {
		ob_start();
		if( function_exists('is_shop') && is_shop() ) {
			woocommerce_product_archive_description();
		}

		$description = ob_get_clean();

		if ( is_tax() ) {
			$term = get_queried_object();
			if ( $term  ) {
				if( 'term_description' == $settings['source'] ) {
					$description = $term->description;
				} else {
					$desc_after = get_term_meta( $term->term_id, 'em_desc_after_content', true );
					$description = $desc_after ? $desc_after : $term->description;
				}
			}
		}

		if( empty( $description ) ) {
			if( \Ecomus\Addons\Elementor\Builder\Helper::is_elementor_editor_mode() ) {
				if( 'term_description' == $settings['source'] ) {
					$description = esc_html__( 'This is a term description of the archive product.', 'ecomus-addons' );
				} else {
					$description = esc_html__( 'This is a description after content of the archive product.', 'ecomus-addons' );
				}
			}
		}

		if( $description ) {
			$number = ! empty( $settings[ 'shop_header_number_words' ] ) ? $settings[ 'shop_header_number_words' ] : 20;
			$description = wp_trim_words( $description, $number );
			echo '<div class="page-header__description">'. $description .'</div>';
		}
	}
}
