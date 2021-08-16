// Adding more options to MCE Editor in Wordpress (for example adding another style to the headings drop down)

<?php 
	
function my_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}

add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );



	function my_tiny_mce_before_init( $mceInit ) {
	    $style_formats = array(
	        array(
	            'title' => 'Text Options',
	            'items' => array(

	                array(
	                    'title' => 'H2-Header',
	                    'block' => 'span',
	                    'classes' => 'h2-header',
	                    'wrapper' => true,
	                ),

	                array(
	                    'title' => 'Paragraph - Big',
	                    'block' => 'span',
	                    'classes' => 'paragraph-big',
	                    'wrapper' => true,

	                ),

	                array(
	                    'title' => 'Unordered list - Big',
	                    'block' => 'span',
	                    'classes' => 'list-big',
	                    'wrapper' => true,
	                )

	            )
	        )   
	    );

	    $mceInit['style_formats'] = json_encode( $style_formats );
	    
	    return $mceInit;    
	}
	add_filter( 'tiny_mce_before_init', 'my_tiny_mce_before_init' );



 ?>
