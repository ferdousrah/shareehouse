<?php
/**
 * Order tracking form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/form-tracking.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

global $post;
?>

<form action="" method="post" class="woocommerce-form woocommerce-form-track-order track_order">

    <p>To track order please enter you order number and mobile no.</p>

    <p class="form-row form-row-first">
        <label for="orderid">Order ID</label>
        <input class="input-text" type="text" name="orderid" id="orderid"
            placeholder="order id" required />
    </p>

    <p class="form-row form-row-last">
        <label for="order_phone">Mobile Number</label>
        <input class="input-text" type="text" name="order_phone" id="order_phone"
            placeholder="mobile no" required />
    </p>

    <div class="clear"></div>

    <p class="form-row">
        <button type="submit" class="button" name="track" value="Track">Track</button>
    </p>

    <?php wp_nonce_field( 'woocommerce-order_tracking', 'woocommerce-order-tracking-nonce' ); ?>

</form>

