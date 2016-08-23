<?php
/*
Template Name: Blog*/
get_header();
?>

<div class="bg-dark-white">

  <div class="container">
    <h1 class="center module-title text-dark-gray blog"><?php the_title(); ?></h1>
    <div class="row">
      <div class="newsletter-widget newsletter-widget-top">
        <?php if ( is_active_sidebar( 'form-newsletter' ) ) : ?>
              <?php dynamic_sidebar( 'form-newsletter' ); ?>
          <?php endif; ?>
      </div>
    </div>
    <div class="row section-padding">
      <?php
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

            $the_query = new WP_Query( array('paged=' . $paged, 'posts_per_page' => 9) );
        ?>
          <?php if ( $the_query->have_posts() ) : ?>
          <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <?php 
            $cats = get_the_category();
            $cat_name = $cats[0]->name;
           ?>

            <div class="col l3 m6 s12">
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
          <?php endwhile; ?>

          <?php
            wp_reset_postdata();
          ?>
          <?php else:  ?>
          <p><?php _e( 'No hay noticias publicadas' ); ?></p>
          <?php endif; ?>
          <div class="col-md-12">
            <div class="page-nav">
              <nav>
                <ul class="pagination pagination-lg">
                  <li>
                    <?php next_posts_link( 'Anteriores', $the_query->max_num_pages ); ?>
                  </li>

                  <li>
                    <?php previous_posts_link( 'Más recientes' ); ?>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
    </div>

  </div>
</div>


<?php

get_footer( ); ?>