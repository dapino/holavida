<div class="row checkout-step" id="step-1">
<ul class="multi-step-bar">
	<li class="active">Carrito</li>
	<li>Ingreso</li>
	<li>Datos de compra</li>
	<li>Confirmación de orden</li>
</ul>

	<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly
	}

	wc_print_notices();?>
	  
	<?php 
	do_action( 'woocommerce_before_cart' ); ?>
	<div class="row">
		
		<div class="col l8 m8 offset-l2 offset-m2 s12">
			
			<form class="cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">

				<?php do_action( 'woocommerce_before_cart_table' ); ?>

				<table class="shop_table shop_table_responsive cart" cellspacing="0">
					<thead>
						<tr>
							<th class="product-remove">&nbsp;</th>
							<th class="product-name"><?php _e( 'Product', 'woocommerce' ); ?></th>
							<th class="product-quantity"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
							
							<th class="product-subtotal"><?php _e( 'Total', 'woocommerce' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php do_action( 'woocommerce_before_cart_contents' ); ?>

						<?php
						foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
							$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
							$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

							if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
								$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
								?>
								<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

									<td class="product-remove">
										<?php
											echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
												'<a href="%s" class="remove" title="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
												esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
												__( 'Remove this item', 'woocommerce' ),
												esc_attr( $product_id ),
												esc_attr( $_product->get_sku() )
											), $cart_item_key );
										?>
									</td>

									<td class="product-name" data-title="<?php _e( 'Product', 'woocommerce' ); ?>">
										<?php
											if ( ! $product_permalink ) {
												echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
											} else {
												echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_title() ), $cart_item, $cart_item_key );
											}

											
										?>
									</td>
									<td class="product-quantity" data-title="<?php _e( 'Quantity', 'woocommerce' ); ?>">
										<?php
											if ( $_product->is_sold_individually() ) {
												$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
											} else {
												$product_quantity = woocommerce_quantity_input( array(
													'input_name'  => "cart[{$cart_item_key}][qty]",
													'input_value' => $cart_item['quantity'],
													'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
													'min_value'   => '0'
												), $_product, false );
											}

											echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
										?>
									</td>

									<td class="product-subtotal" data-title="<?php _e( 'Total', 'woocommerce' ); ?>">
										<?php
											echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
										?>
									</td>

									
								</tr>
								<?php
							}
						}

						do_action( 'woocommerce_cart_contents' );
						?>

						<tr>
								<td colspan="6" class="actions">

									<?php if ( wc_coupons_enabled() ) { ?>
										<div class="coupon coupon-cart-form">

											<label for="coupon_code"><?php _e( 'Coupon', 'woocommerce' ); ?>:</label> <input type="text" name="coupon_code" class="input-coupon" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <input type="submit" class="waves-effect waves-light btn" name="apply_coupon" value="Aplicar" />

											<?php do_action( 'woocommerce_cart_coupon' ); ?>
										</div>
									<?php } ?>

				

								<input type="submit" class=" waves-effect waves-light btn lighten-4 yellow-bg update-cart-button" name="update_cart" value="<?php esc_attr_e( 'Update Cart', 'woocommerce' ); ?>" />

								<?php do_action( 'woocommerce_cart_actions' ); ?>

								<?php wp_nonce_field( 'woocommerce-cart' ); ?>
							</td>
						</tr>

						<?php do_action( 'woocommerce_after_cart_contents' ); ?>
					</tbody>
				</table>

				<?php do_action( 'woocommerce_after_cart_table' ); ?>

			</form>


				<?php do_action( 'woocommerce_cart_collaterals' ); ?>

		</div>


			<?php do_action( 'woocommerce_after_cart' ); ?>
	</div>
		<div class="col l8 m8 s12 offset-l2 offset-m2 center-align">

      <a class="btn next-button gray-bg right" data-step="2" id="button-to-2">
        Siguiente
      </a>
    </div>
</div>
