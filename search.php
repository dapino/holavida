<?php 
//search page
get_header(); 
?>


	<?php
	$s=get_search_query();
	$args = array(
	's' =>$s
	);
	// The Query
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) {
	_e("<h2 style='font-weight:bold;color:#000'>Resultados de la busqueda para ".get_query_var('s')."</h2>");
	while ( $the_query->have_posts() ) {
	$the_query->the_post();
	?>
	<li>
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</li>
	<?php
	}
	}else{
	?>
	<h2 style='font-weight:bold;color:#000'>No se encontraron resultados para la busqueda</h2>
	<div class="alert alert-info">
		<p>Lo sentimos, pero no se ha encontrado ningún resultado para la busqueda.</p>
	</div>
	<?php } ?>        
			
<?php get_footer( ); ?>
