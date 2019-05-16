// If else to show a ACF field on a link (This one links to a modal)

<a <?php if($tvideo) : ?>href="<?php echo $tvideo; ?>" data-lity<?php else: ?> href="" <?php endif; ?> >Some text</a>


<div class="article-featured">
  <?php 
  $af_img = get_field('a_featured_image');
  $af_video = get_field('a_featured_video');
  ?>
  <?php if($af_img) : ?>
    <img src="<?php echo $af_img; ?>" />
    <?php elseif($af_video) : ?>
      <div class="article-featured__video">

        <iframe width="100%" height="500px" src="<?php echo $af_video ?>?api=1" frameborder="0"  webkitallowfullscreen="false" mozallowfullscreen="false" allowfullscreen="false"></iframe>
      </div>
    <?php endif; ?>
  </div>