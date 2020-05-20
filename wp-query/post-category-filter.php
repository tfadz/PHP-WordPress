 <!-- This was done by creating a post in CPT UI and then creating a specifica taxonomy in CPT UI -->
<section class="main-content khaki">
  <div class="container container-narrow pt2">
    <div class="row">

      <!-- Filter --> 
      <?php 
        // Get the taxonomy's terms
      $terms = get_terms(
        array(
          'taxonomy'   => 'resource_category',
          'hide_empty' => false,
        )
      );

        // Check if any term exists
      if ( ! empty( $terms ) && is_array( $terms ) ) { ?>
        <div class="col-12 filter-container text-right">
          <ul class="filter-list">
            <li>Filter by topic <i class="fas fa-angle-down"></i>
              <ul>
                <?php

                  // Run a loop and print them all
                foreach ( $terms as $term ) { ?>
                  <li><a href="<?php echo esc_url( get_term_link( $term ) ) ?>">
                    <?php echo $term->name; ?>
                  </a></li>
                  <?php
                }
                ?>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <?php 
    } 
    ?>

    <?php 

            // the query
            $args = array(
                'post_type' => 'resources_type',
                'posts_per_page' => -1,
            );

            $query = new WP_Query( $args ); ?>
            
            <?php if ( $query->have_posts() ) : ?>
            <div class="row">   

              <!-- the loop -->
              <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <a class="the-post col-lg-6" href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>">
                  <div class="featured-img"  style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>);"></div>
                  <div class="meta">
                    <h3 class="prod-desc"><?php the_title(); ?></h3>
                    <div class="d-flex justify-content-lg-end"><button class="button-arrow">Learn More</button></div>
                  </div>
                </a>

              <?php endwhile; ?>

              <?php wp_reset_postdata(); ?>

              <?php else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
              <?php endif; ?>


