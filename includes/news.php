<section id="news-home" class="section-padding">
  <div class="container">

    <div class="row">
       <?php
            query_posts(array(
            'post_type' => 'post',
            'showposts' => 4,
            'order' => 'DESC'
            ) );
          ?>
          <?php while (have_posts()) : the_post(); 
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
    </div>
    <div class="row center-align">
      <a href="<?php echo site_url(); ?>/blog" class="btn btn-small gray-bg">Ir al blog</a>
    </div>
  </div>
</section>