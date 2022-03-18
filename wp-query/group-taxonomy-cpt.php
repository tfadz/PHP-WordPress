<?php
$taxonomy = array( "name" => 'jobs_exp' , "slug" => 'jobs_exp');
$custom_post_type = "job";

if ( have_posts() )
the_post();
?>

<?php
// Query your specified taxonomy to get, in order, each category
$categories = get_terms($taxonomy['name'], 'orderby=title');
foreach( $categories as $category ) {
?>

<div id="content">
<h2 class="page-title">
<?php echo $category->name; ?>
</h2>

<?php
    global $post; // Access the global $post object.

    // Setup query to return each custom post within this taxonomy category
    $o_queried_posts = get_posts(array(
        'nopaging' => true,
        'post_type' => $custom_post_type,
        'taxonomy' => $category->taxonomy,
        'term' => $category->slug,
    ));
?>

<div id='archive-content'>

<?php
// Loop through each custom post type
foreach($o_queried_posts as $post) :
    setup_postdata($post); // setup post data to use the Post template tags. ?>

    <div id="post-<?php the_ID(); ?>">

       <h2 class="entry-title"><?php the_title(); ?></h2>


    </div><!-- #post -->
<?php endforeach; wp_reset_postdata(); ?>

</div> <!-- archive-content -->


</div> <!-- archive-content -->
</div> <!-- #content -->
<?php } // foreach( $categories as $category ) ?>