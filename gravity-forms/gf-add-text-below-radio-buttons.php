<?php

add_filter( 'gform_field_choice_markup_pre_render_2', function( $choice_markup, $choice ) {

    $search  = '</label>';
    $replace = $search;

    switch( $choice['value'] ) {
        case 'Design Visualization':
					$eng1 = get_field('engagement_1');
	        $replace .= '<div class="desc">' . $eng1  . '</div>';
            break;
        case 'Design Specifications':
					$eng2 = get_field('engagement_2');
	        $replace .= '<div class="desc">' . $eng2  . '</div>';
            break;
        case 'Design Documentation':
					$eng3 = get_field('engagement_3');
	       	$replace .= '<div class="desc">' . $eng3  . '</div>';
            break;
    }

    $choice_markup = str_replace( $search, $replace, $choice_markup );

    return $choice_markup;
}, 10, 2 );



 ?>
