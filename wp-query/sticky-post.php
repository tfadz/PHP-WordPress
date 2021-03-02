<?php $stickies = get_option( 'sticky_posts' ); ?>
<?php if($stickies) : ?>
	<?php
	$args = array(
		'post_type'           => 'post',
		'post__in'            => $stickies,
		'posts_per_page'      => 1,
	);
	$query = new WP_Query( $args ); ?>
	<?php if ( $query->have_posts() ) : ?>
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
			<article class="featured-article"
			style="
			<?php $featured_img_url = get_the_post_thumbnail_url(); ?>
			<?php if($featured_img_url) : ?>
				background: url(<?php echo $featured_img_url ?>) center/cover no-repeat;
				<?php else : ?>
					background: url(<?php bloginfo('template_directory'); ?>/assets/build/images/placeholder.jpg) center/cover no-repeat;<?php endif; ?> ">
					<h4><?php the_title(); ?></h4>
					<p><?php the_excerpt(); ?></p>
					<a href="<?php the_permalink(); ?>" class="button button-white">READ MORE</a>
				</article>
			<?php endwhile; ?>
			<?php else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>
		<?php endif; ?>
		<?php wp_reset_postdata();  ?>

<?php
	// this is what you put in for the non sticky posts
	$args = array(
		'post_type' => 'post',
		'posts_per_page'  => 5,
		'post_status' => 'publish',
		'post__not_in' => get_option( 'sticky_posts' ),
		'orderby' => 'date',
	);
?>