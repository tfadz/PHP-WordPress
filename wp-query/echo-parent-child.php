// Show the parent page in the breadcrumb
<div class="breadcrumbs-mobile">
  <?php if ( $post->post_parent ) { ?>
  <i class="fas fa-chevron-left"></i> <a href="<?php echo get_permalink( $post->post_parent ); ?>" >
  See <?php echo get_the_title( $post->post_parent ); ?>
  </a>
  <?php } ?>
</div>