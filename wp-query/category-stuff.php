// List Categories

<?php 

$categories =  get_categories();
echo '<ul>';
foreach  ($categories as $category) {
echo '<li><a href="' . get_category_link( $category->term_id ) . '">' .  $category->name . '</a></li>';

}
echo '</ul>';

?>