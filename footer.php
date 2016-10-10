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
					      <a href="<?php echo of_get_option('link-fbook') ?>" class="button button-white button-circle icon-facebook" target="_blank">
					      </a>
					      <a href="<?php echo of_get_option('link-inst') ?>" class="button button-white button-circle icon-instagram" target="_blank">
					      </a>
					  </div>
				  </div>
				  <div class="col s12">
					  <div class="contact center-align">
					      <span class="icon icon-message">
					          <a class="white-text " href="mailto:<?php echo of_get_option('mail') ?>">	<?php echo of_get_option('mail') ?></a>
					      </span>
					      
					      <span class="icon icon-phone">
					      	<a class="white-text" href="tel:+573012414244">
					          <?php echo of_get_option('telefono') ?>
					      	</a>
					      </span>
					  </div>
				  </div>
				  <div class="col s12">
					  <div class="copyright center-align grey-text text-lighten-2">
					      <?php echo of_get_option('copyright') ?>
					  </div>
				  </div>
				</div>
		  </div>
		  <?php wp_footer(); ?>
		</footer>
	</body>
</html>


