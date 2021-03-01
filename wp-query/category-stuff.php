// List Categories

<?php 

$categories =  get_categories();
echo '<ul>';
foreach  ($categories as $category) {
echo '<li><a href="' . get_category_link( $category->term_id ) . '">' .  $category->name . '</a></li>';

}
echo '</ul>';

?>

// Check if post has category

<?php if (has_category('news')) : ?>hello <?php endif; ?>


// Query only posts with certain category. Use 'cat';

<?php
$args = array(
'post_type' => 'post',
'posts_per_page' => '-1',
'orderby' => 'date',
'cat' => 21, <-- //look up what the category id number is in the Categories list.
);