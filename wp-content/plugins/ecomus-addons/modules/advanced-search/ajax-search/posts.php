<?php
/**
 * Posts hooks.
 *
 * @package Ecomus
 */

namespace Ecomus\Addons\Modules\Advanced_Search\Ajax_Search;

use Ecomus\Addons\Modules\Advanced_Search\Helper;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class of Posts
 */
class Posts {
	/**
	 * Instance
	 *
	 * @var $instance
	 */
	protected static $instance = null;

	/**
	 * posts
	 *
	 * @var $instance
	 */
	protected static $posts = null;


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

	}

	public function get_products() {
		$post_result = $this->get_search();
		if( empty($post_result) ) {
			return;
		}

		if( ! isset( $post_result['product'] ) || empty( $post_result['product'] ) ) {
			return;
		}
		$keyword   = trim( $_POST['term'] );
		$result = array();
		$result['classes'] = 'em-col em-md-3 em-col-products result-tab-item';
		$result['name'] = esc_html__('Products', 'ecomus-addons');
		$result['view_all'] = sprintf(
			'<a href="%s" class="em-button em-button-subtle"><span class="ecomus-button-text">%s</span>%s</a>',
			esc_url( home_url( '/' ) . '?s=' . $keyword . '&post_type=product' ),
			esc_html__('View All', 'ecomus-addons'),
			\Ecomus\Addons\Helper::get_svg('arrow-top', 'ui'),
		);

		$result['response'] = implode('', $post_result['product']);

		return Helper::get_result_list($result);
	}

	public function get_posts() {
		$post_result = $this->get_search();
		if( empty($post_result) ) {
			return;
		}

		if( ! isset( $post_result['post'] ) || empty( $post_result['post'] ) ) {
			return;
		}

		$result = array();
		$result['classes'] = 'em-col em-md-3 em-col-posts result-tab-item';
		$result['name'] = esc_html__('Articles', 'ecomus-addons');
		$result['view_all'] = '';
		$result['response'] = implode('', $post_result['post']);

		return Helper::get_result_list($result);
	}

	public function get_pages() {
		$post_result = $this->get_search();
		if( empty($post_result) ) {
			return;
		}

		if( ! isset( $post_result['page'] ) || empty( $post_result['page'] ) ) {
			return;
		}

		$result = array();
		$result['classes'] = 'em-col-page em-col-pages result-tab-item';
		$result['name'] = esc_html__('Pages', 'ecomus-addons');
		$result['view_all'] = '';
		$result['response'] = implode('', $post_result['page']);

		return Helper::get_result_list($result);
	}

	private function get_query_var() {
		global $wpdb;

		$result_number = isset( $_POST['ajax_search_number'] ) ? intval( $_POST['ajax_search_number'] ) : 0;
		$keyword   = trim( $_POST['term'] );

		$query_var = '';
		$fields = 'posts.ID, posts.post_type';
		$search_string = '%' . $keyword . '%';
		if( get_option('ecomus_ajax_search_products', 'yes') == 'yes' ) {
			$sku_join = $sku_where = $product_by = $post_status = $visibility_query = '';
			$sku_join = " LEFT JOIN {$wpdb->wc_product_meta_lookup} wc_product_meta_lookup ON posts.ID = wc_product_meta_lookup.product_id ";

			// Get visibility term IDs to exclude hidden and shop only products
			$product_visibility_terms = wc_get_product_visibility_term_ids();
			$excluded_terms = array();

			if ( isset( $product_visibility_terms['exclude-from-search'] ) ) {
				$excluded_terms[] = $product_visibility_terms['exclude-from-search'];
			}

			if ( ! empty( $excluded_terms ) ) {
				$placeholders = implode( ',', array_fill( 0, count( $excluded_terms ), '%d' ) );
				$visibility_join = "
					LEFT JOIN {$wpdb->term_relationships} visibility_tr
					ON posts.ID = visibility_tr.object_id
					AND visibility_tr.term_taxonomy_id IN ($placeholders)
				";
				$visibility_query = " AND visibility_tr.object_id IS NULL ";
			}

			if( get_option('ecomus_ajax_search_products_by_sku', 'yes') == 'yes' ) {
				$sku_where =  ' OR ' . $wpdb->prepare("(wc_product_meta_lookup.sku LIKE %s) ", $search_string);
			}

			if( get_option('ecomus_ajax_search_products_by_title', 'yes') === 'yes' ) {
				$product_by =  $wpdb->prepare("(posts.post_title LIKE %s) ", $search_string);
			}

			if( get_option('ecomus_ajax_search_products_by_content', 'yes') === 'yes' ) {
				$product_by .= !empty( $product_by ) ? ' OR' : '';
				$product_by .=  $wpdb->prepare("(posts.post_content LIKE %s) ", $search_string);
			}

			$product_by = !empty( $product_by ) ? ' AND (' . $product_by . ')' : '';

			$post_status = is_user_logged_in() && current_user_can('read_private_posts') ? " OR posts.post_status = 'private'" : "";

			$query_var = "(SELECT {$fields}, CASE
				WHEN posts.post_title = %s THEN 200
				WHEN wc_product_meta_lookup.sku = %s THEN 150
				WHEN posts.post_title LIKE %s THEN 100
				WHEN posts.post_content LIKE %s THEN 50
				WHEN wc_product_meta_lookup.sku LIKE %s THEN 75
				ELSE 10
				END as score FROM {$wpdb->posts} as posts"
				. $sku_join
				. $visibility_join .
				"WHERE 1 = 1
				{$product_by}
				AND(
					posts.post_type = 'product'
					AND	( posts.post_status = 'publish' {$post_status} )
				)"
				. $visibility_query
				. $sku_where .
				"ORDER BY score DESC, posts.post_date DESC
				LIMIT %d
				)";

			if ( ! empty( $excluded_terms ) ) {
				$prepare_args = array_merge( array($keyword, $keyword, $search_string, $search_string, $search_string), $excluded_terms, array( $result_number ) );
			} else {
				$prepare_args = array($keyword, $keyword, $search_string, $search_string, $search_string, $result_number);
			}
			$query_var = $wpdb->prepare($query_var, ...$prepare_args);
		}

		if( get_option('ecomus_ajax_search_posts', 'yes') == 'yes' ) {
			$query_var .= $wpdb->prepare("
				UNION ALL (SELECT {$fields}, CASE WHEN posts.post_title = %s THEN 100 WHEN posts.post_title LIKE %s THEN 50 ELSE 10 END as score FROM {$wpdb->posts} as posts
				WHERE 1 = 1
					AND(posts.post_title LIKE %s)
					AND(
						posts.post_type = 'post'
						AND ( posts.post_status = 'publish' {$post_status} )
					)
				ORDER BY score DESC, posts.post_date DESC
				LIMIT %d
				)",
				$keyword,
				$search_string,
				$search_string,
				$result_number
			);
		}

		if( get_option('ecomus_ajax_search_pages', 'yes') == 'yes' ) {
			$query_var .= $wpdb->prepare("
				UNION ALL (SELECT {$fields}, CASE WHEN posts.post_title = %s THEN 100 WHEN posts.post_title LIKE %s THEN 50 ELSE 10 END as score FROM {$wpdb->posts} as posts
				WHERE 1 = 1
					AND(posts.post_title LIKE %s)
					AND(
						posts.post_type = 'page'
						AND ( posts.post_status = 'publish' {$post_status} )
					)
				ORDER BY score DESC, posts.post_date DESC
				LIMIT %d
				)",
				$keyword,
				$search_string,
				$search_string,
				$result_number
			);
		}

		return $query_var;
	}

	private function get_search() {
		if( isset(self::$posts) ) {
			return self::$posts;
		}
		global $wpdb;

		$query_var = $this->get_query_var();
		$query = $wpdb->get_results($query_var);
		self::$posts = array();
		foreach ( $query as $post ) {
			$result = array();
			$post_type = $post->post_type;
			$post_id = $post->ID;
			if( in_array($post_type, array( 'product' ) ) ) {
				$product   = wc_get_product( $post_id );
				$result['permalink'] = $product->get_permalink();
				$result['image'] = $product->get_image( 'woocommerce_thumbnail' );
				$result['name'] = $product->get_title();
				$result['desc'] = '<span class="price em-flex">' . $product->get_price_html() . '</span>';
				self::$posts['product'][]= Helper::get_result_item($result);
			} elseif( $post_type == 'post' ) {
				$post = get_post( $post_id );
				$result['permalink'] = get_permalink($post_id);
				$result['image'] = wp_get_attachment_image( get_post_thumbnail_id( $post_id ), 'large');
				$result['name'] = $post->post_title;
				$result['desc'] = '<span class="post-date">' . get_the_date( '', $post_id ) . '</span>';
				self::$posts['post'][]= Helper::get_result_item($result);
			} elseif( $post_type == 'page' ) {
				$post = get_post( $post_id );
				$result['permalink'] = get_permalink($post_id);
				$result['image'] = '';
				$result['name'] = $post->post_title;
				$result['desc'] = '';
				self::$posts['page'][]= Helper::get_result_item($result);
			}
		}

		return self::$posts;
	}

}
