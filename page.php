<?php 

//single post

get_header(); 
if ( have_posts() ) : while ( have_posts() ) : the_post(); 
?>



<div class="container single-post-content">
  <div class="row">
    <div class="col l12 s12">
      <h1 class="center-align"><?php the_title(); ?></h1>
      <p><?php the_content( ); ?></p>
  
      
    </div>
  </div>
</div>
<?php endwhile;  endif; ?>

<?php 

get_footer( ); ?>