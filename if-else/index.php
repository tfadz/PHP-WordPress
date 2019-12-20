Example 1

<?php if (! is_page_template('page-partner.php') ) { ?>
  <img src="<?php bloginfo('template_directory'); ?>/assets/images/destination.svg" />

<?php } else { ?>
  <img src="<?php bloginfo('template_directory'); ?>/assets/images/address-dark.svg" />

<?php } ?>

Example 2

<?php if($eyebrow_txt) : ?>
<span><?php echo $hero1['eyebrow'] ?></span>
<?php elseif($eyebrow_img) : ?>
<img width="460" class="w-50 w-md-35 mx-auto" src="<?php echo $eyebrow_img ?>" alt="">
<?php endif; ?>

Example 3

 <a href="<?php if($hs_link) : ?><?php echo $hs_link;  ?><?php else : ?><?php the_permalink(); ?><?php endif ?>">