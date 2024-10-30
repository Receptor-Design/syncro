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
        register_block_pattern_category(
            'sycnro_blocks_slides',
            array(
                    'label' => __( 'Slides', 'syncro-blocks' ),
                    'description' => __( 'Slide designs for the Syncro Slider block', 'syncro-block' ),
            )
        );
    }
   add_action( 'init', 'syncro_blocks_register_block_pattern_categories' );
}