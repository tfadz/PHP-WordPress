<!-- For ACF images -->
<link rel="preload" href="<?php echo $sht_img['url']; ?>" as="image">

<?php
// Add preload for article featured image hero

function add_custom_preload_image()
{
    if (is_single() && has_post_thumbnail()) {
        $id = get_post_thumbnail_id();
        $thumbnail_size = 'medium_large';
        $src = wp_get_attachment_image_src($id, $thumbnail_size);
        $srcset = wp_get_attachment_image_srcset($id, $thumbnail_size);
        $sizes = wp_get_attachment_image_sizes($id, $thumbnail_size);
        echo '<link rel="preload" as="image" href="' . esc_url($src[0]) . '" imagesrcset="' . esc_attr($srcset) . '" imagesizes="' . esc_attr($sizes) . '"/>';
    }
}
add_action('wp_head', 'add_custom_preload_image');

?>

<?php
// Add the preload link tag for custom logo
add_action('wp_head', 'preload_custom_logo');

function preload_custom_logo() {
    $custom_logo_id = get_theme_mod('custom_logo');
    $custom_logo_src = wp_get_attachment_image_src($custom_logo_id, 'full')[0]; ?>
<link rel="preload" as="image" href="<?php echo $custom_logo_src; ?>">
<?php } ?>