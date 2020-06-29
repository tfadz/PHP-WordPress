<!-- Example of when you want to have the user select a bunch of pages and then have them show up with the title of the page -->
<?php $urls =  get_sub_field( 'child_links', false, false); ?>
<?php foreach ( $urls as $urls_item ) { ?>
  <li><a href="<?php echo get_the_permalink($urls_item); ?>" title="<?php echo get_the_title($urls_item); ?>" class="button"><?php echo get_the_title($urls_item); ?></a></li>
<?php } ?>

<!-- When using Page link and you need to have option for open in new tab -->

<?php
$link = get_field('link');

?>
<a class="button" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>