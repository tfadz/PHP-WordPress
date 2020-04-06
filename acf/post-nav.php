  Custom Next and Prev post navigation (used on single post pages). This show how to include acf fields within.
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav class="nav-links">
       <?php
         $prev_post = get_previous_post();
         if (!empty( $prev_post )): ?>
          <a class="nav-prev" href="<?php echo get_permalink( $prev_post->ID ); ?>" title="<?php echo $prev_post->post_title; ?>"/>
            <div class="subhead">PREVIOUS PERSON</div>
            <h3><?php echo $prev_post->post_title; ?></h3>
            <h4><?php the_field( 'opa_t_title', $prev_post->ID );  ?></h4>
          </a>
         <?php endif; ?>
       <?php
         $next_post = get_next_post();
         if (!empty( $next_post )): ?>
          <?php $ptitle = get_field( 'opa_t_title', $ID );  ?>
          <a class="nav-next" href="<?php echo get_permalink( $next_post->ID ); ?>" title="<?php echo $next_post->post_title; ?>"/>
            <div class="subhead">PREVIOUS PERSON</div>
            <h3><?php echo $next_post->post_title; ?></h3>
            <h4><?php the_field( 'opa_t_title', $next_post->ID );  ?></h4>
          </a>
         <?php endif; ?>
         </nav>
      </div>
    </div>
  </div>