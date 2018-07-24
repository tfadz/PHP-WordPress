<?php /* Template Name: Terry */?>

<?php get_header();?>

 <div id="primary" class="content-area" style="max-width: 1000px;margin: 0 auto;font-weight: normal;">
    <main id="main" class="site-main">
  
   <?php 
    $image = get_field('hero_image');
    $thumb_size = 'thumbnail';
    $full_size = 'url';
    $fullSizeImage = $image[$full_size]; 
    $mobileSizeImage = $image['sizes']['medium'];
   ?>

   <?php

    if ( !wp_is_mobile() ) {
      echo '<img src="' . $fullSizeImage.'" />';
    }

    else {
      echo '<img src="' . $mobileSizeImage.'" />';
    }

   ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();