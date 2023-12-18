<!-- add this to your custom WordPress nav walker -->

<?php 
ob_start();
include get_template_directory() . '/template-parts/custom-menu-code.php';
$acfValues = ob_get_clean();

$mm = get_field('mega_menu', $item->object_id);
if( $mm ) {
    $item_output .= $acfValues;
}


 ?>
<!-- ######## Filters -- >

<?php 

// Filters to Add for Icons and description.

function jllt_add_icon_class_to_menu_item( $atts, $item, $args, $depth ) {
    $menu_icon = get_field( 'menu_icons', $item->ID );
   
    if ( $depth === 0 && $menu_icon && empty( $atts['title'] ) ) {
       
        if ( ! isset( $atts['class'] ) ) {
            $atts['class'] = '';
        }
 
        $atts['class'] .= 'dropdown-item dd-icon ' . $menu_icon;
    }
 
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'jllt_add_icon_class_to_menu_item', 10, 4 );
 
function jllt_add_icon_to_menu_item( $title, $item, $args, $depth ) {
    $menu_icon = get_field( 'menu_icons', $item->ID );
    if ( $depth === 0 && $menu_icon && empty( $atts['title'] ) ) {
        $title = '<span id="menu-text">' . $title . '</span>';
    }
    return $title;
}
 
add_filter( 'nav_menu_item_title',  'jllt_add_icon_to_menu_item', 15, 4 );
 
function jllt_modify_menu_item( $item_output, $item, $depth, $args ) {
    if ( is_object( $item ) && isset( $item->ID ) ) {
        $menu_item_desc = $item->description;
        //$menu_icons = get_field( 'menu_icons', $item->ID );
 
        if ( ! empty( $menu_item_desc ) ) {
            $menu_item_desc_html = sprintf(
                ' <span class="description">%s</span>',
                esc_html( $menu_item_desc )
            );
            
 
            // Remove any trailing spaces and move the description inside the <a> tag
            $item_output = rtrim( $item_output, '</span> ' ) . $menu_item_desc_html . '</span></a>';
        }
    }
    return $item_output;
}
 
add_filter( 'walker_nav_menu_start_el', 'jllt_modify_menu_item', 20, 4 );





 ?>
