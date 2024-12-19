<?php while (have_posts()) { the_post(); ?>
  <div class="post" id="post-<?php the_ID(); ?>">
  <div class="post-main">
    <h3><?php
	    $terms = get_the_terms( $post->ID , 'portfolio_funds' );
        if ($terms) :
	    foreach ( $terms as $term ) {
	    echo $term->name ;
	    }
    endif;
	    ?></h3>
    <h4><?php echo get_the_title(); ?></h4>
    <p><?php 
    $statuses = get_the_terms( $post->ID , 'portfolio_status' );
    if ($statuses) :
        echo '<strong>Status:</strong> &nbsp;';
        foreach ( $statuses as $status ) {
            echo $status->name ;
        }
    endif;
    ?>
</p>
  </div>
</div>
<?php } ?>