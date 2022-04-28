// This is used on a single post page to show the next/prev post
// This also includes any acf fields included in the next/prev post 

<?php
$next_post = get_next_post();
if ( is_a( $next_post , 'WP_Post' ) ) : ?>
<?php global $post; ?>
   
<?php $event_timestamp2 = strtotime( get_field('event_date', $next_post->ID) ); ?>
<h2 class="event-date">
<a style="text-decoration: none;" href="<?php echo get_permalink( $next_post->ID ); ?>">
<span class="day"><?php echo date_i18n( "D", $event_timestamp2 ); ?></span> <span class="month"><?php echo date_i18n( "M", $event_timestamp2 ); ?></span> <span class="date"><?php echo date_i18n( "d", $event_timestamp2 ); ?></span></a>
</h2>
<?php endif; ?>

<?php
$prev_post = get_previous_post();
if ( is_a( $prev_post , 'WP_Post' ) ) : ?>
<?php global $post; ?>
   
<?php $event_timestamp3 = strtotime( get_field('event_date', $prev_post->ID) ); ?>
<h2 class="event-date">
<a style="text-decoration: none;" href="<?php echo get_permalink( $prev_post->ID ); ?>">
<span class="day"><?php echo date_i18n( "D", $event_timestamp3 ); ?></span> <span class="month"><?php echo date_i18n( "M", $event_timestamp3 ); ?></span> <span class="date"><?php echo date_i18n( "d", $event_timestamp3 ); ?></span></a>
</h2>
<?php endif; ?>