<section id="new-products" class="section-padding">
  <div class="container">
    
      <h3 class="center module-title text-dark-gray">Experiencias</h3>

    <div class="row products-carousel">
      <?php
        $args = array(
          'post_type' => 'product',
          'posts_per_page' => 8,
        );
        $loop = new WP_Query( $args );
        if ( $loop->have_posts() ) {
          while ( $loop->have_posts() ) : $loop->the_post(); ?>
            
            <div class="product-item">
              <?php woocommerce_get_template_part( 'content', 'product' ); ?>
            </div>
        <?php endwhile;
        } else {
        echo __( 'No hay experiencias aún' );
        }
        wp_reset_postdata();
      ?>
        
    </div>
    <div class="row center-align">
      <a href="<?php echo site_url(); ?>/tienda" class="btn btn-large gray-bg">Ver todas las experiencias</a>
    </div>
  </div>
</section>

