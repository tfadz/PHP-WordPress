<?php 
  $author = get_field('blog_author');
  if( $author ): ?>
    <div class="author">
      <?php foreach( $author as $a ): ?>
        <h6 class="font-weight-bold">AUTHOR</h6>
        <h4 class="special"><?php echo get_the_title( $a->ID ); ?></h4>
        <p><a href="<?php echo get_the_permalink( $a->ID ); ?>"><?php echo get_the_excerpt( $a->ID ); ?></a></p>
        
        <?php 
        $linkedin = get_field("p_linkedin", $a->ID); 
        $twitter = get_field("p_twitter", $a->ID);
        $instagram = get_field("p_instagram", $a->ID);
        $website = get_field("p_website", $a->ID);
        ?>
        
        <?php if ($linkedin || $twitter || $instagram || $website) : ?>
          <div class="connect">
            <div class="social">
              <div class="icons">
                <?php
                if( !empty($twitter) ) {
                  $twitter = str_replace('@', '', $twitter);
                  $twitter = str_replace('https://', '', $twitter);
                  $twitter = str_replace('twitter.com', '', $twitter);
                  $twitter = str_replace('/', '', $twitter);
                  $twitterlink =  $twitter;
                }
                if( !empty($instagram) ) {
                  $instagram = str_replace('@', '', $instagram);
                  $instagram = str_replace('https://', '', $instagram);
                  $instagram = str_replace('instagram.com', '', $instagram);
                  $instagram = str_replace('/', '', $instagram);
                  $instagramlink =  $instagram;
                }
                ?>
                <?php if($linkedin) : ?><a href="<?php echo $linkedin ?>"><i class="fa fa-linkedin"></i></a><?php endif; ?>
                <?php if($twitter) : ?><a href="<?php echo 'https://twitter.com/' . $twitter  ?>"><i class="fa fa-twitter"></i></a><?php endif; ?>
                <?php if($instagram) : ?><a href="<?php echo 'https://instagram.com/' . $instagram ?>"><i class="fa fa-instagram"></i></a><?php endif; ?>
                <?php if($website) : ?><a href="<?php echo $website ?>"><i class="fa fa-link" aria-hidden="true"></i></a><?php endif; ?>

              </div>
            </div>
          <?php endif; ?>
        </div>

      <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php if(has_tag()) { ?>
<div class="tag-list">
<?php the_tags( '<h5>KEYWORDS</h5>', ', ', '<br />' ); ?>
</div>
<?php } ?>

<div class="share">
  <h5>SHARE</h5>
  <div> <?php echo do_shortcode('[Sassy_Social_Share]'); ?></div>
</div>