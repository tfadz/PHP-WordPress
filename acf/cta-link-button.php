<?php 
$cta_text_band_btn = get_field('cta_text_band_button');
if( $cta_text_band_btn ):  // This is important you check otherwise will down page!
  $cta_text_band_btn_title = $cta_text_band_btn['title'];
  $cta_text_band_link = $cta_text_band_btn['url'];
endif;
?>
<?php if($cta_text_band_btn) : ?> <a class="button inline sand" href="<?php echo esc_url( $cta_text_band_link ); ?>"><?php echo esc_html( $cta_text_band_btn_title ); ?> <i class="far fa-arrow-right"></i></a><?php endif; ?>
