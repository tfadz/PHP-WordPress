<?php 
$posts = get_field('pa_news_feed');
if( $posts ): ?>
  <?php foreach( $posts as $p ): ?>
    <!-- Category Label -->
    <?php
    $cats = get_the_category($p->ID);
    $cat_name = $cats[0]->name;
    $cat_slug = $cats[0]->slug;
    $cat_url = '/category/'.$cat_slug;
    ?>
    <div class="category">
      <a class="cat-label <?php echo $cat_slug; ?>" href="<?php echo $cat_url; ?>"><?php echo $cat_name; ?></a>
    </div>
    
    <?php $featured_img_url = get_the_post_thumbnail_url($p->ID,'medium_large'); ?>
    <div class="featured-img" style="background-image: url(<?php echo $featured_img_url ?>);"></div>
    <h3><?php echo get_the_title( $p->ID ); ?></h3>
    <!-- get the tags -->
    <?php if(get_the_tags($p->ID )): $tags = get_the_tags($p->ID); ?>
      <ul class="story-tags">
        <?php foreach($tags as $tag){ ?>
          <li><?php echo $tag->name; ?></li>
        <?php } ?>
      <?php endif; ?>
    </ul>

  <?php endforeach; ?>
  <?php endif; ?>


  <!-- The above example involves ACF relationship posts and that uses a category function thats ONLY for WP Core Categories -->
  <!-- If setting up a CTP and using a custom taxonomy(category) you will want to use this instead -->
  <?php 
  $posts = get_field('res_feed');
  if( $posts ): ?>
    <?php foreach( $posts as $p ): ?>
      <!-- Category Label -->
    
      <a class="item" href="<?php the_permalink($p->ID); ?>">
      <?php $featured_img_url = get_the_post_thumbnail_url($p->ID,'medium_large'); ?>
      <div class="featured-img" style="background-image: url(<?php echo $featured_img_url ?>);">
            <?php $terms = get_the_terms( $p->ID, 'resource_category' ); 
            foreach($terms as $term) {
            $term_link = get_term_link( $term );
            echo '<h6 class="category">' . $term->name . '</h6>';
            } ?>
      </div>
      <h4><?php echo get_the_title( $p->ID ); ?></h4>
    </a>

    <?php endforeach; ?>
    <?php endif; ?>

    <!-- this is how to reference a acf field from a relationship field, such as if you created acf fields for a custom post type and then use that for a relationship acf field -->
     <? global $post;
            $posts = get_field('leadership_blocks');
            if( $posts ): ?>
              <?php foreach( $posts as $post ): ?>
                <?php setup_postdata($post); ?>

                <a href="<?php the_permalink( $post->ID ); ?>" class="member">
                  <?php $featured_img_url = get_the_post_thumbnail_url($post->ID,'medium_large'); ?>
                  <div class="member-img" style="background-image: url(<?php echo $featured_img_url ?>);"></div>
                  <div class="text">
                    <h5><?php echo get_the_title( $post->ID ); ?></h5>
                    <?php 
                        the_field('bio_title', $post->ID); // <-- this is the acf field from the cpt -->
                      ?>
                      
                  </div>
                </a>

              <?php endforeach; ?>
              <?php wp_reset_postdata(); ?>
            <?php endif; ?>


  // Pull tags and seperate by commas. This is for custom post types.

  <?php
  // Pull tags
  $terms = get_the_terms( $post->ID, 'chronic_illness' ); 
  if( $terms ):
      $total = count($terms);
      $count = 1;
      foreach( $terms as $term ):
        ?>
          <a href="<?php 
            echo get_term_link( $term ); ?>"><?php 
            echo $term->name; ?></a>
        <?php 
        if ($count < $total) {
          echo ', ';
        }
        $count++;
      endforeach;
    endif; 
   ?>
   
   // Pulling Posts thats connected to a relationship
   <?php
   $args = array(
     'numberposts'	=> 3,
     'post_type'		=> 'post',
     'meta_query' => array(
       array(
         'key' => 'blog_author',  // <-- acf field
         'value' => '"' . get_the_ID() . '"', 
         'compare' => 'LIKE'
       )
     )
   );
    
    $the_query = new WP_Query( $args );
    ?>
      <?php if( $the_query->have_posts() ): ?>
        <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <h2><?php the_title(); ?></h2>
        <?php endwhile; ?>
      <?php endif; ?>

      <?php wp_reset_query(); ?>
