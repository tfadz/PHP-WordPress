<?php 
$term = get_field('which_location'); ?>

<?php var_dump($term) ?> // find info on tax field
<?php $marvin = $term[0]->slug; ?> // this makes it readable
<?php echo (get_term_by('slug', $marvin, 'install_locations')->description); ?> // this shows description

<!-- This shows how to use taxonomy to show recent posts -->

<div class="container">
	<div class="row">
		<?php
		$focusAreas = get_field('related_news_focus'); ?>
		<?php $query_posts = new WP_Query(
			array(
				'post_type' => 'news',
				'orderby' => 'date',
				'posts_per_page' => 3,
				'tax_query' => array(
					array(
						'taxonomy' => 'newsroom_focus_areas',
						'terms'    => $focusAreas,
					),
				),
			),
		);
		if( $query_posts->have_posts() ) : ?>
			<?php while ( $query_posts->have_posts() ) : $query_posts->the_post(); ?>
				<div class="col-lg-4">
					<a href="<?php the_permalink(); ?>" class="card">
						<?php the_post_thumbnail( 'full' ); ?>
						<h3><?php the_title(); ?></h3>
					</a>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_postdata();  ?>
	</div>
</div> 



<!-- Or like this ----- >

<?php $resourceTags = get_field('type_of_resource'); ?>

<?php $query_posts = new WP_Query(
    array(
        'post_type' => 'resource',
        'orderby' => 'date',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'resources_tags', // name of taxonomy category slug
                'terms'    => $resourceTags
            )
        )
    ),
);
if( $query_posts->have_posts() ) : ?>
<?php while ( $query_posts->have_posts() ) : $query_posts->the_post(); ?>
    <div>
        <a class="post" href="<?php echo get_the_permalink(); ?>">
            <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
            <figure class="post-image"><img src="<?php echo $featured_img_url ?>" alt=""></figure>
        </div>
    </a>
</div>
<?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_postdata();  ?>




