// This checks to see if a thumbnail exists and if it's not found then a custom image appears. If it's found will be placed as a background image
<div class="col-lg-4 col-xs-6 ">
  <a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>" class="featured-image bg-cover" 
    style="
    <?php $has = has_post_thumbnail();  ?>
    <?php if ($has) : ?>
    background-image:url(<?php echo get_the_post_thumbnail_url(); ?>);
    <?php else : ?>
    background-image:url(<?php bloginfo('template_directory'); ?>/assets/images/preview-full-peter-troost-monument-placeholder.jpg);
    <?php endif; ?>"
    >
    <div class="meta">
      <h3 class="prod-desc"><?php the_title(); ?></h3>
      <button>View Details</button>
    </div>
  </a>
</div>
