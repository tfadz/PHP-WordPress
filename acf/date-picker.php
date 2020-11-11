<?php
// This orders posts by date picked 'date' is the name of the acf field.
$args = array(
  'key' => 'date',
  'value' => date('Ymd'),
  'type' => 'DATE',
  'compare' => '>=',
  'post_type' => 'event',
  'post_status' => 'publish',
  'orderby' => 'meta_value_num',
  'meta_key' => 'date',
  'order' => 'DSC',
  'meta_query' => $meta_query
);
$query = new WP_Query( $args ); ?>
<?php if ( $query->have_posts() ) : ?>
  <?php while ( $query->have_posts() ) : $query->the_post(); ?>
    <?php
    // This checks to see if the date is today or in the future
    $dateevent = get_field('date', false, false);
    $today = strtotime(date('Ymd'));
    $promoend = strtotime($dateevent);
    ?>
    <?php if($promoend >=$today) : ?>
      <article class="event" id="post-<?php the_ID(); ?>">
        <div class="event__date">
          <!-- this pulls in the date and sorts it out into a seperate month, date and year -->
          <?php $event_timestamp = strtotime( get_field('date') ); ?>
          <span class="month h5"><?php echo date_i18n( "F", $event_timestamp ); ?></span>
          <span class="date h1"><?php echo date_i18n( "d", $event_timestamp ); ?></span>
        </div>
        <div class="event__info">
          <a href="<?php the_permalink(); ?>">
            <h4><?php the_title(); ?></h4>
            <p><?php the_field('date') ?><br><?php the_field('event_time') ?></p>
          </a>
        </div>
      </article>
    <?php endif; ?>
  <?php endwhile; ?>
</div>
<?php wp_reset_postdata(); ?>
<?php else : ?>
  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>