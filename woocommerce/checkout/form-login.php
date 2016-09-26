

  <?php

  if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
  }?>
    
  <?php 
  if ( is_user_logged_in() || 'no' === get_option( 'woocommerce_enable_checkout_login_reminder' ) ) {
    return;
  }?>
<div class="row checkout-step" id="step-2">
<ul class="multi-step-bar">
  <li>Carrito</li>
  <?php 
    if ( !is_user_logged_in() ) {
  ?>
    <li class="active">Ingreso</li>
  <?php  } ?>
  <li>Datos de compra</li>
  <li>Confirmación de pago</li>
</ul>
  <div class="row center-align">
    <?php 
      //$info_message  = apply_filters( 'woocommerce_checkout_login_message', __( '', 'woocommerce' ) );
      //$info_message .= ' <a href="#" class="waves-effect waves-light btn lighten-4 yellow-bg showlogin">' . __( 'Click here to login', 'woocommerce' ) . '</a>';
      //wc_print_notice( $info_message, 'notice' );
      ?>

    <?php
      woocommerce_login_form(
        array(
          'message'  => __( 'If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing &amp; Shipping section.', 'woocommerce' ),
          'redirect' => wc_get_page_permalink( 'checkout' ),
          'hidden'   => true
        )
      );
    ?>
  </div>
  <div class="col l8 m8 s12 offset-l2 offset-m2 center-align">
      <a class="btn prev-button gray-bg left" id="button-to-1">
        Anterior
      </a>
      <?php 
        if ( is_user_logged_in() ) {
      ?>
        <a class="btn next-button gray-bg right" id="button-to-3">
          Siguiente
        </a>
      <?php  } ?>
    </div>
</div>
