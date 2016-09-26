<?php


add_action( 'after_setup_theme', 'theme_setup' );

if ( ! function_exists( 'theme_setup' ) ) :

  function theme_setup() {
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'menus' );
    add_theme_support( 'title-tag' );

    /*userbar*/
    add_filter( 'show_admin_bar', '__return_false' );
    
    /*imgs*/
    if (function_exists('add_image_size')) {
      add_image_size( 'foto-header', 1920, 700, true );
      add_image_size( 'thumbnail-blog', 475, 315, true );
      add_image_size( 'thumbnail-page', 738, 335, true );
      add_image_size( 'thumbnail-offers', 475, 315, true );
      add_image_size( 'icono-destacado', 100, 100, true );
      add_image_size( 'banner', 650, 300, true );
      add_image_size( 'product-thumbnail', 215, 150, true );
    }

    add_filter( 'image_size_names_choose', 'custom_image_sizes_choose' );
    function custom_image_sizes_choose( $sizes ) {
      $custom_sizes = array(
        'foto-header'        => 'Foto header',
        'thumbnail-blog'  => 'Miniatura blog',
        'thumbnail-page'  => 'Miniatura página',
        'thumbnail-offers'  => 'Miniatura ofertas',
        'icono-destacado'  => 'icono destacado',
        'banner'  => 'Banner home',
        'product-thumbnail'  => 'miniatura producto',
       
      );
      return array_merge( $sizes, $custom_sizes );
    }

function theme_customizer( $wp_customize ) {
      $wp_customize->add_section( 'custom_logo_section' , array(
        'title'       => __( 'Logo', 'd' ),
        'priority'    => 30,
        'description' => 'Upload a logo',
      ) );

      $wp_customize->add_setting( 'custom_logo' );

      $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
        'label'    => __( 'Logo', 'd' ),
        'section'  => 'custom_logo_section',
        'settings' => 'custom_logo',
      ) ) );
    }
    add_action( 'customize_register', 'theme_customizer' );
    /*menu*/
      function register_menu() {
        register_nav_menu('main-menu', __('Main menu')); 
        register_nav_menu('footer-menu', __('Footer menu')); 
      }   
      add_action('init', 'register_menu');

    function head_cleanup() {
      // remove header links
      remove_action( 'wp_head', 'feed_links_extra', 3 );                    // Category Feeds
      remove_action( 'wp_head', 'feed_links', 2 );                          // Post and Comment Feeds
      remove_action( 'wp_head', 'rsd_link' );                               // EditURI link
      remove_action( 'wp_head', 'wlwmanifest_link' );                       // Windows Live Writer
      remove_action( 'wp_head', 'index_rel_link' );                         // index link
      remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );            // previous link
      remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );             // start link
      remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); // Links for Adjacent Posts
      remove_action( 'wp_head', 'wp_generator' );                           // WP version
    }
    // launching operation cleanup
    add_action('init', 'head_cleanup');
  }
endif;// theme_setup

function wpdocs_after_setup_theme() {
    add_theme_support( 'html5', array( 'search-form' ) );
}
add_action( 'after_setup_theme', 'wpdocs_after_setup_theme' );
 
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}


add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );
add_filter( 'woocommerce_product_add_to_cart_text', 'woo_archive_custom_cart_button_text' );
function woo_custom_cart_button_text() { return __( 'Vivir experiencia', 'woocommerce' );}
 
function woo_archive_custom_cart_button_text() {
  return __( 'Vivir experiencia', 'woocommerce' );
}



function cambiar_productos_por_pagina() {
return 12;
}
add_filter( 'loop_shop_per_page', 'cambiar_productos_por_pagina' );



if ( !function_exists( 'of_get_option' ) ) {
function of_get_option($name, $default = false) {

  $optionsframework_settings = get_option('optionsframework');

  // Gets the unique option id
  $option_name = $optionsframework_settings['id'];

  if ( get_option($option_name) ) {
      $options = get_option($option_name);
    }

    if ( isset($options[$name]) ) {
      return $options[$name];
    } else {
      return $default;
    }
  }
}


function define_widgets() {

   register_sidebar( array(
    'name'          => 'search',
    'id'            => 'search-widget',
    'before_widget' => '<div class="form-group">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
  ) );

  
  register_sidebar( array(
      'id'          => 'form-newsletter',
      'name'        =>  'Newsletter',
      'description' => 'campo del formulario de newsletter',
  ) );
  


}
add_action( 'widgets_init', 'define_widgets' );


remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );
add_filter('auto_update_core', '__return_false');
add_filter( 'auto_update_plugin', '__return_false' );
add_filter( 'auto_update_theme', '__return_false' );

// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );


