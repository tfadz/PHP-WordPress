<?php if( have_rows('file') ): while ( have_rows('file') ) : the_row(); ?>
    <?php
    $f_label = get_sub_field('label');
    $f_image = get_sub_field('image');
    $f_image_link = wp_get_attachment_image_src( $f_image, $size );
    $url = wp_get_attachment_url( $f_image );
    $size = 'large'; 
    ?>
    <div><a href="<?php echo $f_image_link[0] ?>">Download <?php echo $f_label ?></a></div>
    <?php endwhile; endif; ?>