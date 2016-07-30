<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php post_class('col l3 m6 s12'); ?>>
	<?php	do_action( 'woocommerce_before_shop_loop_item' );?>
	<div class="card hoverable">
	  <div class="card-image">
			<?php do_action( 'woocommerce_before_shop_loop_item_title' );?>
  	</div>
	  <div class="card-content">
			<span class="card-title">
				<?php do_action( 'woocommerce_shop_loop_item_title' ); ?>
			</span>
	    <?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
			<div class="card-details row">
				<div class="info-subcategory col l6">
					<?php 
						$product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' ); 
						$cat_prod_name =  $product_cats[1]->name;
						$cat_prod_link =  $product_cats[1]->slug;
					 ?>
					 <a href="/<?php echo $cat_prod_link; ?>"><?php echo $cat_prod_name; ?></a>
				</div>
				<div class="info-city col l6">
					<?php echo $product->get_attribute( 'ciudad' ); ?>
				</div>
			</div>
	  </div>
	  <div class="card-action">
	  	<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
			<?php //echo do_shortcode( '[yith_wcwl_add_to_wishlist ]' ); ?> 
	  </div>
	</div>
</li>

