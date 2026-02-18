<?php
/**
 * Ecomus Theme Functions
 */

require_once get_template_directory() . '/inc/theme.php';
\Ecomus\Theme::instance()->init();


/* Custom Styles: Menu + Flash Sale Button */
add_action( 'wp_head', function() {
    ?>
    <style>
    rs-module .rs-badge { display: none !important; }

    /* Menu bar: white text on black */
    .site-header__desktop .header-bottom {
        --em-header-color: #ffffff !important;
        color: #ffffff !important;
    }
    .site-header__desktop .header-bottom > .container a,
    .site-header__desktop .header-bottom > .container span {
        color: #ffffff !important;
    }
    .site-header__desktop .header-bottom > .container a:hover {
        opacity: 0.8;
    }
    /* Submenu: dark text on white, full-width links */
    .site-header__desktop .header-bottom .sub-menu li,
    .site-header__desktop .header-bottom .mega-menu li,
    .site-header__desktop .header-bottom .dropdown-menu li,
    .site-header__desktop .header-bottom ul ul li {
        padding: 0 !important;
        margin: 0 !important;
    }
    .site-header__desktop .header-bottom .sub-menu a,
    .site-header__desktop .header-bottom .mega-menu a,
    .site-header__desktop .header-bottom .dropdown-menu a,
    .site-header__desktop .header-bottom ul ul a {
        color: #222 !important;
        display: block !important;
        width: 100% !important;
        padding: 8px 15px !important;
        box-sizing: border-box !important;
    }
    .site-header__desktop .header-bottom .sub-menu a:hover,
    .site-header__desktop .header-bottom .mega-menu a:hover,
    .site-header__desktop .header-bottom .dropdown-menu a:hover,
    .site-header__desktop .header-bottom ul ul a:hover {
        background: #DAA520 !important;
        color: #fff !important;
        opacity: 1;
    }

    /* Flash Sale header button */
    .header-flash-sale a {
        background: #fff !important;
        color: transparent !important;
        background-clip: text !important;
        -webkit-background-clip: text !important;
        padding: 8px 22px !important;
        border-radius: 50px !important;
        font-weight: 800 !important;
        font-size: 14px !important;
        letter-spacing: 1px;
        display: inline-flex !important;
        align-items: center !important;
        gap: 8px;
        white-space: nowrap;
        text-decoration: none !important;
        border: 2px solid #DAA520;
        background: #fff !important;
        animation: flashPulse 2s ease-in-out infinite;
    }
    .header-flash-sale a {
        background-image: linear-gradient(135deg, #F7971E, #DAA520) !important;
        -webkit-background-clip: text !important;
        background-clip: text !important;
        -webkit-text-fill-color: transparent;
        transition: all 0.6s ease-in-out !important;
    }
    .header-flash-sale a svg {
        flex-shrink: 0;
        transition: all 0.6s ease-in-out;
    }
    .header-flash-sale a:hover {
        background: #DAA520 !important;
        -webkit-background-clip: border-box !important;
        background-clip: border-box !important;
        -webkit-text-fill-color: #fff !important;
        border-color: #DAA520;
        opacity: 1 !important;
    }
    .header-flash-sale a:hover svg path {
        fill: #fff;
        stroke: #fff;
    }
    @keyframes flashPulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.04); }
    }

    /* Product cards: always show Add to Cart button */
    ul.products li.product .product-loop-button-atc,
    ul.products.product-card-button-atc-transfrom--bottom li.product .product-loop-button-atc,
    ul.products.product-card-button-atc-transfrom--top li.product .product-loop-button-atc {
        opacity: 1 !important;
        visibility: visible !important;
        transform: translateY(0) !important;
        pointer-events: auto !important;
        position: relative !important;
        top: auto !important;
        background-color: #000 !important;
        color: #fff !important;
        transition: all 0.3s ease !important;
    }
    ul.products li.product .product-loop-button-atc:hover {
        background-color: #fff !important;
        color: #000 !important;
    }

    /* Hide original add-to-cart button & wishlist/compare everywhere */
    form.cart .single_add_to_cart_button,
    form.cart .product-featured-icons {
        display: none !important;
    }
    /* Hide custom buttons from sticky floating bottom bar */
    .ecomus-sticky-add-to-cart .product-action-buttons {
        display: none !important;
    }

    /* Product action buttons grid: 2x2 */
    .product-action-buttons {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
        margin-top: 10px;
    }
    .product-action-buttons a {
        display: flex !important;
        align-items: center;
        justify-content: center;
        gap: 8px;
        text-decoration: none;
        font-weight: 700;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-sizing: border-box;
        padding: 14px 15px;
        border-radius: 5px;
        color: #fff !important;
        width: 100%;
    }
    .product-action-buttons .pa-addtocart {
        background: #F58220;
    }
    .product-action-buttons .pa-addtocart:hover {
        background: #e0741a;
    }
    .product-action-buttons .pa-buynow {
        background: #1a3c40;
        animation: buyNowShake 2.5s ease-in-out infinite;
    }
    .product-action-buttons .pa-buynow:hover {
        background: #0f2b2e;
    }
    .product-action-buttons .pa-whatsapp {
        background: #25D366;
    }
    .product-action-buttons .pa-whatsapp:hover {
        background: #1da851;
    }
    .product-action-buttons .pa-call {
        background: #0a1128;
    }
    .product-action-buttons .pa-call:hover {
        background: #1a2a4a;
    }
    .product-action-buttons svg {
        flex-shrink: 0;
    }
    @media (max-width: 480px) {
        .product-action-buttons {
            grid-template-columns: 1fr 1fr;
            gap: 8px;
        }
        .product-action-buttons a {
            font-size: 12px;
            padding: 12px 10px;
            gap: 5px;
        }
    }

    /* Buy Now shake animation */
    .buy-now-btn {
        animation: buyNowShake 2.5s ease-in-out infinite;
    }
    @keyframes buyNowShake {
        0%, 100% { transform: translateX(0); }
        10% { transform: translateX(-4px) rotate(-1deg); }
        20% { transform: translateX(4px) rotate(1deg); }
        30% { transform: translateX(-4px) rotate(-1deg); }
        40% { transform: translateX(4px) rotate(1deg); }
        50% { transform: translateX(0); }
    }

    /* Category Slider */
    .ecomus-cat-slider-wrap { overflow: hidden; }
    .cat-slide-item {
        display: block;
        text-decoration: none;
        border-radius: 8px;
        overflow: hidden;
        position: relative;
        background: #fff;
    }
    .cat-slide-img {
        height: 380px;
        overflow: hidden;
    }
    .cat-slide-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .cat-slide-item:hover .cat-slide-img img {
        transform: scale(1.05);
    }
    .cat-slide-info {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 15px;
        background: #fff;
    }
    .cat-slide-title {
        font-size: 15px;
        font-weight: 600;
        color: #222;
    }
    .cat-slide-arrow {
        font-size: 18px;
        color: #222;
        transition: transform 0.3s ease;
    }
    .cat-slide-item:hover .cat-slide-arrow {
        transform: translate(3px, -3px);
    }
    .cat-nav-next, .cat-nav-prev {
        color: #222 !important;
    }
    .cat-nav-next::after, .cat-nav-prev::after {
        font-size: 18px !important;
    }

    /* Mobile search bar below header */
    .mobile-search-bar {
        display: none;
    }
    @media (max-width: 1024px) {
        .mobile-search-bar {
            display: block;
            background: #fff;
            padding: 8px 15px;
            border-bottom: 1px solid #eee;
        }
        .mobile-search-bar .header-search {
            position: relative;
        }
        .mobile-search-bar .header-search__form {
            display: flex;
            align-items: center;
            border: 2px solid #DAA520;
            border-radius: 5px;
            overflow: visible;
            position: relative;
        }
        .mobile-search-bar .header-search__field {
            flex: 1;
            border: none;
            outline: none;
            padding: 10px 12px;
            font-size: 14px;
            background: #fff;
        }
        .mobile-search-bar .header-search__field::placeholder {
            color: #999;
        }
        .mobile-search-bar .header-search__button {
            background: #DAA520;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            display: flex;
            align-items: center;
            border-radius: 0;
        }
        .mobile-search-bar .header-search__products-results,
        .mobile-search-bar .header-search__products-suggest {
            position: absolute;
            top: 100%;
            left: -2px;
            right: -2px;
            background: #fff;
            z-index: 9999;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            border-radius: 0 0 5px 5px;
            max-height: 60vh;
            overflow-y: auto;
            padding: 0;
        }
        .mobile-search-bar .header-search__products-results:empty,
        .mobile-search-bar .header-search__products-suggest:empty {
            display: none;
        }
        /* Hide tabs, show only products */
        .mobile-search-bar .results-tab-header {
            display: none;
        }
        .mobile-search-bar .results-tab-content {
            display: block;
        }
        .mobile-search-bar .result-tab-item {
            display: block !important;
        }
        /* Results heading with View All */
        .mobile-search-bar .results-heading {
            display: none;
        }
        /* Product list */
        .mobile-search-bar .results-list {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .mobile-search-bar .result-card-item {
            display: flex;
            align-items: center;
            padding: 10px 12px;
            border-bottom: 1px solid #f0f0f0;
            gap: 12px;
        }
        .mobile-search-bar .result-card-thumbnail {
            width: 60px;
            min-width: 60px;
            height: 60px;
        }
        .mobile-search-bar .result-card-thumbnail a {
            display: block;
            width: 100%;
            height: 100%;
        }
        .mobile-search-bar .result-card-thumbnail img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 4px;
        }
        .mobile-search-bar .result-summary {
            display: flex;
            flex-direction: column;
            gap: 4px;
            min-width: 0;
        }
        .mobile-search-bar .result-title {
            font-size: 13px;
            font-weight: 600;
            color: #222 !important;
            text-decoration: none;
            line-height: 1.3;
        }
        .mobile-search-bar .result-desc .price {
            font-size: 13px;
            font-weight: 700;
            color: #222;
        }
        .mobile-search-bar .result-desc .price del {
            color: #999;
            font-weight: 400;
            margin-right: 5px;
        }
        /* View All Results button */
        .mobile-search-bar .em-col-products .results-heading {
            display: flex;
            justify-content: center;
            padding: 12px;
            border-top: 1px solid #f0f0f0;
            order: 99;
        }
        .mobile-search-bar .em-col-products .results-heading h6 {
            display: none;
        }
        .mobile-search-bar .em-col-products .results-heading a {
            font-size: 14px;
            font-weight: 700;
            color: #222 !important;
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .mobile-search-bar .em-col-products {
            display: flex !important;
            flex-direction: column;
        }
        .mobile-search-bar .em-col-products .results-list {
            order: 1;
        }
        .mobile-search-bar .em-col-products .results-heading {
            order: 2;
        }
        /* Hide non-product results */
        .mobile-search-bar .result-tab-item:not(.em-col-products) {
            display: none !important;
        }
        /* No results */
        .mobile-search-bar .list-item-empty {
            padding: 20px;
            text-align: center;
            font-size: 13px;
            color: #999;
        }
    }
    </style>
    <?php
});


