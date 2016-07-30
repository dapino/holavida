<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $post, $product, $woocommerce_loop;
?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>
<div class="container section-padding single-product-container">
	<div class="row single-product-header">
		<div class="col l7 m7 s12 overHidden">
			<?php the_title( '<h1 itemprop="name" class="product_title entry-title">', '</h1>' );?>
		<?php echo $product->get_categories( ', ', '<span class="posted_in">' . ' ', '</span>' ); ?>
		</div>		
		<div class="col l5 m5 s12">
			<?php //if ( is_active_sidebar( 'search-widget' ) ) : ?>
			  <?php //dynamic_sidebar( 'search-widget' ); ?>
			<?php //endif; ?>
		</div>		
	</div>


	<div class="row single-product-card " itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<div class="col l7 m7 s12 overHidden">
			
		<?php
			/**
			 * woocommerce_before_single_product_summary hook.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
		?>
		<?php echo do_shortcode( '[ssba]' ); ?>

		</div>

		<div class="col l5 m5 s12 summary entry-summary">
			<h4>Información Importante</h4>
			<ul class="summary-details">
				<li>
					<?php echo $product->get_attribute( 'ciudad' ); ?>
				</li>
				<li>
				<?php echo $product->get_attribute( 'fechas' ); ?>
				</li>
				<li>
				<?php echo $product->get_attribute( 'duracion' ); ?>
				</li>
				<li>
				<?php echo $product->get_attribute( 'direccion' ); ?>
				</li>
			</ul>

			<?php
				/**
				 * woocommerce_single_product_summary hook.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 */
				do_action( 'woocommerce_single_product_summary' );
			?>

			<div class="row">
				<div class="col l6 s12">
					<span class="secure-logo"></span>
				</div>
				
			</div>
		</div><!-- .summary -->
	</div>
	<div class="row">
 
		<!-- Descripción --> 
		<div class="col l7 m7 s12 large-description">
			  <h2><?php echo get_post_meta( get_the_ID(), 'tituloDescripcion', true ); ?>			  	
			  </h2>
			<?php the_content(); ?>
		</div>
		<div class="col l5 m5 s12">
		<?php 
			$product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' ); 
			$product_cat = $product_cats[0]->slug;
		  ?>

		 
			<?php
        query_posts(array(
        'post_type' => 'post',
        'showposts' => 3,
        'order' => 'ASC',
        'category_name'  => $product_cat
        ) );
      ?>
      <?php while (have_posts()) : the_post(); 
        $cats = get_the_category();
				$cat_name = $cats[0]->name;
          ?>
        <div class="mini-card hoverable news-item post-<?php echo $product_cat ?>">
          <a href="<?php the_permalink(); ?>">
          	<div class="row">
              <div class="mini-card-image">
               <?php the_post_thumbnail('product-thumbnail'); ?>
              </div>
	            <div class="mini-card-content">
	              <span class="mini-card-title">
	                <h3><?php the_title(); ?></h3>
	              </span>
	                <p><?php echo get_the_author(); ?> </p> 
	            </div>
          	</div>
          </a>
        </div>
      <?php endwhile; ?>
				<?php wp_reset_query(); ?>
		</div>
	</div>

	<div class="row">
		<!-- .vendedor --> 
		<div class="col l6 m6 s12">
      <div class="card card-product-info card-comments gray-bg-light">
			  <div class="card-content">
			  <?php 
					comments_template();
			   ?>

				</div>
			</div>


		</div>
		<div class="col l6 m6 s12">
			<div class="card card-product-info card-vendor gray-bg-light">
			  <div class="card-content">
					<?php
						global $WCMp, $product;
						$review_settings = get_option('wcmp_general_sellerreview_settings_name');
							$html = '';
							$vendor = get_wcmp_product_vendors( $product->id );
							if( $vendor ) {
								$html .= apply_filters('wcmp_before_seller_info_tab', ''); 
								$html .= '<h2>' . $vendor->user_data->display_name . '</h2>';
								$html .= '<div class="row">';
								echo $html;
								$term_vendor = wp_get_post_terms( $product->id, 'dc_vendor_shop' );	
								if( !is_wp_error($term_vendor) ) {
									$rating_result_array = wcmp_get_vendor_review_info($term_vendor[0]->term_id);
									if(isset($review_settings['is_sellerreview'])) {
										$term_link = get_term_link($term_vendor[0]);
										$rating_result_array['shop_link'] = $term_link;
										echo '<div style="text-align:left; float:left;">';				
										$WCMp->template->get_template( 'review/rating-vendor-tab.php', array('rating_val_array' => $rating_result_array));
										echo "</div>";
										echo '<div style="clear:both; width:100%;"></div>';
									}
								}
								$html = '';
								if( '' != $vendor->image ) {
									$html .= '<div class="col l3 m3 s12"> <img src='. $vendor->image .' alt=""></div>';
								}
								
								if( '' != $vendor->description ) {
									$html .= ' <div class="col l9 m9 s12"><p>' . $vendor->description . '</p>';
								}
								$html .= '<a href="' . $vendor->permalink . '">' . sprintf( __( 'Ver más', $WCMp->text_domain ), $vendor->user_data->display_name ) . '</a></div>';
								$html .= apply_filters('wcmp_after_seller_info_tab', ''); 
								$html .= '</div>';
								echo $html;		
							}
						?>
				</div>

			</div>
		</div>
		
	</div>

		<meta itemprop="url" content="<?php the_permalink(); ?>" />

	</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>

</div>

<?php 
if ( empty( $product ) || ! $product->exists() ) {
	return;
}

if ( ! $related = $product->get_related() ) {
	return;
}

$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => 4,
	'orderby'              => $orderby,
	'post__in'             => $related,
	'post__not_in'         => array( $product->id )
) );

$products                    = new WP_Query( $args );
$woocommerce_loop['name']    = 'related';
$woocommerce_loop['columns'] = apply_filters( 'woocommerce_related_products_columns', $columns );

if ( $products->have_posts() ) : ?>
<div class="row">
	<div class="container">
		<div class="related products col l12">

			<h2 class="center-align"><?php _e( 'Experiencias Relacionadas', 'woocommerce' ); ?></h2>
			<?php while ( $products->have_posts() ) : $products->the_post(); ?>
				
					<?php wc_get_template_part( 'content', 'product' ); ?>
	        
			<?php endwhile; // end of the loop. ?>
		</div>
	</div>
</div>
<?php endif;

wp_reset_postdata();
