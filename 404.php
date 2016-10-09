<?php 


get_header(); 
?>



<div class="container single-post-content page">
  <div class="row">
    <div class="col m8 offset-m2 s12">
      <h1 class="center-align">El contenido que estás buscando no se encuentra</h1>
 
    <?php if ( is_active_sidebar( 'search-widget' ) ) : ?>
    <?php dynamic_sidebar( 'search-widget' ); ?>
    <?php endif; ?>

  
      
    </div>
  </div>
</div>


<?php 

get_footer( ); ?>