function my_custom_menu() {
  add_menu_page ( 'Blog', 'Blog', 'read', 'edit.php', '', '', 1);
}
add_action( 'admin_menu', 'my_custom_menu'); 
function woocommerce_header_add_to_cart_fragment( $fragments ) {
  ob_start();
  ?>
  <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf (_n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a> 
  <?php
  
  $fragments['a.cart-contents'] = ob_get_clean();
  
  return $fragments;
}

// Remove each style one by one
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
  unset( $enqueue_styles['woocommerce-general'] );  // Remove the gloss
  unset( $enqueue_styles['woocommerce-layout'] );   // Remove the layout
  unset( $enqueue_styles['woocommerce-smallscreen'] );  // Remove the smallscreen optimisation
  return $enqueue_styles;
}


function wc_ninja_remove_password_strength() {
  if ( wp_script_is( 'wc-password-strength-meter', 'enqueued' ) ) {
    wp_dequeue_script( 'wc-password-strength-meter' );
  }
}
add_action( 'wp_print_scripts', 'wc_ninja_remove_password_strength', 100 );

  //add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );


function get_excerpt(){
  $excerpt = get_the_content();
  $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
  $excerpt = strip_shortcodes($excerpt);
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, 80);
  $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
  $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
  $excerpt = $excerpt.'...';
  return $excerpt;
}



if( !function_exists("theme_styles") ) {  
  function theme_styles() { 

  wp_register_style( 'font', 'https://fonts.googleapis.com/css?family=Raleway', array(), '1.0', 'all' );
    wp_register_style( 'theme-style', get_stylesheet_directory_uri() . '/assets/css/main.css', array(), '1.0', 'all' );

  
    wp_enqueue_style( 'font' );
    wp_enqueue_style( 'theme-style' );
    }
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );


if( !function_exists("theme_scripts") ) {  
  function theme_scripts() { 
    
    //wp_register_script( 'material-script', get_stylesheet_directory_uri() . '/assets/js/materialize.min.js', array( 'jquery' ), '1.0' );
    //wp_register_script( 'owl-script', get_stylesheet_directory_uri() . '/assets/js/owl.carousel.min.js', array( 'jquery' ), '1.0' );
    //wp_register_script( 'ver-script', get_stylesheet_directory_uri() . '/assets/js/vercarousel.js', array( 'jquery' ), '1.0' );
    wp_register_script( 'theme-script', get_stylesheet_directory_uri() . '/assets/js/theme.js', array( 'jquery' ), '1.0' );

   
    wp_enqueue_script( 'theme-script' );
    }
}

add_action( 'wp_enqueue_scripts', 'theme_scripts' );



//add_filter('woocommerce_login_redirect', 'wc_login_redirect');
 
//function wc_login_redirect( $redirect_to ) {
    //$redirect_to =  '/my-account/orders/';
     //return $redirect_to;
//}
//add_filter('woocommerce_registration_redirect', 'wc_register_redirect');
//function wc_register_redirect( $redirect_up ) {
  //   $redirect_up = '/my-account/edit-account/';
  //   return $redirect_up;
//}


//Custom Post Type slide
function slides_taxonomy() {
  $labels = array( 
    'name'               => _x( 'slide', 'slide' ),
    'singular_name'      => _x( 'slide', 'slide' ),
    'add_new'            => _x( 'Nuevo slide', 'slide' ),
    'add_new_item'       => _x( 'Nuevo slide', 'slide' ),
    'edit_item'          => _x( 'Editar slide', 'slide' ),
    'new_item'           => _x( 'Nuevo slide', 'slide' ),
    'view_item'          => _x( 'Ver slide', 'slide' ),
    'search_items'       => _x( 'Buscar slide', 'slide' ),
    'not_found'          => _x( 'No se encontraron slides', 'slide' ),
    'not_found_in_trash' => _x( 'No se encontraron slides en la papelera', 'slide' ),
    'menu_name'          => _x( 'slides', 'slide' ),
    );

  $args = array( 
    'can_export'          => true,
    'capability_type'     => 'post',
    'exclude_from_search' => true,
    'has_archive'         => false,
    'hierarchical'        => false,
    'labels'              => $labels,
    'menu_icon'   => 'dashicons-slides',
    'menu_position'       => 5,
    'public'              => true,
    'publicly_queryable'  => true,
    'query_var'           => true,
    'rewrite'             => array("slug" => "slide"),
    'show_in_admin_bar' => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => false,
    'show_ui'             => true,
    'supports'            => array( 'title', 'excerpt', 'thumbnail' )
    );

  register_post_type( 'slide', $args );
  flush_rewrite_rules();
}
add_action( 'init', 'slides_taxonomy' );

