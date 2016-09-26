<section class="slider-container first-section">
   <div class="search-fixed not-full search">
  <?php //echo do_shortcode('[aws]'); ?>
        
        <?php if ( is_active_sidebar( 'search-widget' ) ) : ?>
            <?php dynamic_sidebar( 'search-widget' ); ?>
        <?php endif; ?>
      </div>
  <div class="owl-carousel main-carousel slider " id="main-slider">
    
    <?php
        query_posts(array(
        'post_type' => 'slide',
        'showposts' => 10,
        'order' => 'ASC'
        ) );
      ?>
      <?php while (have_posts()) : the_post(); 
      ?>
      <?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
      ?>
     
        
      <div class="item <?php echo get_post_meta($post->ID, 'color', true); ?>" style="background-image: url(<?php echo $src[0]; ?> ) !important;"> 
          
          <div class="slider--caption center">
            <h1 class="text-shadow"><?php echo get_the_title(); ?>
            </h1>
            <h3 class="text-shadow"><?php echo get_the_excerpt(); ?></h3>
          
          <!--  <div class="row">
              <div class="col l8 offset-l2 s12 not-full">
                <?php //if ( is_active_sidebar( 'search-widget' ) ) : ?>
                    <?php //dynamic_sidebar( 'search-widget' ); ?>
                <?php //endif; ?>
              </div>
            </div>-->
          </div>

      </div>
      <?php endwhile; ?>
    
    
  </div>
</section>



  