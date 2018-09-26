    <section class="blog-grid">
     <?php
    
    // The Arguments
    
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => '-1',
      'orderby' => 'date',
      'order' => 'ASC'
    );
    

    // The Query
    
    $query_posts = new WP_Query($args);
    
    // The Loop
    
    if( $query_posts->have_posts() ) : ?>
      
      <?php while ( $query_posts->have_posts() ) : $query_posts->the_post(); ?>

      <article class="blog-grid__item" data-aos="fade-left">
        <a class="thumbnail" href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail( 'full' ); ?>
        </a>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div style="font-size: .9rem;"><?php the_date( '', '', '', true ); ?></div>
        <div style="font-size: .9rem;color: #999;padding-top:.5rem;">By <?php the_author(); ?></div>
        <br />
        <a class="read-more" href="<?php the_permalink(); ?>">Read More..</a>

      </article>
      <?php endwhile; ?> 
      <?php endif; ?>

    </section>