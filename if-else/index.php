// ----  Example 1 Check template 1

<?php if (! is_page_template('page-partner.php') ) { ?>
  <img src="<?php bloginfo('template_directory'); ?>/assets/images/destination.svg" />

<?php } else { ?>
  <img src="<?php bloginfo('template_directory'); ?>/assets/images/address-dark.svg" />

<?php } ?>

// ---- Example 2

<?php if($eyebrow_txt) : ?>
<span><?php echo $hero1['eyebrow'] ?></span>
<?php elseif($eyebrow_img) : ?>
<img width="460" class="w-50 w-md-35 mx-auto" src="<?php echo $eyebrow_img ?>" alt="">
<?php endif; ?>

// ---- Example 3

 <a href="<?php if($hs_link) : ?><?php echo $hs_link;  ?><?php else : ?><?php the_permalink(); ?><?php endif ?>">

Check template 2 ( quicker way)

<?php if ( is_page_template( 'eboost.php' ) ): ?>

<a href=""> Hello</a>

<?php else: ?>

  <h1>Something</h1>
        
<?php endif ?>


// ---- Example 4 

<!-- if pageid child -->
<?php global $post;  ?>
<?php   if ( $post->post_parent == 162): ?>