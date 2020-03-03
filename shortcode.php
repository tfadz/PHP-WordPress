<?php
// This includes the way to echo a single quote inside a single quote.

function vidyard_function( $atts, $content = null ) {
  // Adding parameters to button. For this we use id to refernce video id.
  $a = shortcode_atts( array(
    'id'    => '#',
    'target'  => '_self',
  ), $atts );
  
  return '<button onclick="launchLightbox('. "'" . esc_attr($a['id']) . "'" .')"  class="button">'. $content .'</button><div class="vidyard">
        <div class="vidyard-player-embed" data-uuid="'. esc_attr($a['id']) .'" data-v="4" data-type="lightbox"></div>
    </div><script>function launchLightbox(val) { 
        var players = VidyardV4.api.getPlayersByUUID(val);
        var player = players[0];
        player.showLightbox();
    }</script> ';
}

// Name of shortcode is vidyard
add_shortcode('vidyard', 'vidyard_function');
 ?>



 // Another example

 function button_shortcode( $atts, $content = null ) {
    //set default attributes and values
    $values = shortcode_atts( array(
        'url'     => '#',
        'target'  => '_self',
    ), $atts );
     
    return '<a href="'. esc_attr($values['url']) .'"  target="'. esc_attr($values['target']) .'" class="btn btn-green">'. $content .'</a>';
 
}
add_shortcode( 'button', 'button_shortcode' );