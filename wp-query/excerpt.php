// Limit word count


<?php 
function custom_excerpt_length( $length ) {
    return 150;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function custom_excerpt_more( $more ) {
    return '&nbsp;...';//you can change this to whatever you want
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );

?>


you can also do it this way..

<p><?php echo wp_trim_words( get_the_excerpt(), 23, '&nbsp;... <strong>read more</strong>' ); ?></p>

