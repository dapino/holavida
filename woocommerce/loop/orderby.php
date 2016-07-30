<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see       https://docs.woothemes.com/document/template-structure/
 * @author    WooThemes
 * @package   WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

?>
<div class="ordering-products-bar">
  <div class="ordering-item grid-toggle-buttons" >
    <div class="grid-toggle active" id="grid-toggle">
      <span class="grid-square"></span>
      <span class="grid-square"></span>
      <span class="grid-square"></span>
      <span class="grid-square"></span>
    </div>
    <div class="list-toggle" id="list-toggle">
      <span class="list-square"></span>
      <span class="list-square"></span>
      <span class="list-square"></span>
    </div>
  </div>
  
<script>
;(function($){
  $('#list-toggle').click(function() {
      console.log($(this))
      $('#grid-toggle').removeClass('active')
      $(this).addClass('active')
      $('#content-products-list').addClass('list-products');
      $('.product-item').addClass('list');
  });
  $('#grid-toggle').click(function() {
      console.log($(this))
      $('#list-toggle').removeClass('active')
      $(this).addClass('active')
      $('#content-products-list').removeClass('list-products');
      $('.product-item').removeClass('list');
  });

}(jQuery));
</script>
<form class="woocommerce-ordering ordering-item" method="get">
  <select name="orderby" class="orderby">
    <?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
      <option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
    <?php endforeach; ?>
  </select>
  <?php
    // Keep query string vars intact
    foreach ( $_GET as $key => $val ) {
      if ( 'orderby' === $key || 'submit' === $key ) {
        continue;
      }
      if ( is_array( $val ) ) {
        foreach( $val as $innerVal ) {
          echo '<input type="hidden" name="' . esc_attr( $key ) . '[]" value="' . esc_attr( $innerVal ) . '" />';
        }
      } else {
        echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
      }
    }
  ?>
</form>
</div>

