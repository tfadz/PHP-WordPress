// This is to show related posts based on custom post type category
<section class="related-news">
	<div class="row align-center">
		<div class="col-md-6">
			<h2 class="alt no-padding">Related News</h2>
		</div>
		<div class="col-md-6 flex-right">
			<a class="button button-tertiary m0" href="<?php echo home_url(); ?>/newsroom">Explore our Newsroom</a>
		</div>
	</div>

	<div class="row pt2">

		<?php
		$custom_taxterms = wp_get_object_terms( $post->ID, 'newsroom_type', array('fields' => 'ids') );

		$related = get_posts(
			array(
				'post_type' => 'news',
				'tax_query' => array(
					array(
						'taxonomy' => 'newsroom_type',
						'field' => 'id',
						'terms' => $custom_taxterms
					)
				),

				'numberposts' => 3,
				'orderby' => 'rand',
				'post__not_in' => array($post->ID),
			));
		if ($related) {
			foreach ($related as $post) {
				setup_postdata($post);
				?>
				<?php $fimg = get_the_post_thumbnail_url(); ?>
				<div class="col-lg-4">
					<a class="news-post" href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
						<?php $featured_img_url = get_the_post_thumbnail_url(); ?>
						<?php if($featured_img_url) : ?>
							<figure style="background: url(<?php echo $featured_img_url ?>) top/cover no-repeat;"></figure><?php else : ?><figure><img src="<?php echo esc_url( wp_get_attachment_image_src( get_theme_mod( 'custom_logo'),'small')[0] ); ?>" alt=""></figure>
						<?php endif; ?>
						<div class="news-info">
							<div class="category">
								<?php
								$terms = get_the_terms( $post->ID , 'newsroom_type' );
								if($terms) :
									foreach ( $terms as $term ) {
										echo '<h4>' . $term->name . '</h4>';
									}
								endif;
								?>
							</div>
							<h3><?php the_title(); ?></h3>
							<p><?php echo get_the_date(); ?></p>
						</div>
					</a>
				</div>

			<?php } } wp_reset_postdata(); ?>

		</div>
	</section>