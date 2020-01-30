// For using the ACF gravity for plugin
<?php 
  $form = get_sub_field('form');
  gravity_form($form['id'], true, true, false, '', true, 1);   
?>