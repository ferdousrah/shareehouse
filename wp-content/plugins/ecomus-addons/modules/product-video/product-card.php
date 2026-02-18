<?php
/**
 * Single Product hooks.
 *
 * @package Ecomus
 */

namespace Ecomus\Addons\Modules\Product_Video;

use Ecomus\Addons\Modules\Product_Video\Helper;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class of Single Product
 */
class Product_Card {
	/**
	 * Instance
	 *
	 * @var $instance
	 */
	protected static $instance = null;

	/**
	 * Initiator
	 *
	 * @since 1.0.0
	 * @return object
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
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
        add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
        add_action( 'woocommerce_before_shop_loop_item', array( $this, 'loop_add_to_cart' ), 10 );
		add_filter( 'woocommerce_single_product_image_thumbnail_html', array( $this, 'product_video_gallery_quickview' ), 10, 2 );
		add_action( 'ecomus_advanced_linked_products_product_thumbnail', array( $this, 'product_video_loop_thumbnail' ), 1 );
	}

	public function scripts() {
		wp_enqueue_script('ecomus-product-video', ECOMUS_ADDONS_URL . 'modules/product-video/assets/product-video.js', array( 'jquery' ), '20240506', true );

		wp_enqueue_style( 'ecomus-product-video-card', ECOMUS_ADDONS_URL . 'modules/product-video/assets/product-card-video.css', array(), '20250324' );
	}

	public function loop_add_to_cart() {
		add_action( 'ecomus_product_before_loop_thumbnail', array( $this, 'product_video_loop_thumbnail' ), 1 );
	}

	/**
	 * Product video loop thumbnail
	 *
	 * @static
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function product_video_loop_thumbnail( $product ) {
		if( empty( $product ) ) {
			$product = wc_get_product( get_the_ID() );
		}
		$video_show_on_product_card = get_post_meta( $product->get_id(), 'video_show_on_product_card', true );

		if ( empty( $video_show_on_product_card ) ) {
			return;
		}

		$video_autoplay = get_post_meta( $product->get_id(), 'video_product_card_autoplay', true );
        $video_controls = ! empty( $video_autoplay ) ? false : true;
        $has_thumb = ! empty( $video_autoplay ) ? false : true;

		echo '<div class="product-video-loop-thumbnail gz-lazy-load">';
            echo '<div class="ecomus-product-video gz-lazy-load-video">' . Helper::get_product_video_html( $video_autoplay, $video_controls, $has_thumb, 'gz-ratio gz-ratio--product-image rounded-product-image', 'woocommerce_thumbnail', $product ) . '</div>';
			if( ! empty( $video_autoplay ) ) {
				echo '<a href="' . esc_url( $product->get_permalink() ) . '" class="product-video-loop-thumbnail__link" aria-label="' . esc_attr( $product->get_name() ) . '"></a>';
			}
        echo '</div>';
	}

	/**
	 * Get product video
	 *
	 * @static
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function product_video_gallery_quickview( $html, $attachment_id ) {
		if( is_singular('product') ) {
			return $html;
		}

		$product = wc_get_product( get_the_ID() );

		if( ! $product instanceof \WC_Product ) {
			return $html;
		}

		$video_show_on_single_product = get_post_meta( $product->get_id(), 'video_show_on_single_product', true );


		if ( empty( $video_show_on_single_product ) ) {
			return $html;
		}

		$video_position     = get_post_meta( $product->get_id(), 'video_position', true );

		if ( $video_position == 0 ) {
			return $html;
		}

		if ( $video_position == '1' ) {
			if ( $product->get_image_id() == $attachment_id ) {
				$html = Helper::get_product_video() . $html;
			}
		} else {
			$attachment_ids 	= $product->get_gallery_image_ids();

			$key = array_search ($attachment_id, $attachment_ids);

			if ( $key === false && $video_position == '2' ) {
				$html = $html . Helper::get_product_video();
			} elseif( $key && $video_position == $key + 2 ) {
				$html = Helper::get_product_video() . $html;
			}
		}

		return $html;
	}
}
