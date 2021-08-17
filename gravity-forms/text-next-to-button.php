<?php 

add_filter( 'gform_submit_button_1', 'add_paragraph_below_submit', 10, 2 );
function add_paragraph_below_submit( $button, $form ) {
// acf option fields
$ctaButton = get_field('form_cta', 'options');
$ctaButtonlink = get_field('form_ctalink', 'options')['url'];

return $button .= "<a href='$ctaButtonlink'>  $ctaButton  </a>";
}


 ?>