/* Mobile Search Bar Below Header */
add_action( 'ecomus_after_header', function() {
    ?>
    <div class="mobile-search-bar">
        <div class="header-search">
            <form class="header-search__form em-instant-search__form em-flex em-flex-align-center" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <input type="text" name="s" class="header-search__field em-instant-search__field" placeholder="Search for products" autocomplete="off">
                <input type="hidden" name="post_type" class="header-search__post-type" value="product">
                <a href="#" class="close-search-modal__results em-button em-button-outline em-button-icon" style="display:none;"><?php echo \Ecomus\Icon::get_svg( 'close', 'ui'); ?></a>
                <button type="submit" class="header-search__button em-button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"><path fill="#fff" d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0016 9.5 6.5 6.5 0 109.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
                </button>
                <div class="header-search__products-results"></div>
                <div class="header-search__products-suggest"></div>
            </form>
        </div>
    </div>
    <?php
});


/* =====================================================
   1. Minimal Checkout Fields
   (Name, Phone, Address Only)
===================================================== */

add_filter( 'woocommerce_checkout_fields', function( $fields ) {

    $fields['billing'] = array();

    $fields['billing']['billing_first_name'] = array(
        'label'       => 'Full Name',
        'placeholder' => '',
        'required'    => true,
        'class'       => array('form-row-wide'),
        'priority'    => 10,
    );

    $fields['billing']['billing_phone'] = array(
        'label'       => 'Mobile No.',
        'placeholder' => '01XXXXXXXXX',
        'required'    => true,
        'class'       => array('form-row-wide'),
        'priority'    => 20,
    );

    $fields['billing']['billing_address_1'] = array(
        'label'       => 'Address',
        'placeholder' => '',
        'required'    => true,
        'type'        => 'textarea',
        'class'       => array('form-row-wide'),
        'priority'    => 30,
    );

    // Remove shipping and account sections
    unset( $fields['shipping'] );
    unset( $fields['account'] );

    return $fields;

}, 9999 );


