<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset= "<?php bloginfo('charset') ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title> <?php wp_title('-', true, 'right'); bloginfo('name'); ?> </title>
		<?php wp_head(); ?>
	</head>

	<!--revisar $body_classes-->
	<body <?php body_class();?>>
			<?php get_template_part( 'includes/navbar' ); ?>
