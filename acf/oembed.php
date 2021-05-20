<?php
// get video thumbnail
$url = get_field('txt_media_banner_video', false, false);
$oembed = _wp_oembed_get_object();
$provider = $oembed->get_provider($url);
$oembed_data = $oembed->fetch( $provider, $url );
$thumbnail = $oembed_data->thumbnail_url;
?>

<figure class="featured-img" style="background: url(<?php echo $thumbnail ?>) center/cover no-repeat;background-size: 150%;">
</figure>