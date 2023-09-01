<?php $featured_author = get_field('assign_author'); ?>
<?php if( $featured_author ): ?>
    <?php setup_postdata($post); ?>
    <?php 
    $featured_img_url = get_post_thumbnail_id( $featured_author, $post->ID );
    $permalink = get_permalink( $featured_author->ID );
    ?>
    <a href="<?php echo esc_url( $permalink ); ?>" class="single-meta-author" style="display: flex;align-items:center;margin-bottom: 9px;">
        <img style="width:35px;height: 35px;margin-right:8px;border: 1px solid #DDD;" src="<?php echo wp_get_attachment_image_url( $featured_img_url, 'small' ); ?>" alt="">
        <h6 class="no-padding" style="font-weight:400;margin-right: .75rem;line-height: 1.25rem;">By <?php echo esc_html( $featured_author->post_title ); ?></h6>
    </a>
<?php endif; ?>
