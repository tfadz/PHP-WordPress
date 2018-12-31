// Add image full sizes
<?php $img = get_field('image'); ?>
<?php echo wp_get_attachment_image($img['id'], 'full' ); ?>


// Add image full sizes and add class to image
<?php $img = get_field('image'); ?>
<?php echo wp_get_attachment_image($img['id'], 'lazy-load', false,  array('class' => 'lazy') ); ?>
