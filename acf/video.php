 <?php 
 $video = get_field( 'home_video_link' );
 if ( $video ) {
    
    // Add autoplay functionality to the video code
    if ( preg_match('/src="(.+?)"/', $video, $matches) ) {
        
        // Video source URL
        $src = $matches[1];
        
        // Add option to hide controls, enable HD, and do autoplay -- depending on provider
        $params = array(
            'controls'    => 0,
            'hd'        => 1,
            'autoplay' => 1,
            'loop' => 1
        );
        $new_src = add_query_arg($params, $src);
        $video = str_replace($src, $new_src, $video);
        
        // add extra attributes to iframe html
        $attributes = 'frameborder="0"';
        $video = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $video);
    }
    echo '<div class="video-embed video-iframe">', $video, '</div>';
}
?>



// Get Thumbnail Image

<?php

$url = get_field('video', false, false);
//get wp_oEmed object, not a public method. new WP_oEmbed() would also be possible
$oembed = _wp_oembed_get_object();
//get provider
$provider = $oembed->get_provider($url);
//fetch oembed data as an object
$oembed_data = $oembed->fetch( $provider, $url );
$thumbnail = $oembed_data->thumbnail_url;
$iframe = $oembed_data->html;

 ?>

<img src="<?php echo $thumbnail ?>" alt="">
