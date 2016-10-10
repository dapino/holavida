<div class="navbar-fixed hide-on-med-and-down <?php if(is_front_page() ) { ?> up <?php } else { ?> down <?php } ?> " id="#navbar">
	<nav>
		<div class="nav-wrapper">
			<div class="container">
				<div class="row">
					<div class="col m3 s12">
						<a href="<?php echo site_url(); ?>" class="brand-logo">
							<?php if ( get_theme_mod( 'custom_logo' ) ) : ?>
							<img src='<?php echo esc_url( get_theme_mod( 'custom_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
							<?php else : ?>
							<img src="" alt="Hola Vida!">
							<?php endif; ?>
						</a>
					</div>
					<div class="col m6 s12">
						<?php
									wp_nav_menu(
										array(
											'theme_location' => 'main-menu',
											'container' => 'ul',
											'sort_column' => 'menu_order',
											'container_class' => 'right',
											'menu_class' => 'main-nav right'
										)
									);
								?>
					</div>
					<div class="col m2 button-login">
						<?php 
						if ( is_user_logged_in() ) {
							$user_id         = get_current_user_id();
							$user            = get_userdata( $user_id );
							$mc_user_avatar = esc_url( get_the_author_meta( 'mc_meta', $user_id ) ); 
							$current_user = wp_get_current_user();
							$user_id         = get_current_user_id();
							$user            = get_userdata( $user_id );
							
						?>
							<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account',''); ?>">

								<div class="userAvatar right"><img src="<?php echo $mc_user_avatar; ?>"></div>
								<p class="userLink right">
    							<?php
    								printf( esc_html( $current_user->display_name ) );
    							?>
								</p>

							</a>
						<?php
				    } else { ?>
				        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account',''); ?>">

								<p class="userLink right">
    							Ingresar
								</p>

							</a>

							</a>
				    <?php } ?>
						
						
					</div>
				

							<div class="col m1">

								
								<div class="search-navbar" id="navbar-search-button">
									<span class="search-navbar-button">
									</span>
								</div>
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
	
        
<div class="show-on-med-and-down navbar-fixed mobile-nav<?php if(is_front_page() ) { ?> up <?php } else { ?> down <?php } ?> " id="#navbar">
	<nav>
		<div class="nav-wrapper">			
				<div class="row">
					<div class="col s9">
						
						<a href="<?php echo site_url(); ?>" class="brand-logo">
							<?php if ( get_theme_mod( 'custom_logo' ) ) : ?>
							<img src='<?php echo esc_url( get_theme_mod( 'custom_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
							<?php else : ?>
							<img src="" alt="Hola Vida!">
							<?php endif; ?>
						</a>

					</div>
					<div class="col s1 offset-s1">
						<div class="search-navbar" id="navbar-search-button">
							<span class="search-navbar-button">
							</span>
						</div>
					</div>
					<div class="col s1">
					
						<div class="showMenu" id="showMenu">
						</div>
					</div>
				</div>	
					
		</div>
	</nav>
</div>		
	<div class="mobile-menu show-on-med-and-down" id="mobileMenu">
		<?php
					wp_nav_menu(
						array(
							'theme_location' => 'mobile-menu',
							'container' => 'ul',
							'sort_column' => 'menu_order',
							'container_class' => '',
							'menu_class' => 'main-nav '
						)
					);
				?>
	</div>
