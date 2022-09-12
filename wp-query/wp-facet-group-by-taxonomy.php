<?php

$mode='resource';

switch ($mode) {
    case 'resources_by_regions': // <-- name it (arbitrary) 
    $taxonomy='resources_region'; // <-- custom taxonomy 
    $taxonomy_var='_resources_region';
    break;
    case 'resource': // <-- name it (arbitrary) 
    $taxonomy='resources_type'; // <-- custom taxonomy 
    $taxonomy_var='_resources_type';
    break;
}

$ids = array();
while (have_posts()) {
    the_post();
    $ids[] = get_the_ID();
}

if (!empty($ids)) {
   
    if (!empty($_GET[$taxonomy_var])) {
        $terms = get_terms($taxonomy, array('slug'=>$_GET[$taxonomy_var]));
    }
   
    else {
        $terms = get_terms($taxonomy, array('parent' => 0));
    }
   
    foreach($terms as $term) {
        $args = array(
            'post_type' => 'resource',
            'include'   => $ids,
            'orderby'   => 'title',
            'order'     => 'ASC',
            'tax_query' => array(
                array(
                    'taxonomy' => $taxonomy,
                    'field' => 'slug',
                    'terms' => $term->slug,
                ),
            )
        );
       
        $resources = get_posts($args);
       
        if(count($resources)) {
            echo "<div class='resource-category'" . "id='{$term->slug}'>";
            echo "<h3 class='{$term->slug} xl' >".$term->name."</h3>";
            foreach ($resources as $resource) : ?>
            <?php $resource_link = get_field('resource_link', $resource->ID) ?>
            <a class="resource-link" href="<?php if($resource_link) : ?><?php echo $resource_link ?><?php endif; ?>" target="_blank">
                <h6><?php echo get_the_title($resource->ID); ?></h6>
            </a>
           
            <?php
        endforeach;
        echo '</div>';
    }
}
?>

<?php } else { ?>

<?php } ?>