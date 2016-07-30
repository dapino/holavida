    <?php 
      $taxonomyName = "product_cat";
      $parent_terms = get_terms($taxonomyName, array('parent' => 0, 'orderby' => 'ID', 'hide_empty' => false));
      echo '<ul class="category-list row">';
        foreach ($parent_terms as $term) {
          echo '<li class="col l4 m12 s12" ><div class="card-panel hoverable category category-' . $term->slug . '"><a href="' . get_term_link($term->name, $taxonomyName) . '">';
          $thumbnail_id = get_woocommerce_term_meta($term->term_id, 'thumbnail_id', true);
          //$image = wp_get_attachment_url($thumbnail_id);
          echo "<h2 class='category-title'><span class='category-icon'></span>". $term->name ."</h2><p>" . $term->description . "</p></a></div></li>";
        }
      echo '</ul>';
    ?>

    <!--<img src='{$image}' alt='' width='100' height='100' />-->
