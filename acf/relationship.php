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