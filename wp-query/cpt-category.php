// To get the category name for each post (using a CPT)

<?php
$terms = get_the_terms( $post->ID , 'resource_category' );
foreach ( $terms as $term ) {
    echo '<h6 class="category">' . $term->name . '</h6>';
}

?> 