/* =====================================================
   2. Inject Billing Country Into Posted Data
===================================================== */

add_filter( 'woocommerce_checkout_posted_data', function( $data ) {

    $data['billing_country'] = 'BD';
    $data['billing_last_name'] = '';

    return $data;

});


/* =====================================================
   3. Disable Default WooCommerce Shipping
===================================================== */

add_filter( 'woocommerce_cart_needs_shipping', '__return_false' );


/* =====================================================
   4. Store Custom Shipping In Session (AJAX Safe)
===================================================== */

add_action( 'woocommerce_checkout_update_order_review', function( $posted_data ) {

    parse_str( $posted_data, $output );

    if ( isset( $output['custom_shipping_method'] ) ) {
        WC()->session->set( 'custom_shipping_method', sanitize_text_field( $output['custom_shipping_method'] ) );
    }

});


/* =====================================================
   5. Add Custom Shipping Fee Dynamically
===================================================== */

add_action( 'woocommerce_cart_calculate_fees', function( $cart ) {

    if ( is_admin() && ! defined( 'DOING_AJAX' ) )
        return;

    $method = WC()->session->get( 'custom_shipping_method' );

    if ( $method === 'dhaka' ) {
        $cart->add_fee( 'Delivery Charge', 70 );
    } elseif ( $method === 'outside' ) {
        $cart->add_fee( 'Delivery Charge', 130 );
    }

});


