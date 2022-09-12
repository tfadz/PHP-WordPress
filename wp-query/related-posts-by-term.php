related posts..


<ul class="related-posts-list quotes">
    <?php
    
    $related = get_posts(
        array(
        'category__in' => wp_get_post_categories($post->ID),
        'numberposts' => 2,
        'post_type' => 'stories_cpt',
        'orderby' => 'rand',
        'post__not_in' => array($post->ID),
        
        'tax_query' => array(
            array(
                'taxonomy' => 'stories_type', // <-- this is the custom taxonomy
                'field' => 'slug',
                'terms' => 'quotes', // <-- this is the term slug
            )
        ),
        
    )
    );

if ($related) {
    foreach ($related as $post) {
        setup_postdata($post); ?>
    <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
    
    <?php $types = get_the_terms($post->ID, 'stories_type'); ?> <!-- don't need this but if you needed to check for term you can use this -->
    <?php foreach ($types as $term): ?>
        <?php if ($term->slug == 'quotes') : ?>
            <li>
                <a href="<?php echo get_the_permalink(); ?>" class="post">
                    <div class="row">
                        
                        <div class="col-lg-9">
                            <figure>
                                <div class="post-article">
                                    <?php $author = get_field('story_author') ?>
                                    <?php if ($author) : ?><p class="author"><strong>By <?php echo $author; ?></strong></p><?php
                                endif; ?>
                                <p class="quote"><?php the_field('quote') ?></p>
                                
                            </div>
                        </div>
                    </div>
                </figure>
            </a>
        </li>
    <?php else : ?>
    <?php endif; ?>
<?php endforeach; ?>

<?php
    }
}
wp_reset_postdata(); ?>
</ul>