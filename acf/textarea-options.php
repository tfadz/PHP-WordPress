<?php 
  $text = get_field('text');
  $pattern = '/(.*)\*(.*)\*(.*)/';
  $replacement = '$1<i>$2</i>$3';
  echo preg_replace($pattern, $replacement, $text);
 ?>

// Add asterisk to make text italic
this is normal *this is italic* this is normal
