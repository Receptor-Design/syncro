<?php
/*
 * Miscellaneous functions related to the WP Editor
 * 
 */

function syncro_blocks_pattern_categories() {
    remove_theme_support('core-block-patterns');
    
    register_block_pattern_category(  'syncro', array(
        'label' => __( 'Syncro', 'syncro-blocks' )
    ) );
}

add_action( 'init', 'syncro_blocks_pattern_categories' ); 