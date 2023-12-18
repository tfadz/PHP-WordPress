// Add this to functions

<?php
register_nav_menus( array(
    'primary' => 'Main Nav',
    'booktour' => 'Book a Tour',
    'footnav1' => 'Footer Nav1',
    'footnav2' => 'Footer Nav2',
    'footnav3' => 'Footer Nav3',
    'copyrightmenu' => 'Copyright Nav'
) );
?>


<!--  Add this to header.php -->

<?php
  wp_nav_menu( array(
  'theme_location'  => 'booktour',
  'container'=> false,
  'menu_class'=> false,
  'items_wrap' => '%3$s'
  ) );
?>
