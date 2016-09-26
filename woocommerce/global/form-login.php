<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

if ( is_user_logged_in() ) {
  return;
}

?>


<div class="row">
  <div class="col l8 m8 s12 offset-l2 offset-m2">
    <p class="login-intro center">Inicia sesión para entrar al mundo de experiencias saludables</p>
  </div>
</div>
<div class="row ">
  

  <div class="col l4 m6 s12 offset-l4 offset-m3 login-box">


    <div class="col l12 m12 s12 center-align">
      <a class="btn btn-signin-forms signin-button active" id="signin-button">
        Iniciar sesión
      </a>
      <a class="btn btn-signin-forms signup-button" id="signup-button">
        Crear cuenta
      </a>
    </div>

    <div class="row" id="customer_login">
      <div class="signin-form" id="signin-form">
        <form method="post" class="login form-login-myaccount" <?php if ( $hidden ) echo 'style="display:none;"'; ?>>

          <?php do_action( 'woocommerce_login_form_start' ); ?>

          <?php //if ( $message ) echo wpautop( wptexturize( $message ) ); ?>

          <p>
            <label for="username"><?php _e( 'Username or email address', 'woocommerce' ); ?> <span class="required">*</span></label>
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
          </p>
          <p>
            <label for="password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
            <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" />
          </p>

          <?php do_action( 'woocommerce_login_form' ); ?>

          <p class="center-align">
            <?php wp_nonce_field( 'woocommerce-login' ); ?>
            <input type="submit" class="btn" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>" />
            <input type="hidden" name="redirect" value="<?php echo esc_url( $redirect ) ?>" />
          </p>
          <p class="center-align">
            <label for="rememberme" class="inline">
              <input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e( 'Remember me', 'woocommerce' ); ?>
            </label>
          </p>
          <p class="lost_password center-align">
            <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'woocommerce' ); ?></a>
          </p>

          <div class="clear"></div>

          <?php do_action( 'woocommerce_login_form_end' ); ?>

        </form>
      </div>
      
      <div class="col m12 signup-form" id="signup-form">

        <!--<h2><?php //_e( 'Register', 'woocommerce' ); ?></h2>-->

        <form method="post" class="register form-login-myaccount">

          <?php do_action( 'woocommerce_register_form_start' ); ?>

          <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

            <p>
              <label for="reg_username"><?php _e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
              <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
            </p>

          <?php endif; ?>

          <p>
            <label for="reg_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
            <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" />
          </p>

          <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

            <p>
              <label for="reg_password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
              <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" />
            </p>

          <?php endif; ?>

          <!-- Spam Trap -->
          <div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php _e( 'Anti-spam', 'woocommerce' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>

          <?php do_action( 'woocommerce_register_form' ); ?>
          <?php do_action( 'register_form' ); ?>

          <p class="center-align">
            <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
            <input type="submit" class="btn btn-small gray-bg" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>" />
          </p>

          <?php do_action( 'woocommerce_register_form_end' ); ?>

        </form>

      </div>

  

    </div>
  </div>



</div>

