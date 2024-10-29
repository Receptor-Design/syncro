<?php
if ( function_exists( 'register_block_pattern_category' ) ) {
    function syncro_blocks_register_block_pattern_categories(){
        register_block_pattern_category(
        'sycnro_blocks_t9',
        array(
                'label' => __( 'Template 9', 'syncro-blocks' ),
                'description' => __( 'Patterns used in various Template 9 layouts', 'syncro-block' ),
        )
    );
    }
   add_action( 'init', 'syncro_blocks_register_block_pattern_categories' );
}