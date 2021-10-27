<!-- Save if they want to show recent posts by focus area -->
	<div class="row">
		<?php
		$albums = get_field('related_news_tax'); ?>
		<?php $query_posts = new WP_Query(
			array(
				'post_type' => 'news',
				'orderby' => 'date',
				'posts_per_page' => 3,
				'tax_query' => array(
					array(
						'taxonomy' => 'newsroom_focus_areas',
						'terms'    => $albums,
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
