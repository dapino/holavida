		</main>
		<footer class="gray-bg ">
			<div class="container">
				<div class="row">
						
				  <div class="terms col s12 center-align">

				  		<?php
									wp_nav_menu(
										array(
											'theme_location' => 'footer-menu',
											'container' => 'ul',
											'sort_column' => 'menu_order',
											'container_class' => '',
											'menu_class' => 'footer-nav'
										)
									);
								?>
				  </div>
				  <div class="col s12 center-align">
					  <div class="social center-align">
					      <a href="https://www.facebook.com/comunidadbienestar/" class="button button-white button-circle icon-facebook" target="_blank">
					      </a>
					      <a href="https://www.instagram.com/bienestarmas/" class="button button-white button-circle icon-instagram" target="_blank">
					      </a>
					  </div>
				  </div>
				  <div class="col s12">
					  <div class="contact center-align">
					      <span class="icon icon-message">
					          <a class="white-text " href="mailto:hola@bienestarmas.com">	hola@bienestarmas.com</a>
					      </span>
					      
					      <span class="icon icon-phone">
					      	<a class="white-text" href="tel:+573012414244">
					          +57-301-2414244
					      	</a>
					      </span>
					  </div>
				  </div>
				  <div class="col s12">
					  <div class="copyright center-align grey-text text-lighten-2">
					      Copyright © 2016 Bienestar+ Todos los derechos reservados
					  </div>
				  </div>
				</div>
		  </div>
		  <?php wp_footer(); ?>
		</footer>
	</body>
</html>


