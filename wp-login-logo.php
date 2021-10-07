<?php 
function my_login_logo() { ?>
<?php 
  $logo = get_theme_mod( 'custom_logo' );
  $image = wp_get_attachment_image_src( $logo , 'full' );
  $image_url = $image[0];
 ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
          background-image: url(<?php echo $image_url ?>);
          height: 200px;
          max-width: 100%;
          width: auto;
          background-size: contain;
          background-position: center;
          background-repeat: no-repeat;
          padding-bottom: 1rem;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );