<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0

http://amashop.co/wp-content/plugins/woocommerce-payu-latam/response.php

 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<div class="row">
	<div class="col l8 m8 offset-l2 offset-m2 s12 order_content">
			
	<?php
		if ( $order ) : ?>

			<?php if ( $order->has_status( 'failed' ) ) : ?>

				<p class="woocommerce-thankyou-order-failed center"><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?>
				</p>
				<p class="center">
					<a class="btn btn-large gray-bg" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'cart' ) ) ); ?>">
						<?php _e( 'Regresar al carrito', 'woocommerce' ) ?>
					</a>
				</p>
					
			<?php else : ?>

				<p class="woocommerce-thankyou-order-received center-align"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); ?></p>
				

				<!--<ul class="woocommerce-thankyou-order-details order_details">
					<li class="order">
						<?php //_e( 'Order Number:', 'woocommerce' ); ?>
						<strong><?php //echo $order->get_order_number(); ?></strong>
					</li>
					<li class="date">
						<?php //_e( 'Date:', 'woocommerce' ); ?>
						<strong><?php //echo date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ); ?></strong>
					</li>
					<li class="total">
						<?php// _e( 'Total:', 'woocommerce' ); ?>
						<strong><?php //echo $order->get_formatted_order_total(); ?></strong>
					</li>
					<?php //if ( $order->payment_method_title ) : ?>
					<li class="method">
						<?php //_e( 'Payment Method:', 'woocommerce' ); ?>
						<strong><?php //echo $order->payment_method_title; ?></strong>
					</li>
					<?php//endif; ?>
				</ul>
				<div class="clear"></div>-->

			<?php endif; ?>

			<?php do_action( 'woocommerce_thankyou_' . $order->payment_method, $order->id ); ?>
			<?php do_action( 'woocommerce_thankyou', $order->id ); ?>

		<?php else : ?>

			<p class="woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></p>

		<?php endif; ?>
	</div>
</div>
