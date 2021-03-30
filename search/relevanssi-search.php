<?php 
// This uses the relevanssi search plugin

$latest_stories = new WP_Query($args);

if ($user_search_query) {
    relevanssi_do_query($latest_stories);
}

?>

<?php if ($user_search_query) : ?>

<span>Showing <?php count($latest_stories->posts) ?> results for "<?php $user_search_query ?>" </span>
<?php endif; ?>