/* =====================================================
   6. Trigger Checkout Update On Dropdown Change
===================================================== */

add_action( 'wp_footer', function() {

    if ( is_checkout() ) {
        ?>
        <script>
        jQuery(function($){
            $('form.checkout').on('change', '#custom_shipping_method', function(){
                $('body').trigger('update_checkout');
            });
        });
        </script>
        <?php
    }

});


/* =====================================================
   7. Validate Custom Shipping On Checkout
===================================================== */

add_action( 'woocommerce_checkout_process', function() {

    if ( empty( $_POST['custom_shipping_method'] ) ) {
        wc_add_notice( 'Please select a delivery area.', 'error' );
    }

});


/* =====================================================
   8. Disable Order Notes
===================================================== */

add_filter( 'woocommerce_enable_order_notes_field', '__return_false' );


/* =====================================================
   9. Set Billing Country On Order
===================================================== */

add_action( 'woocommerce_checkout_create_order', function( $order, $data ) {

    $order->set_billing_country( 'BD' );

    // Save custom shipping method as order meta
    if ( isset( $_POST['custom_shipping_method'] ) ) {
        $order->update_meta_data( '_custom_shipping_method', sanitize_text_field( $_POST['custom_shipping_method'] ) );
    }

}, 20, 2 );





/* =========================================
   Order Tracking: Public View (No Login Required)
========================================= */

add_action( 'template_redirect', function() {

    if ( isset($_POST['track']) && isset($_POST['orderid']) && isset($_POST['order_phone']) ) {

        $order_id    = absint($_POST['orderid']);
        $input_phone = sanitize_text_field($_POST['order_phone']);

        $order = wc_get_order($order_id);

        if ( $order ) {

            if ( $order->get_billing_phone() === $input_phone ) {

                wp_safe_redirect( site_url('/tracking-result/?order_id=' . $order_id) );
                exit;

            } else {

                wc_add_notice( 'মোবাইল নাম্বার সঠিক নয়।', 'error' );
            }

        } else {

            wc_add_notice( 'অর্ডার পাওয়া যায়নি।', 'error' );
        }
    }

});



add_action( 'the_content', function( $content ) {

    if ( is_page('tracking-result') && isset($_GET['order_id']) ) {

        $order_id = absint($_GET['order_id']);
        $order    = wc_get_order($order_id);

        if ( $order ) {

            $status = $order->get_status();
            $status_label = wc_get_order_status_name($status);

            ob_start();
            ?>

            <div class="tracking-wrapper">

                <div class="tracking-card">

                    <h5>Order Details</h5>

                    <div class="tracking-info">
                        <p><strong>Order ID:</strong> #<?php echo $order->get_id(); ?></p>
                        <p><strong>Date:</strong> <?php echo $order->get_date_created()->date('d M Y'); ?></p>
                        <p><strong>Total:</strong> <?php echo $order->get_formatted_order_total(); ?></p>
                        <p><strong>Status:</strong> 
                            <span class="status-badge status-<?php echo esc_attr($status); ?>">
                                <?php echo esc_html($status_label); ?>
                            </span>
                        </p>
                    </div>

                </div>

                <div class="tracking-progress">

                    <div class="progress-step <?php if($status == 'processing' || $status == 'completed') echo 'active'; ?>">
                        Processing
                    </div>

                    <div class="progress-step <?php if($status == 'completed') echo 'active'; ?>">
                        Delivered
                    </div>

                </div>

                <div class="tracking-products">

                    <h5>Order Items</h5>

                    <ul>
                        <?php foreach ( $order->get_items() as $item ) : ?>
                            <li>
                                <?php echo $item->get_name(); ?> 
                                × <?php echo $item->get_quantity(); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                </div>

            </div>

            <?php
            return ob_get_clean();
        }
    }

    return $content;

});


/* =====================================================
   Product Page: 4-Button Grid (Add to Cart, Buy Now, WhatsApp, Call)
===================================================== */

