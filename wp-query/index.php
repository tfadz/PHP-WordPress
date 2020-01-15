<?php 
$args = array(
  'post_type' => 'post',
  'posts_per_page' => '3',
  'orderby' => 'date',
);

$query_posts = new WP_Query($args);
if( $query_posts->have_posts() ) : ?>

  <?php while ( $query_posts->have_posts() ) : $query_posts->the_post(); ?>

    <div class="col-lg-4">
      <a href="<?php the_permalink(); ?>" class="card">
        <?php the_post_thumbnail( 'full' ); ?>
        <div class="card-body">
          <h3><?php the_title(); ?></h3>
          <button class="button arrow trans-no">Read More</button>
        </div>
      </a>
    </div>
  <?php endwhile; ?> 
<?php endif; ?>
<?php wp_reset_postdata();  ?> 