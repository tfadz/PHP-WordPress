// List Categories

<?php 

$categories =  get_categories();
echo '<ul>';
foreach  ($categories as $category) {
echo '<li><a href="' . get_category_link( $category->term_id ) . '">' .  $category->name . '</a></li>';

}
echo '</ul>';

?>

// If there's more than 1 category add a comma if not don't 

<?php $gfocuses = get_the_terms( $post->ID , 'grant_focus_area' ); ?>
<?php if($gfocuses) : ?>
  
  <?php 
  // Check to see if there's more than 1 category, if so add comma.
  $count = count(get_the_terms( $post->ID , 'grant_focus_area' ));
  $i = 1;

  foreach ( $gfocuses as $gfocus ) {
      if ($i < $count) {
        echo '<h4>' . $gfocus->name . '</h4>' . ', ';
      }
      else {
        echo '<h4>' . $gfocus->name . '</h4>';
      }
    $i++;
  }
  ?>  
  
  
 <!-- Query by term name -->
 
 <?php
 $query = get_posts(
     array(
         'numberposts' => 2,
         'post_type' => 'stories_cpt',
         
         'tax_query' => array(
             array(
                 'taxonomy' => 'stories_type', // <-- this is the custom taxonomy
                 'field' => 'slug',
                 'terms' => 'quotes', // <-- this is the term slug
             )
         ),
         
     );
     
    ?>


 <!-- Check if post has category -->

<?php if (has_category('news')) : ?>hello <?php endif; ?>


// Query only posts with certain category. Use 'cat';

<?php
$args = array(
'post_type' => 'post',
'posts_per_page' => '-1',
'orderby' => 'date',
'cat' => 21, <-- //look up what the category id number is in the Categories list.
);

// examples of category queries
cat (int) - use category id.
category_name (string) - use category slug.
category__and (array) - use category id.
category__in (array) - use category id.
category__not_in (array) - use category id.

i.e. 'category_name' => 'spotlight',