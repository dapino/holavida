<?php 

//single post

get_header(); 
if ( have_posts() ) : while ( have_posts() ) : the_post(); 
?>



<div class="container single-post-content">
  <div class="row">
    <!--<div class="chip">
      <?php //echo get_avatar( $post->post_author, 46 );?>
      <?php //echo get_the_author(); ?> 
    </div>-->
    <div class="col l9 m8 s12">
      <h1><?php the_title(); ?></h1>
      <div class="post-featured-image"> <?php the_post_thumbnail(); ?></div>
      <p><?php the_content( ); ?></p>
      <?php $main_cat_arr = get_the_category(); ?>
      <?php $main_cat = $main_cat_arr[0]->slug; ?>
<?php endwhile;  endif; wp_reset_query();?>
  <div class="row">
       <?php
            query_posts(array(
            'post_type' => 'post',
            'showposts' => 3,
            'order' => 'DESC'
            ) );
          ?>
          <?php while (have_posts()) : the_post(); 
          $cats = get_the_category();
          $cat_name = $cats[0]->name;
          ?>
          <div class="col l4 m6 s12">
            <div class="card hoverable news-item post-<?php echo $cat_name ?>">
              <a href="<?php the_permalink(); ?>">
                <div class="card-image">
                 <?php the_post_thumbnail('product-thumbnail'); ?>
                </div>
                <div class="card-content">
                  <span class="card-title">
                    <h3 class="truncate"><?php the_title(); ?></h3>
                  </span>
                    <p><?php echo get_the_author(); ?> </p> 
                  
                </div>
                <!--<div class="card-action">
                  <a href="<?php //the_permalink(); ?>" class="btn btn-default amber">Leer más</a>
                </div>-->
              </a>
            </div>
          </div>      
<?php endwhile; wp_reset_query();?>
      
    </div>
    

    </div>
    <div class="col l3 m4 s12 sidebar-post">
      <div class="newsletter-widget newsletter-widget-left">
        <?php if ( is_active_sidebar( 'form-newsletter' ) ) : ?>
              <?php dynamic_sidebar( 'form-newsletter' ); ?>
          <?php endif; ?>
      </div>
      <h3 class="center-align">Experiencias relacionadas </h3>
      <?php
        $args = array(
          'post_type' => 'product',
          'posts_per_page' => 3,
          'product_cat' => $main_cat
        );
        $loop = new WP_Query( $args );
        if ( $loop->have_posts() ) {
          while ( $loop->have_posts() ) : $loop->the_post(); ?>
            
            <div class="product-item">
              <li <?php post_class('col l12 m12 s12'); ?>>
                <?php do_action( 'woocommerce_before_shop_loop_item' );?>
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
            </div>
        <?php endwhile;
        } else {
        echo __( 'No hay experiencias aún' );
        }
        wp_reset_postdata();
      ?>
        
    </div>
    </div>
    
  </div>
</div>
    </div>
  <div class="container">

    
  </div>
<?php 

get_footer( ); ?>