global $woocommerce; 



                 


class My_Custom_My_Account_Endpoint {
  /**
   * Custom endpoint name.
   *
   * @var string
   */
  public static $endpoint = 'my-wishlist';
  public function __construct() {
    // Actions used to insert a new endpoint in the WordPress.
    add_action( 'init', array( $this, 'add_endpoints' ) );
    add_filter( 'query_vars', array( $this, 'add_query_vars' ), 0 );
    // Change the My Accout page title.
    add_filter( 'the_title', array( $this, 'endpoint_title' ) );
    // Insering your new tab/page into the My Account page.
    add_filter( 'woocommerce_account_menu_items', array( $this, 'new_menu_items' ) );
    add_action( 'woocommerce_account_' . self::$endpoint .  '_endpoint', array( $this, 'endpoint_content' ) );
  }
  public function add_endpoints() {
    add_rewrite_endpoint( self::$endpoint, EP_ROOT | EP_PAGES );
  }
  /**
   * Add new query var.
   *
   * @param array $vars
   * @return array
   */
  public function add_query_vars( $vars ) {
    $vars[] = self::$endpoint;
    return $vars;
  }
  /**
   * Set endpoint title.
   *
   * @param string $title
   * @return string
   */
  public function endpoint_title( $title ) {
    global $wp_query;
    $is_endpoint = isset( $wp_query->query_vars[ self::$endpoint ] );
    if ( $is_endpoint && ! is_admin() && is_main_query() && in_the_loop() && is_account_page() ) {
      // New page title.
      $title = __( 'Lista de deseos', 'woocommerce' );
      remove_filter( 'the_title', array( $this, 'my-wishlist' ) );
    }
    return $title;
  }
  /**
   * Insert the new endpoint into the My Account menu.
   *
   * @param array $items
   * @return array
   */
  public function new_menu_items( $items ) {
    // Remove the logout menu item.
    $logout = $items['customer-logout'];
    unset( $items['customer-logout'] );
    // Insert your custom endpoint.
    $items[ self::$endpoint ] = __( 'my-wishlist', 'woocommerce' );
    // Insert back the logout item.
    $items['customer-logout'] = $logout;
    return $items;
  }
  /**
   * Endpoint HTML content.
   */
  public function endpoint_content() {
    //wc_get_template( 'myaccount/navigation.php' ); ?>

    <div class="woocommerce-MyAccount-content">
      <?php echo do_shortcode('[yith_wcwl_wishlist]' );?> 
    </div>

    <?php
  }
  /**
   * Plugin install action.
   * Flush rewrite rules to make our custom endpoint available.
   */
  public static function install() {
    flush_rewrite_rules();
  }
}
new My_Custom_My_Account_Endpoint();
// Flush rewrite rules on plugin activation.
register_activation_hook( __FILE__, array( 'My_Custom_My_Account_Endpoint', 'install' ) );






function wpb_woo_my_account_order() {
  $myorder = array(
    'orders'             => __( 'Mis experiencias', 'woocommerce' ),
    'my-wishlist' => __( 'Lista de deseos', 'woocommerce' ),
    'edit-account'       => __( 'Editar perfil', 'woocommerce' ),
    'edit-address'       => __( 'Información de faturación', 'woocommerce' ),
    'customer-logout'    => __( 'Cerrar sesión', 'woocommerce' ),
  );
  return $myorder;
}
add_filter ( 'woocommerce_account_menu_items', 'wpb_woo_my_account_order' );


function wpb_woo_endpoint_title( $title, $id ) {
  if ( is_wc_endpoint_url( 'downloads' ) && in_the_loop() ) { // add your endpoint urls
    $title = "Mis experiencias"; // change your entry-title
  }
  elseif ( is_wc_endpoint_url( 'orders' ) && in_the_loop() ) {
    $title = "Mis experiencias";
  }
  elseif ( is_wc_endpoint_url( 'my-wishlist' ) && in_the_loop() ) {
    $title = "Lista de deseos";
  }
  elseif ( is_wc_endpoint_url( 'edit-account' ) && in_the_loop() ) {
    $title = "Editar perfil";
  }
  elseif ( is_wc_endpoint_url( 'edit-address' ) && in_the_loop() ) {
    $title = "Información de facturación";
  }
  elseif ( is_wc_endpoint_url( 'edit-account' ) && in_the_loop() ) {
    $title = "Editar perfil";
  }

  return $title;
}
add_filter( 'the_title', 'wpb_woo_endpoint_title', 10, 2 );







