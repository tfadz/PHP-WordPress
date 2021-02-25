<?php do_shortcode(get_field('your-custom-field')); ?>

<?php 
	$res_fimage = get_field('res_link_url');
	echo do_shortcode('[beautiful_link_preview  url="' . $res_fimage . '"]') 
?>
