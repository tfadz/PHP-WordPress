<?php 

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 9,
        'post_status'    => 'publish',
        'paged'          => $paged,
        'tag'            => 'bicentenary-2019, bicentenary-2017' 
    );



 ?> 

 <div class="pagination">
        <?php
            $big = 999999999; // need an unlikely integer

            echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?page=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $query->max_num_pages
            ) );
        ?>
    </div>