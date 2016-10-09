<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
	return;
}

?>


<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
	<div class="row checkout-step" id="step-3">
		<ul class="multi-step-bar">
			<li>Carrito</li>
			<li>Ingreso</li>
			<li  class="active">Datos de compra</li>
			<li>Confirmación de orden</li>
		</ul>
		<div class="col l8 m8 offset-l2 offset-m2 s12">

			<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>

				<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

				<?php do_action( 'woocommerce_checkout_billing' ); ?>

				<?php do_action( 'woocommerce_checkout_shipping' ); ?>

				<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

			<?php endif; ?>
		</div>	
		<div class="col l8 m8 s12 offset-l2 offset-m2 center-align">
			<a class="btn prev-button gray-bg left" id="button-to-2-2">
				Anterior
			</a>
			<a class="btn next-button gray-bg right" id="button-to-4">
				Siguiente
			</a>
		</div>
	</div>	

	<div class="row checkout-step" id="step-4">
		<ul class="multi-step-bar">
			<li>Carrito</li>
			<li>Ingreso</li>
			<li>Datos de compra</li>
			<li class="active">Confirmación de orden</li>
		</ul>
		<div class="col l8 m8 offset-l2 offset-m2 s12">

			<h3 id="order_review_heading"><?php _e( 'Your order', 'woocommerce' ); ?></h3>

			<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

			<?php do_action( 'woocommerce_checkout_order_review' ); ?>


			<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
		</div>
		<div class="col l8 m8 s12 offset-l2 offset-m2 center-align">
			<a class="btn prev-button gray-bg left" id="button-to-3">
				Anterior
			</a>

		</div>
	</div>	
</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>

