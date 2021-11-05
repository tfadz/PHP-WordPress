function dequeue_dequeue_plugin_style(){
  // grab from id but dont' include -css or -js
  if (is_front_page()) {
    wp_dequeue_style( 'scap.flashblock' ); 
    wp_dequeue_style( 'scap.player' ); 

    wp_dequeue_script( 'scap.soundmanager2' ); 
  }

}
add_action( 'wp_enqueue_scripts', 'dequeue_dequeue_plugin_style', 999 );