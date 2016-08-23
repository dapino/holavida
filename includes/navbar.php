<div class="navbar-fixed <?php if(is_front_page() ) { ?> up <?php } else { ?> down <?php } ?> " id="#navbar">
	<nav>
		<div class="nav-wrapper">
			<div class="container">
				<div class="row">
					<a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>
					<div class="col m4">
						<a href="<?php echo site_url(); ?>" class="brand-logo">
							<?php if ( get_theme_mod( 'custom_logo' ) ) : ?>
							<img src='<?php echo esc_url( get_theme_mod( 'custom_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
							<?php else : ?>
							<img src="" alt="Hola Vida!">
							<?php endif; ?>
						</a>
					</div>
					<div class="col m7">
						<?php
									wp_nav_menu(
										array(
											'theme_location' => 'main-menu',
											'container' => 'ul',
											'sort_column' => 'menu_order',
											'container_class' => 'right hide-on-med-and-down',
											'menu_class' => 'main-nav'
										)
									);
								?>
					</div>
							<div class="col m1">
								
								<div class="search-navbar" id="navbar-search-button">
									<span class="search-navbar-button">
									</span>
								</div>
							</div>
					<div class="side-nav" id="mobile-menu">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'main-menu',
								'container' => 'ul',
								'sort_column' => 'menu_order',
								'container_class' => '',
								'menu_class' => 'main-nav'
							)
						);
					?>
		      </div>
					
				</div>
			</div>
		</div>
	</nav>
</div>

	<div class="search-navbar-form " id="navbar-search">
		<?php if ( is_active_sidebar( 'search-widget' ) ) : ?>
		<?php dynamic_sidebar( 'search-widget' ); ?>
		<?php endif; ?>
	</div>
	
        