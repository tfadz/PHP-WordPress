<?php

//Query post types and ACF

// $lists = get_field('lists');
$recent_projects = get_posts([
    'post_type' => 'projects',
    'posts_per_page' => 5,
]);

$case_studies = get_posts([
    'post_type' => 'case_studies',
    'posts_per_page' => 5,
]);

$all_projects = get_posts([
    'post_type' => 'projects',
    'posts_per_page' => -1,
]);

?>

<?php
foreach ($all_projects as $project) {
    if (!empty(get_field('primary_data', $project->ID)['location'])) {
        ?>
        {
            lat: <?= get_field('primary_data', $project->ID)['location']['lat'] ?>,
            lng: <?= get_field('primary_data', $project->ID)['location']['lng'] ?>,
            status: "<?= get_field('status', $project->ID) ?>",
            slug: "<?= get_permalink($project->ID) ?>",
            description: "<?= get_field('primary_data', $project->ID)['description'] ?>".slice(0,80) || "<?= get_field('scale', $project->ID) ?>",
            title: "<?= $project->post_title ?>"
        },
        <?php
    }
} ?>
