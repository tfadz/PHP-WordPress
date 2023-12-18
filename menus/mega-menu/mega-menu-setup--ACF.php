<div class="mega-menu-container">
    <div class="container">
    <div class="row">
<?php
$mm = get_field('mega_menu', $item->object_id);
if ($mm) :
    ?>
    <?php while (have_rows('mega_menu', $item->object_id)) : the_row(); ?>
        <?php
        $width_of_columns = get_sub_field('width', $item->object_id);
        $number_of_internal_columns = get_sub_field('number_of_internal_columns', $item->object_id);
        $tint = get_sub_field('tint', $item->object_id);
        $item_classes = '';
        if ($number_of_internal_columns == 3 ) {
            $item_classes .= ' three-columns';
        } else if ($number_of_internal_columns == 4 ) {
            $item_classes .= ' four-columns';
        } else if ($number_of_internal_columns == 2 ) {
            $item_classes .= ' two-columns';
        }
        ?>
        
        <?php if( get_row_layout() == 'mm_wp_menu' ) : ?>
        <!-- If admin picks menu layout -->
        <div class="col <?php if($width_of_columns) : ?>col-lg-<?php echo $width_of_columns ?><?php endif; ?> <?php if($tint) : ?>tint<?php endif; ?>">
            <div class="mega-menu-main">
                <?php if (get_sub_field('heading', $item->object_id)) : ?>
                    <h5><?php the_sub_field('heading', $item->object_id); ?></h5>
                <?php endif; ?>
                <?php if (get_sub_field('menu', $item->object_id)) : ?>
                    <div class="wp-menu <?php echo esc_attr($item_classes); ?>">
                        <?php the_sub_field('menu', $item->object_id); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
        <?php if( get_row_layout() == 'mm_wp_posts' ) : ?>
            <!-- If admin picks posts layout -->
            <div class="col <?php if($width_of_columns) : ?>col-lg-<?php echo $width_of_columns ?><?php endif; ?> <?php if($tint) : ?>tint<?php endif; ?>">
            <div class="mega-menu-main posts">
                <?php if (get_sub_field('heading', $item->object_id)) : ?>
                    <h5><?php the_sub_field('heading', $item->object_id); ?></h5>
                <?php endif; ?>
                    <div class="wp-posts">
                        <?php 
                          $posts = get_sub_field('posts', $item->object_id);
                          if( $posts ): ?>
                            <?php foreach( $posts as $p ): ?>
                            <a class="wp-posts-item" href="<?php the_permalink($p->ID); ?>">
                                <div class="row">
                                    <div class="col-5">
                                        <?php $featured_img_url = get_the_post_thumbnail_url($p->ID,'large'); ?>
                                        <?php if($featured_img_url) : ?>
                                        <div class="wp-posts-item__img" style="background-image: url(<?php echo $featured_img_url ?>);"></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-6">
                                         <h5><?php echo get_the_title( $p->ID ); ?></h5>
                                         <p class="wp-posts-item__excerpt"><?php echo wp_trim_words(get_the_excerpt($p->ID), 9); ?></p>
                                         <div class="wp-posts-item__cta">Learn more <i class="fas fa-arrow-right"></i></div>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
</div>
</div>
</div>
