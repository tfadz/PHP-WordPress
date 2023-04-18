<?php 
	$resourceCats = get_field('exclude_taxonomy'); 
	$customTax = $resourceCats->name; 
?>

<script>
jQuery(function($) {
	window.setTimeout(function() { 
		
		$('.facetwp-type-checkboxes .facetwp-checkbox .facetwp-display-value').each(function() {
			var $terry = $(this).text();
				if($terry == '<?php echo $customTax ?>') {
					$(this).parent().trigger("click");
				}
		});


	}, 150);
});
</script>
