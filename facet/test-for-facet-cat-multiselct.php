<?php while (have_posts()) { the_post(); ?>
		
	<div class="col-md-6 col-lg-4 col-xl-3 post-col">
        <a class="post" href="<?php echo get_the_permalink(); ?>">
    		<?php $fimg = get_the_post_thumbnail_url(); ?>
    		<div class="post-image"><img src="<?php echo esc_url($fimg) ?>" alt="" /></div>
    		<div class="post-content">
                <div class="post-content-meta">
                    <!-- <h6 class="date"><?php //echo get_the_date('', $post->ID);?></h6> -->
                    <div class="post-categories">
                        <?php 
                        $resource_types = get_the_terms($post->ID, 'resource-type');
						$resource_cats = get_the_terms($post->ID, 'resources_categories');
						if($resource_cats) :
                        foreach ( $resource_cats as $term ) {
                            if( $term->count > 0 ) {
                                echo '<h6 class="category">' . $term->name . '</h6>';
                            }
                        }
                        endif;
						
						if($resource_types) :
                        foreach ( $resource_types as $term2 ) {
                            if( $term2->count > 0 ) {
                                echo '<h6 class="category">' . $term2->name . '</h6>';
                            }
                        }
                        endif;
                        ?>
					</div>
                </div>
    			<h5><?php the_title(); ?></h5>
			</div>
    	</a>
    </div>
<?php } ?>

<?php 
$resourceCats = get_field('exclude_taxonomy'); 
$customTax = $resourceCats[0]->name; 
echo $customTax;
?>

<script>
jQuery(function($) {
	window.setTimeout(function() { 
		var $label = $('.facetwp-facet-resources.facetwp-type-fselect .fs-option .fs-option-label').text();
		alert($label);
		if($label == '<?php $customTax ?>') {
			$(this).parent().addClass('terry');
		}

	}, 150);

	



});
</script>
