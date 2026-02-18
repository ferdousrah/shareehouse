<?php
/**
 * Single Product hooks.
 *
 * @package Ecomus
 */

namespace Ecomus\Addons\Modules\Product_Video;

use Ecomus\Addons\Modules\Product_Video\Helper;

use Ecomus\Icon;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class of Single Product
 */
class Frontend {
	/**
	 * Instance
	 *
	 * @var $instance
	 */
	protected static $instance = null;

	protected static $has_video = false;

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

		add_filter( 'ecomus_product_get_gallery_image', array( $this, 'get_gallery_thumbnail' ), 10, 2 );
		add_filter( 'ecomus_product_get_gallery_thumbnail', array( $this, 'get_gallery_thumbnail' ), 10, 2 );
		add_filter( 'ecomus_product_after_gallery_thumbnails', array( $this, 'after_gallery_thumbnail' ), 10, 2 );

		add_filter( 'woocommerce_single_product_image_thumbnail_html', array( $this, 'product_video_gallery' ), 10, 2 );

		add_action('woocommerce_product_thumbnails', array( $this, 'product_video_thumbnails' ), 30 );
	}

	public function scripts() {
		wp_enqueue_script('ecomus-product-video', ECOMUS_ADDONS_URL . 'modules/product-video/assets/product-video.js', array( 'jquery' ), '20240506', true );
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
	public static function get_gallery_thumbnail( $html, $index ) {
		global $product;

		$video_show_on_single_product = get_post_meta( $product->get_id(), 'video_show_on_single_product', true );

		if ( $video_show_on_single_product == 'no' ) {
			return $html;
		}

		$video_position       = intval(get_post_meta( $product->get_id(), 'video_position', true ));
		if ( $video_position == 0 ) {
			return $html;
		}

		if ( $video_position != $index) {
			return $html;
		}

		return self::get_gallery_video_html( $html );
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
	public static function after_gallery_thumbnail( $html, $index ) {
		global $product;

		$video_show_on_single_product = get_post_meta( $product->get_id(), 'video_show_on_single_product', true );

		if ( $video_show_on_single_product == 'no' ) {
			return $html;
		}

		$video_position       = intval(get_post_meta( $product->get_id(), 'video_position', true ));
		if ( $video_position == 0 ) {
			return $html;
		}
		if ( $video_position < $index) {
			return $html;
		}

		return self::get_gallery_video_html( $html );
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
	public static function get_gallery_video_html( $html ) {
		global $product;

		$video_url    = get_post_meta( $product->get_id(), 'video_url', true );

		if ( empty( $video_url ) ) {
			return $html;
		}

		$video_image_id  = get_post_meta( $product->get_id(), 'video_thumbnail_id', true );

		if ( empty( $video_image_id ) ) {
			$gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
			$thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
			$video_thumb = wc_placeholder_img( $thumbnail_size );
			$video_thumb_src = wc_placeholder_img_src( $thumbnail_size );

			$video_thumb = '<div data-thumb="' . esc_url( $video_thumb_src ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $video_thumb_src ) . '">' . $video_thumb . '</a></div>';
		} else {
			$video_thumb = wc_get_gallery_image_html($video_image_id);
		}

		return $video_thumb . $html;
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
	public static function product_video_gallery( $html, $attachment_id ) {
		global $product;
		if ( self::$has_video ) {
			return $html;
		}
		$video_show_on_single_product = get_post_meta( $product->get_id(), 'video_show_on_single_product', true );

		if ( $video_show_on_single_product == 'no' ) {
			return $html;
		}

		$video_position     = get_post_meta( $product->get_id(), 'video_position', true );

		if ( $video_position == 0 ) {
			return $html;
		}

		if ( $video_position == '1' ) {
			if ( $product->get_image_id() == $attachment_id ) {
				$html = Helper::get_product_video() . $html;
				self::$has_video = true;
			}
		} else {
			$attachment_ids 	= $product->get_gallery_image_ids();

			$key = array_search ($attachment_id, $attachment_ids);

			if ( $key === false && $video_position == '2' ) {
				$html = $html . Helper::get_product_video();
				self::$has_video = true;
			} elseif( $key && $video_position == $key + 2 ) {
				$html = Helper::get_product_video() . $html;
				self::$has_video = true;
			}
		}

		return $html;
	}

	public function product_video_thumbnails(){
		global $product;
		$video_position     = get_post_meta( $product->get_id(), 'video_position', true );

		if ( $video_position == 0 ) {
			return $html;
		}

		$attachment_ids 	= $product->get_gallery_image_ids();

		if( $video_position >= count( $attachment_ids ) + 2 ) {
			echo Helper::get_product_video();
		}
	}

}
