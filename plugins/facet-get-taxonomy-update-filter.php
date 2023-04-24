<?php
/* Get ACF field taxonomy value and then capture name of the category */
$resourceGalleryTax = get_field('resources_gallery_tax'); 
$customTaxName = $resourceGalleryTax->name; 
?>
<?php if($resourceGalleryTax) : ?>
<script>
jQuery(function($) {
/* 
	1. First check to see if page is already filtered (anything inside of the indexOf quotes).
	2. Set timeout to wait for wp facet to load.
	3. Trigger event so category checkbox filter (hidden) is clicked. 
*/
	if(!window.location.href.indexOf("?") > -1) {
		window.setTimeout(function() { 
			$('.facetwp-type-checkboxes .facetwp-checkbox .facetwp-display-value').each(function() {
				var $captureCheckboxText = $(this).text();
				if($captureCheckboxText == '<?php echo $customTaxName ?>') {
					$(this).parent().trigger("click");
				}
			});
		}, 100);
	}
});
</script>
<?php endif; ?>
