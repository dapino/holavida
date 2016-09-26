<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

/**
 * My Account navigation.
 * @since 2.6.0
 */
$user_id         = get_current_user_id();
$user            = get_userdata( $user_id );
?>




      
  <div class="center">
    <h3 class=" h2 vendor-title ">
      <?php echo "<div id='header-welcome'>Bienvenido ". $user->display_name ."</div>"; ?>
    </h3>

  </div>
<?php
do_action( 'woocommerce_account_navigation' ); ?>

<div class="woocommerce-MyAccount-content col l8 m10 s12 offset-l2 offset-m1">
	<?php
		/**
		 * My Account content.
		 * @since 2.6.0
		 */
		do_action( 'woocommerce_account_content' );
	?>
</div>
