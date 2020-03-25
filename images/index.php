<!-- Link to featured image -->

<?php
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
/* link thumbnail to full size image for use with lightbox*/
echo '<a href="'.esc_url($featured_img_url).'" rel="lightbox">'; 
the_post_thumbnail('full');
echo '</a>'; 
?>
          

<?php

$image = get_sub_field('image');
$size = 'full'; // (thumbnail, medium, large, full or custom size)

if( $image ) {
echo wp_get_attachment_image( $image, $size );
} 

// Adding class to wp get
echo wp_get_attachment_image( $i_image, $size, "", ["class" => "b-lazy"] ); 

?>


<?php
    $image = get_field('hero_image');
    $thumb_size = 'thumbnail';
    $full_size = 'url';
    $fullSizeImage = $image[$full_size];
    $mobileSizeImage = $image['sizes']['medium'];
?>
<!-- Use this to serve images the right way -->
<?php echo wp_get_attachment_image($image['id'], 'full' ); ?>

<!-- Use this for other instances -->
<?php
if ( !wp_is_mobile() ) {
  echo '<img src="' . $fullSizeImage.'" />';
}
else {
  echo '<img src="' . $mobileSizeImage.'" />';
}
?>

<!--  // Code not tested but could work -->

<!-- Slider -->
<?php if(get_row_layout() == "slider_content"): ?>
  <section class="ri-slider">
    <?php if(have_rows('slides')) : while(have_rows('slides')) : the_row(); 
      $slide = get_sub_field('slide');
      ?>
      <div>
        <?php if( !wp_is_mobile() ) {
          echo '<img src="' . $slide['sizes']['large'] . '" alt="' . $slide['alt'] .'">';
        }

        else {
          echo '<img src="' . $slide['sizes']['small']. '" alt="' . $slide['alt'] .'">';
        }
        ?>
      </div>
    <?php endwhile; endif; ?>
      </section>
    <?php endif; ?>

  <?php endwhile; endif; ?>
