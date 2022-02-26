<nav class="sidebar-menu">
  <ul>
  <li class="parent-link"><a href="<?php echo get_permalink( $post->post_parent ); ?>" >
    <?php echo get_the_title( $post->post_parent ); ?></a></li>
    <?php
    $child_of_value = ( $post->post_parent ? $post->post_parent : $post->ID );
    // Depth of 2 if parent page, else depth of 1
    $depth_value = ( $post->post_parent ? 2 : 1 );
    // Build argument array
    echo '<ul>';
    $wp_list_pages_args = array( 
      'child_of' => $child_of_value,
      'depth' => $depth_value,
      'title_li' => ''
    );
    echo '</ul>';
    wp_list_pages( $wp_list_pages_args )
    ?>
  </ul>
  </nav>