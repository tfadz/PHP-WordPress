<?php
$content = get_the_content();
echo wp_trim_words( $content , '20' );
 ?>
 
<!--  Another way with acf -->
<?php $pdesc = get_field('portfolio_description') ?>
<p><?php $pdesc = mb_strimwidth($pdesc, 0, 102, "..."); echo $pdesc; ?></p>