function mc_edit_user_form( ){

  // vars
  $user_id         = get_current_user_id();
  $user            = get_userdata( $user_id );
 
  if ( !$user )
    return;
  $url             = get_the_author_meta( 'mc_meta', $user->ID );
  $upload_url      = get_the_author_meta( 'mc_upload_meta', $user->ID );
  $upload_edit_url = get_the_author_meta( 'mc_upload_edit_meta', $user->ID );
  $user_bio        = get_the_author_meta( 'mc_user_bio', $user->ID );
  $button_text     = $upload_url ? 'Change Current Image' : 'Upload New Image';

  if ( $upload_url ) {
    $upload_edit_url = get_site_url() . $upload_edit_url;
  }
  ?>
  <fieldset>
    <legend>Información básica</legend>

    <table class="form-table">
      <tr>
        <td><label for="mc_meta">Foto de perfil</label>
          <!-- Outputs the image after save -->
          <div id="current_img">
            <?php if ( $upload_url ): ?>
              <img class="mc-current-img" src="<?php echo esc_url( $upload_url ); ?>"/>

              <div class="edit_options uploaded">
                <a class="remove_img">
                  <span>Eliminar</span>
                </a>

                <a class="edit_img" href="<?php echo esc_url( $upload_edit_url ); ?>" target="_blank">
                  <span>Editar</span>
                </a>
              </div>
            <?php elseif ( $url ) : ?>
              <img class="mc-current-img" src="<?php echo esc_url( $url ); ?>"/>
              <div class="edit_options single">
                <a class="remove_img" title="Remove">
                  <span>Eliminar</span>
                </a>
              </div>
            <?php else : ?>
              <img class="mc-current-img placeholder"
                   src="<?php echo esc_url( plugins_url( 'woocommerce/assets/images/placeholder.png' ) ); ?>"/>
            <?php endif; ?>
          </div>

          <!-- Hold the value here if this is a WPMU image -->
          <div id="mc_upload">
            <input class="hidden" type="hidden" name="mc_placeholder_meta" id="mc_placeholder_meta"
                   value="<?php echo esc_url( plugins_url( 'woocommerce/assets/images/placeholder.png' ) ); ?>"/>
            <input type="file" name="thumbnail" id="thumbnail">
            <br/>
          </div>
          
        </td>
      </tr>
    </table><!-- end form-table -->
  
  <?php 
}
add_action( 'woocommerce_edit_account_form', 'mc_edit_user_form' );

function mc_save_user_form( $user_id ) {
  if ( ! function_exists( 'wp_handle_upload' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
  }

  if (!empty($_FILES['thumbnail'])) {
    $uploadedfile = $_FILES['thumbnail'];

    $upload_overrides = array( 'test_form' => false );

    $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );

    if ( $movefile && ! isset( $movefile['error'] ) ) {
        $mc_meta = $movefile['url'];
    } else {
        $mc_meta = '';
        /**
         * Error generated by _wp_handle_upload()
         * @see _wp_handle_upload() in wp-admin/includes/file.php
         */
        // echo $movefile['error'];
    }
  }

  $values = array(
    'mc_meta'     => $movefile['url'],
    'mc_user_bio' => filter_input( INPUT_POST, 'mc_bio', FILTER_SANITIZE_STRING ),
  );

  foreach ( $values as $key => $value ) {
    update_user_meta( $user_id, $key, $value );
  }
}
add_action( 'woocommerce_save_account_details', 'mc_save_user_form' );




function mc_get_user_avatar() {
  $user_id         = get_current_user_id();
  $user            = get_userdata( $user_id );

  $mc_user_avatar = esc_url( get_the_author_meta( 'mc_meta', $user_id ) );

  ?>
<div class="container vendor-profile">
  <div class="row">
    <div class="col l3 m4 s12">
      <div class="vendor-profile-img valign-wrapper">
        <div class="userAvatar"><img src="<?php echo $mc_user_avatar; ?>"></div>
        
      </div>
    </div>
  <?php
}
add_action( 'woocommerce_before_account_navigation', 'mc_get_user_avatar' );

function mc_get_user_bio() {
  $user_id         = get_current_user_id();
  $user            = get_userdata( $user_id );

  // Check first for a custom uploaded image.
  $mc_user_bio = get_the_author_meta( 'mc_user_bio', $user_id );

  $mc_user_bio ? $mc_user_bio : '';
  ?>
    <div class="col l9 m8 s12 valign-wrapper">
      
      <div class="vendor-profile-bio valign">
        <h2 class=" h2 vendor-title ">
          <?php echo "<div id='header-welcome'>Bienvenido ". $user->display_name ."</div>"; ?>
        </h2>
          <div class="userBio"><?php echo $mc_user_bio; ?></div>
        
      </div>
    </div>
  </div>
</div>
  <?php 
}
add_action( 'woocommerce_before_account_navigation', 'mc_get_user_bio' );