add_action( 'woocommerce_after_add_to_cart_form', function() {
    global $product;
    if ( ! $product ) return;

    $pid  = $product->get_id();
    $name = $product->get_name();
    $url  = get_permalink( $pid );
    $price = $product->get_price();

    $buy_now_url  = add_query_arg( [ 'buy_now' => $pid, 'quantity' => 1 ], home_url('/') );
    $wa_phone     = '8801XXXXXXXXX'; // Change to your WhatsApp number
    $call_phone   = '01XXXXXXXXX';   // Change to your phone number
    $wa_msg       = rawurlencode( "Hi, I want to order: {$name} - {$url}" );
    $wa_url       = "https://wa.me/{$wa_phone}?text={$wa_msg}";
    ?>
    <div class="product-action-buttons">
        <a href="javascript:void(0);" class="pa-addtocart" onclick="document.querySelector('form.cart .single_add_to_cart_button').click();">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49A1.003 1.003 0 0020 4H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/></svg>
            ADD TO CART
        </a>
        <a href="<?php echo esc_url( $buy_now_url ); ?>" class="pa-buynow">
            BUY NOW
        </a>
        <a href="<?php echo esc_url( $wa_url ); ?>" class="pa-whatsapp" target="_blank" rel="noopener">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
            Order On WhatsApp
        </a>
        <a href="tel:<?php echo esc_attr( $call_phone ); ?>" class="pa-call">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
            Call For Order
        </a>
    </div>
    <?php
});


/* =====================================================
   Buy Now: Clear Cart → Add Product → Go To Checkout
===================================================== */

add_action( 'template_redirect', function() {

    if ( ! isset( $_GET['buy_now'] ) || ! class_exists( 'WooCommerce' ) ) {
        return;
    }

    $product_id = absint( $_GET['buy_now'] );
    $quantity   = isset( $_GET['quantity'] ) ? absint( $_GET['quantity'] ) : 1;

    if ( $product_id < 1 ) {
        return;
    }

    WC()->cart->empty_cart();
    WC()->cart->add_to_cart( $product_id, $quantity );

    wp_safe_redirect( wc_get_checkout_url() );
    exit;

});


/* =====================================================
   Elementor: Buy Now / WhatsApp / Call Widgets
===================================================== */

