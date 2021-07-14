<?php 

// Pull in Taxonomy terms and the posts that they relate to. (This was used in CTLGroup website)

$custom_terms = get_terms('custom_taxonomy');

foreach($custom_terms as $custom_term) {
    wp_reset_query();
    $args = array('post_type' => 'custom_post_type',
        'tax_query' => array(
            array(
                'taxonomy' => 'custom_taxonomy',
                'field' => 'slug',
                'terms' => $custom_term->slug,
            ),
        ),
     );

     $loop = new WP_Query($args);
     if($loop->have_posts()) {
        echo '<h2>'.$custom_term->name.'</h2>';

        while($loop->have_posts()) : $loop->the_post();
            echo '<a href="'.get_permalink().'">'.get_the_title().'</a><br>';
        endwhile;
     }
}

?>

Another way..this also shows how to get the term link

<?php $markets = get_the_terms( get_the_ID(), 'market' ); ?>
<?php if( !empty($markets)) { ?>
  <div class="content-block">
    <h4>Markets</h4>
    <ul>
      <?php foreach ( $markets as $market_key ) { ?>
        <?php $term_link = get_term_link( $market_key ); ?>
        <li><a href="<?php echo $term_link ?>"><?php echo esc_html( $market_key->name ); ?></a></li>
      <?php }  ?>
    </div>
  <?php }  ?>
</ul> 


And another way... (this is from mccormick for single installations page)

<ul class="locations">
  <?php. // install_locations is the custom taxonomy
  $terms = get_terms( array ( 'taxonomy' => 'install_locations', 'hide_empty' => false, 'parent' => 0, 'orderby' => 'description', 'order' => 'ASC' ));

  foreach ($terms as $term) {
    $name  = $term->name;
    $cat_link = get_term_link( $term->slug, 'install_locations' );

    ?>

    <li><a href="<?php echo $cat_link; ?>"><?php echo $name; ?></a> </li>
  <?php } ?>
</ul>


To Show related posts by custom taxonomy 

<?php $terms = get_the_terms( get_the_ID(), 'consulting_services' );  ?>
<?php $term_ids = wp_list_pluck($terms,'term_id'); ?>

  <?php
    $args = array(
    'post_type'      => 'project',
      'tax_query' => array(
        array(
        'taxonomy' => 'consulting_services',
        'field' => 'id',
        'terms' => $term_ids,
        'operator'=> 'IN' 
      )),
    'posts_per_page' => 6,
    'orderby'        => 'post__in',
  );





<?php 

 // Simply output the tax and children (simple method)

wp_list_categories( array(
'taxonomy'  => 'consulting_services',
'title_li' => ''
) ); 
?>



<?php

// To pull the parent taxonomy and then show the children terms (used in CTLGroup website)
$services = get_terms(
    array(
        'taxonomy'   => array( 'consulting_services' ),
        'hide_empty' => false,
        'parent' => 0
    )
);
?>

<?php foreach ( $services as $service_term ) { ?>
  <div class="row service">
    
    <div class="col-lg-6 primary">
       <!-- Parent Term -->
      <h3> <?php echo esc_html( $service_term->name ); ?></h3> 
    </div>

    <div class="col-lg-6 secondary">
      <!-- Get Children of Taxonomy -->
      <?php
        $parent_term = $service_term->term_id;
        $parent_term_tax = $service_term->taxonomy;
      ?>
      <?php
      $child_terms = get_terms( array(
        'taxonomy' => $parent_term_tax, 
        'child_of' => $parent_term,
        'parent' => $parent_term, 
        'hide_empty' => false,
      ) );
      ?>  

      <?php 
      if ($child_terms) {
        echo '<ul class="second-level-terms">';

        foreach ($child_terms as $child_term) {
          $second_term_name = $child_term->name;
          echo '<li class="second-level-term">'. '<a href="'.get_permalink().'">' .$second_term_name. '</a>'.'</li>';
        }
        echo '</ul>';
      }
      ?>
    </div>
  </div> 
<?php } ?>

// For Each loop term and check what category

<?php $terms = get_the_terms( $post->ID , 'people_category' ); ?>
<?php if($terms) : ?>
  <?php
  foreach ( $terms as $term ) {
    if($term->name == 'Ambassadors') {
      echo '<div class="category">' . $term->name . '</div>';
    }

    else {
      echo '<div class="category pl1">' .  $term->name .  '</div>';
    }
  }
  ?>
<?php endif; ?>
      
      

    