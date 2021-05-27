// To get the category name for each post (using a CPT)

<?php
$terms = get_the_terms( $post->ID , 'resource_category' );
foreach ( $terms as $term ) {
	echo '<h6 class="category">' . $term->name . '</h6>';
}
?>

// Get Category name and link to category page

<?php
	$terms = get_the_terms( $post->ID , 'install_locations' );
	foreach ( $terms as $term ) {
		echo '<li><a href="'.get_term_link($term).'">' . $term->name . '</a></li>';
	}
?>	

// To check for certain values in the category
// The taxonomy is Virtual Tools, the two categories are Yes and No. This is from Mccormick website.
// If Yes the name is converted to Virtual. If no nothing shows.
<?php
foreach ( $terms1 as $term ) {
	if ( $term->name == 'No') :
		echo '';
	elseif ($term->name == 'Yes') :
		echo '<h6 class="category">' . 'Virtual' . '</h6>';
	endif;
}
?>