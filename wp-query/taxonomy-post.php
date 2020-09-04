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