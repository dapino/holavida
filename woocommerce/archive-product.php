<?php if ( ! defined( 'ABSPATH' ) ) { exit;}

get_header( 'shop' ); ?>
<?php
    /**
     * woocommerce_before_main_content hook.
     *
     * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
     * @hooked woocommerce_breadcrumb - 20
     */
    do_action( 'woocommerce_before_main_content' );
  ?>
<!--<div class="header-shop">-->
	
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="page-title vanished"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>
	<?php do_action( 'woocommerce_archive_description' ); ?>
<!--</div>-->
	<?php	do_action( 'woocommerce_before_main_content' ); ?>

	
<?php //get_sidebar('shop' ); ?>

<section class="products-grid">
	
	<?php if ( have_posts() ) : ?>

		<?php do_action( 'woocommerce_before_shop_loop' ); ?>

		<?php woocommerce_product_loop_start(); ?>

		<?php woocommerce_product_subcategories(); ?>

		<?php while ( have_posts() ) : the_post(); ?>
		<?php woocommerce_get_template_part( 'content', 'product' ); ?>
		<?php endwhile; ?>

		<?php woocommerce_product_loop_end(); ?>

		<?php	do_action( 'woocommerce_after_shop_loop' ); ?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

		<?php wc_get_template( 'loop/no-products-found.php' ); ?>

	<?php endif; ?>
	<?php do_action( 'woocommerce_after_main_content' ); ?>
</section>					
<?php get_footer( 'shop' ); ?>

