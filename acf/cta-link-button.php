$cta_btn = get_field('cta_button');

$cta_btn_title = $cta_btn['title'];

$cta_btn_link = $cta_btn['url'];

 

<?php if($cta_btn) : ?> <a class="button  href="<?php echo esc_url( $cta_btn_link ); ?>"><?php echo esc_html( $cta_btn_title ); ?> <i class="far fa-arrow-right"></i></a><?php endif; ?>
