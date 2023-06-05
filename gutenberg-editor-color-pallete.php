function website_colors_setup() {
  
	// Editor Color Palette
	add_theme_support( 'editor-color-palette', array(
    	array(
			'name'  => __( 'Black', 'website' ),
			'slug'  => 'black',
			'color' => '#131e29',
		),
	
		array(
			'name'	=> __( 'Red', 'website' ),
			'slug'	=> 'red',
			'color'	=> '#E30613',
		),
        array(
			'name'  => __( 'Gray', 'website' ),
			'slug'  => 'gray',
			'color'	=> '#3A3E43',
		),
        array(
			'name'  => __( 'Medium Gray', 'website' ),
			'slug'  => 'medium-gray',
			'color'	=> '#60666E',
		),
		array(
			'name'  => __( 'Light Gray', 'website' ),
			'slug'  => 'light-gray',
			'color'	=> '#DDDFE1',
		),
        
        array(
			'name'  => __( 'Lightest Gray', 'website' ),
			'slug'  => 'lightest-gray',
			'color'	=> '#F6F7F7',
		),
        
    
	) );
}
add_action( 'after_setup_theme', 'website_colors_setup' );



// SASS


.has-light-gray-background-color {
  background: $gray-light;
}

.has-medium-gray-background-color {
  background: $gray-medium;
}

.has-light-gray-background-color {
  background: $gray-light;
}

.has-lightest-gray-background-color {
  background: $gray-lightest;
}

.has-medium-red-background-color {
  background: $red;
}
