Example 1

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


Example 2

<?php if ( $query->have_posts() ) : ?>
  <?php while ( $query->have_posts() ) : $query->the_post(); ?>
    <div class="row mb-2 pb-2">   
      <div class="the-post col-lg-8">
        <div class="meta">
          <h3><a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>"><?php the_title(); ?></a></h3>
          <div><?php the_excerpt(); ?></div>
          <div class="d-flex"><?php the_category(); ?> <div class="author"><?php the_author(); ?></div></div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="featured-img">
          <?php $featured_img_url = get_the_post_thumbnail_url($p->ID,'medium_large'); ?>
          <img src="<?php echo $featured_img_url ?>" alt="">
        </div>
      </div>
    </div>

  <?php endwhile; ?>

  <?php wp_reset_postdata(); ?>

  <?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>
        

  <!-- If for some reason your posts are showing weird or some conflict is happeing (on wp query) do this before you post code-- >

  <?php global $post; ?>

  or try...

  <?php $post_id = 238; // set the post this is the post id of the page. hover over page it will reveal number ?>


  <!-- example from playful learning site -->

  <div class="post-date">
    <?php global $post; ?>
    <?php
    $date = get_field('events_date', $post);
    $eventDate = new DateTime($date);
    ?>

    <div class="post-date-numeral"><?php echo $eventDate->format('j'); ?></div><div class="post-date-month"><?php echo $eventDate->format('F'); ?></div>

  </div>