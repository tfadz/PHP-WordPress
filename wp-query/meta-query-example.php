<?php 

echo '<pre>';
var_dump( $author );
echo '</pre>';


// args
$args = array(
  'numberposts'	=> 3,
  'post_type'		=> 'post',
  'meta_query' => array(
    array(
                'key' => 'blog_author', // name of custom field
                'post_title' == 'Moyna John', 
              )
            )
);


// query
$the_query = new WP_Query( $args );

?>
<?php if( $the_query->have_posts() ): ?>
  <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <h4><?php the_title(); ?></h4>
    
  <?php endwhile; ?>
<?php endif; ?>

<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>

