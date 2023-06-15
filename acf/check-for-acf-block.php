<?php
// ACF Gutenberg Blocks

function acf_blocks_init()
{

    acf_register_block_type(array(
        'name'              => 'home_hero',
        'title'             => __('Homepage Hero'),
        'render_template'   => '/template-parts/blocks/home-hero.php',
        'category'          => 'jll-blocks',
        'mode'              => 'edit',
        'icon' => file_get_contents( get_template_directory() . '/assets/images/logo.svg' ),
    ));
    



}
// Check if function exists and hook into setup.
if (function_exists('acf_register_block_type')) {
    add_action('acf/init', 'acf_blocks_init');
}

function jll_category( $categories, $post ) 
{
   return array_merge
   (
      $categories, array
      (
         array
         (
            'slug' => 'jll-blocks',
            'title' => __('JLL Blocks', 'jll'),
         ),
      )
   );
}
add_filter( 'block_categories_all', 'jll_category', 10, 2);