add_action( 'elementor/widgets/register', function( $widgets_manager ) {

    if ( ! class_exists( 'WooCommerce' ) ) {
        return;
    }

    /* -------------------------------------------------
       Shared base: style controls for all 3 buttons
    ------------------------------------------------- */
    abstract class Ecomus_Action_Button_Base extends \Elementor\Widget_Base {

        protected function default_bg()    { return '#333333'; }
        protected function default_hover() { return '#555555'; }

        protected function register_style_controls( $selector ) {

            $this->start_controls_section( 'section_style', [
                'label' => 'Style',
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]);

            $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
                'name'     => 'typography',
                'selector' => '{{WRAPPER}} ' . $selector,
            ]);

            $this->start_controls_tabs( 'tabs_style' );

            $this->start_controls_tab( 'tab_normal', [ 'label' => 'Normal' ] );
            $this->add_control( 'bg_color', [
                'label'     => 'Background',
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => $this->default_bg(),
                'selectors' => [ '{{WRAPPER}} ' . $selector => 'background-color: {{VALUE}};' ],
            ]);
            $this->add_control( 'text_color', [
                'label'     => 'Text Color',
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#ffffff',
                'selectors' => [ '{{WRAPPER}} ' . $selector => 'color: {{VALUE}}; fill: {{VALUE}};' ],
            ]);
            $this->end_controls_tab();

            $this->start_controls_tab( 'tab_hover', [ 'label' => 'Hover' ] );
            $this->add_control( 'bg_hover', [
                'label'     => 'Background',
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => $this->default_hover(),
                'selectors' => [ '{{WRAPPER}} ' . $selector . ':hover' => 'background-color: {{VALUE}};' ],
            ]);
            $this->add_control( 'text_hover', [
                'label'     => 'Text Color',
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#ffffff',
                'selectors' => [ '{{WRAPPER}} ' . $selector . ':hover' => 'color: {{VALUE}}; fill: {{VALUE}};' ],
            ]);
            $this->end_controls_tab();

            $this->end_controls_tabs();

            $this->add_responsive_control( 'padding', [
                'label'      => 'Padding',
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em' ],
                'default'    => [ 'top' => '14', 'right' => '20', 'bottom' => '14', 'left' => '20', 'unit' => 'px' ],
                'selectors'  => [ '{{WRAPPER}} ' . $selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ],
                'separator'  => 'before',
            ]);

            $this->add_control( 'border_radius', [
                'label'      => 'Border Radius',
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'default'    => [ 'top' => '5', 'right' => '5', 'bottom' => '5', 'left' => '5', 'unit' => 'px' ],
                'selectors'  => [ '{{WRAPPER}} ' . $selector => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ],
            ]);

            $this->end_controls_section();
        }

        protected function render_button( $url, $text, $icon_html, $class, $target = '_self' ) {
            echo '<div class="' . $class . '-wrap">';
            echo '<a href="' . esc_url( $url ) . '" class="' . $class . '" target="' . esc_attr( $target ) . '" rel="noopener" style="display:inline-flex;align-items:center;gap:8px;text-decoration:none;transition:all 0.3s ease;cursor:pointer;justify-content:center;width:100%;box-sizing:border-box;font-weight:700;font-size:15px;">';
            echo $icon_html;
            echo esc_html( $text );
            echo '</a></div>';
        }
    }


    /* -------------------------------------------------
       1. BUY NOW BUTTON
    ------------------------------------------------- */
    class Ecomus_Buy_Now_Widget extends Ecomus_Action_Button_Base {

        protected function default_bg()    { return '#1a3c40'; }
        protected function default_hover() { return '#0f2b2e'; }

        public function get_name()       { return 'ecomus-buy-now-button'; }
        public function get_title()      { return 'Buy Now Button'; }
        public function get_icon()       { return 'eicon-cart-medium'; }
        public function get_categories() { return [ 'general' ]; }
        public function get_keywords()   { return [ 'buy now', 'checkout', 'woocommerce' ]; }

        protected function register_controls() {
            $this->start_controls_section( 'section_content', [ 'label' => 'Button' ] );

            $this->add_control( 'product_id', [
                'label'       => 'Product ID',
                'type'        => \Elementor\Controls_Manager::NUMBER,
                'description' => 'Leave empty to auto-detect on product pages.',
            ]);
            $this->add_control( 'quantity', [
                'label' => 'Quantity', 'type' => \Elementor\Controls_Manager::NUMBER, 'default' => 1, 'min' => 1,
            ]);
            $this->add_control( 'button_text', [
                'label' => 'Button Text', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'BUY NOW',
            ]);

            $this->end_controls_section();
            $this->register_style_controls( '.buy-now-btn' );
        }

        protected function render() {
            $s = $this->get_settings_for_display();
            $pid = ! empty( $s['product_id'] ) ? absint( $s['product_id'] ) : get_the_ID();
            $qty = ! empty( $s['quantity'] ) ? absint( $s['quantity'] ) : 1;

            $url = add_query_arg( [ 'buy_now' => $pid, 'quantity' => $qty ], home_url( '/' ) );

            $this->render_button( $url, $s['button_text'] ?: 'BUY NOW', '', 'buy-now-btn' );
        }
    }


    /* -------------------------------------------------
       2. ORDER ON WHATSAPP BUTTON
    ------------------------------------------------- */
    class Ecomus_WhatsApp_Order_Widget extends Ecomus_Action_Button_Base {

        protected function default_bg()    { return '#25D366'; }
        protected function default_hover() { return '#1da851'; }

        public function get_name()       { return 'ecomus-whatsapp-order'; }
        public function get_title()      { return 'Order on WhatsApp'; }
        public function get_icon()       { return 'eicon-commenting-o'; }
        public function get_categories() { return [ 'general' ]; }
        public function get_keywords()   { return [ 'whatsapp', 'order', 'chat', 'message' ]; }

        protected function register_controls() {
            $this->start_controls_section( 'section_content', [ 'label' => 'Button' ] );

            $this->add_control( 'phone', [
                'label'       => 'WhatsApp Number',
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => '8801XXXXXXXXX',
                'description' => 'With country code, no + or spaces (e.g. 8801712345678)',
            ]);
            $this->add_control( 'message', [
                'label'   => 'Pre-filled Message',
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Hi, I want to order this product: {product_name}',
                'description' => 'Use {product_name} and {product_url} as placeholders.',
            ]);
            $this->add_control( 'button_text', [
                'label' => 'Button Text', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Order On WhatsApp',
            ]);

            $this->end_controls_section();
            $this->register_style_controls( '.whatsapp-btn' );
        }

        protected function render() {
            $s = $this->get_settings_for_display();
            $phone = preg_replace( '/[^0-9]/', '', $s['phone'] );

            $product_name = get_the_title();
            $product_url  = get_permalink();

            $msg = str_replace(
                [ '{product_name}', '{product_url}' ],
                [ $product_name, $product_url ],
                $s['message']
            );

            $url = 'https://wa.me/' . $phone . '?text=' . rawurlencode( $msg );

            $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>';

            $this->render_button( $url, $s['button_text'] ?: 'Order On WhatsApp', $icon, 'whatsapp-btn', '_blank' );
        }
    }


    /* -------------------------------------------------
       3. CALL FOR ORDER BUTTON
    ------------------------------------------------- */
    class Ecomus_Call_Order_Widget extends Ecomus_Action_Button_Base {

        protected function default_bg()    { return '#0a1128'; }
        protected function default_hover() { return '#1a2a4a'; }

        public function get_name()       { return 'ecomus-call-order'; }
        public function get_title()      { return 'Call for Order'; }
        public function get_icon()       { return 'eicon-tel-field'; }
        public function get_categories() { return [ 'general' ]; }
        public function get_keywords()   { return [ 'call', 'phone', 'order', 'telephone' ]; }

        protected function register_controls() {
            $this->start_controls_section( 'section_content', [ 'label' => 'Button' ] );

            $this->add_control( 'phone', [
                'label'   => 'Phone Number',
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '01XXXXXXXXX',
            ]);
            $this->add_control( 'button_text', [
                'label' => 'Button Text', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Call For Order',
            ]);

            $this->end_controls_section();
            $this->register_style_controls( '.call-btn' );
        }

        protected function render() {
            $s = $this->get_settings_for_display();
            $phone = preg_replace( '/[^0-9+]/', '', $s['phone'] );

            $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>';

            $this->render_button( 'tel:' . $phone, $s['button_text'] ?: 'Call For Order', $icon, 'call-btn' );
        }
    }

    /* -------------------------------------------------
       4. CATEGORY SLIDER
    ------------------------------------------------- */
    class Ecomus_Category_Slider_Widget extends \Elementor\Widget_Base {

        public function get_name()       { return 'ecomus-category-slider'; }
        public function get_title()      { return 'Category Slider'; }
        public function get_icon()       { return 'eicon-slides'; }
        public function get_categories() { return [ 'general' ]; }
        public function get_keywords()   { return [ 'category', 'slider', 'carousel', 'woocommerce' ]; }

        private function get_product_categories() {
            $cats = get_terms( [ 'taxonomy' => 'product_cat', 'hide_empty' => false ] );
            $options = [];
            if ( ! is_wp_error( $cats ) ) {
                foreach ( $cats as $cat ) {
                    $options[ $cat->term_id ] = $cat->name;
                }
            }
            return $options;
        }

        protected function register_controls() {

            /* --- Content --- */
            $this->start_controls_section( 'section_content', [ 'label' => 'Categories' ] );

            $this->add_control( 'categories', [
                'label'       => 'Select Categories',
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'options'     => $this->get_product_categories(),
                'multiple'    => true,
                'description' => 'Leave empty to show all categories.',
            ]);

            $this->add_control( 'limit', [
                'label'   => 'Number of Categories',
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'default' => 6,
                'min'     => 1,
                'max'     => 30,
            ]);

            $this->add_control( 'orderby', [
                'label'   => 'Order By',
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'name',
                'options' => [ 'name' => 'Name', 'count' => 'Product Count', 'id' => 'ID', 'menu_order' => 'Menu Order' ],
            ]);

            $this->add_control( 'hide_empty', [
                'label'        => 'Hide Empty Categories',
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'default'      => 'yes',
                'return_value' => 'yes',
            ]);

            $this->end_controls_section();

            /* --- Slider Settings --- */
            $this->start_controls_section( 'section_slider', [ 'label' => 'Slider Settings' ] );

            $this->add_responsive_control( 'slides_per_view', [
                'label'   => 'Slides Per View',
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'default' => 6,
                'min'     => 1,
                'max'     => 10,
            ]);

            $this->add_control( 'gap', [
                'label'   => 'Gap (px)',
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'default' => 15,
            ]);

            $this->add_control( 'autoplay', [
                'label'        => 'Auto Slide',
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'default'      => 'yes',
                'return_value' => 'yes',
            ]);

            $this->add_control( 'autoplay_speed', [
                'label'     => 'Auto Slide Speed (ms)',
                'type'      => \Elementor\Controls_Manager::NUMBER,
                'default'   => 3000,
                'condition' => [ 'autoplay' => 'yes' ],
            ]);

            $this->add_control( 'loop', [
                'label'        => 'Loop',
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'default'      => 'yes',
                'return_value' => 'yes',
            ]);

            $this->add_control( 'show_nav', [
                'label'        => 'Show Navigation Arrows',
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'default'      => '',
                'return_value' => 'yes',
            ]);

            $this->end_controls_section();

            /* --- Style --- */
            $this->start_controls_section( 'section_style', [
                'label' => 'Style',
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]);

            $this->add_control( 'image_height', [
                'label'      => 'Image Height',
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range'      => [ 'px' => [ 'min' => 150, 'max' => 600 ] ],
                'default'    => [ 'unit' => 'px', 'size' => 380 ],
                'selectors'  => [ '{{WRAPPER}} .cat-slide-img' => 'height: {{SIZE}}{{UNIT}};' ],
            ]);

            $this->add_control( 'image_radius', [
                'label'      => 'Image Border Radius',
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range'      => [ 'px' => [ 'min' => 0, 'max' => 30 ] ],
                'default'    => [ 'unit' => 'px', 'size' => 8 ],
                'selectors'  => [ '{{WRAPPER}} .cat-slide-item' => 'border-radius: {{SIZE}}{{UNIT}};' ],
            ]);

            $this->add_control( 'title_color', [
                'label'     => 'Title Color',
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#222222',
                'selectors' => [ '{{WRAPPER}} .cat-slide-title' => 'color: {{VALUE}};' ],
            ]);

            $this->add_control( 'title_bg', [
                'label'     => 'Title Bar Background',
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#ffffff',
                'selectors' => [ '{{WRAPPER}} .cat-slide-info' => 'background-color: {{VALUE}};' ],
            ]);

            $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
                'name'     => 'title_typo',
                'selector' => '{{WRAPPER}} .cat-slide-title',
            ]);

            $this->end_controls_section();
        }

        protected function render() {
            $s = $this->get_settings_for_display();

            $args = [
                'taxonomy'   => 'product_cat',
                'hide_empty' => $s['hide_empty'] === 'yes',
                'number'     => $s['limit'] ?: 6,
                'orderby'    => $s['orderby'] ?: 'name',
                'order'      => 'ASC',
            ];

            if ( ! empty( $s['categories'] ) ) {
                $args['include'] = $s['categories'];
                $args['number']  = 0;
            }

            $categories = get_terms( $args );

            if ( is_wp_error( $categories ) || empty( $categories ) ) {
                echo '<p>No categories found.</p>';
                return;
            }

            $slides_desktop = $s['slides_per_view'] ?: 6;
            $slides_tablet  = $s['slides_per_view_tablet'] ?? max( 3, $slides_desktop - 2 );
            $slides_mobile  = $s['slides_per_view_mobile'] ?? 2;
            $gap       = $s['gap'] ?: 15;
            $autoplay  = $s['autoplay'] === 'yes';
            $speed     = $s['autoplay_speed'] ?: 3000;
            $loop      = $s['loop'] === 'yes';
            $show_nav  = $s['show_nav'] === 'yes';

            $uid = 'cat-slider-' . $this->get_id();
            ?>
            <div class="ecomus-cat-slider-wrap">
                <div class="swiper <?php echo esc_attr( $uid ); ?>">
                    <div class="swiper-wrapper">
                        <?php foreach ( $categories as $cat ) :
                            $thumb_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
                            $img_url  = $thumb_id ? wp_get_attachment_image_url( $thumb_id, 'medium_large' ) : wc_placeholder_img_src( 'medium_large' );
                            $cat_link = get_term_link( $cat );
                        ?>
                        <div class="swiper-slide">
                            <a href="<?php echo esc_url( $cat_link ); ?>" class="cat-slide-item">
                                <div class="cat-slide-img">
                                    <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $cat->name ); ?>" loading="lazy">
                                </div>
                                <div class="cat-slide-info">
                                    <span class="cat-slide-title"><?php echo esc_html( $cat->name ); ?></span>
                                    <span class="cat-slide-arrow">&#8599;</span>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php if ( $show_nav ) : ?>
                    <div class="swiper-button-next cat-nav-next"></div>
                    <div class="swiper-button-prev cat-nav-prev"></div>
                    <?php endif; ?>
                </div>
            </div>
            <script>
            document.addEventListener('DOMContentLoaded', function(){
                new Swiper('.<?php echo esc_js( $uid ); ?>', {
                    slidesPerView: <?php echo (int) $slides_mobile; ?>,
                    spaceBetween: <?php echo (int) $gap; ?>,
                    loop: <?php echo $loop ? 'true' : 'false'; ?>,
                    <?php if ( $autoplay ) : ?>
                    autoplay: { delay: <?php echo (int) $speed; ?>, disableOnInteraction: false },
                    <?php endif; ?>
                    <?php if ( $show_nav ) : ?>
                    navigation: { nextEl: '.<?php echo esc_js( $uid ); ?> .cat-nav-next', prevEl: '.<?php echo esc_js( $uid ); ?> .cat-nav-prev' },
                    <?php endif; ?>
                    breakpoints: {
                        768:  { slidesPerView: <?php echo (int) $slides_tablet; ?> },
                        1024: { slidesPerView: <?php echo (int) $slides_desktop; ?> }
                    }
                });
            });
            </script>
            <?php
        }
    }

    /* Register all widgets */
    $widgets_manager->register( new Ecomus_Buy_Now_Widget() );
    $widgets_manager->register( new Ecomus_WhatsApp_Order_Widget() );
    $widgets_manager->register( new Ecomus_Call_Order_Widget() );
    $widgets_manager->register( new Ecomus_Category_Slider_Widget() );

});



