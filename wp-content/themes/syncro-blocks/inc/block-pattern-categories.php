<?php
if ( function_exists( 'register_block_pattern_category' ) ) {
    function syncro_blocks_register_block_pattern_categories(){
        register_block_pattern_category(
            'sycnro_blocks_t9',
            array(
                    'label' => __( 'Template 9', 'syncro-blocks' ),
                    'description' => __( 'Patterns used in various Template 9 layouts', 'syncro-blocks' ),
            )
        );
        register_block_pattern_category(
            'sycnro_blocks_slides',
            array(
                    'label' => __( 'Slides', 'syncro-blocks' ),
                    'description' => __( 'Slide designs for the Syncro Slider block', 'syncro-blocks' ),
            )
        );
        register_block_pattern_category(
            'sycnro_blocks_heros',
            array(
                    'label' => __( 'Heros', 'syncro-blocks' ),
                    'description' => __( 'Start of pages', 'syncro-blocks' ),
            )
        );
        register_block_pattern_category(
            'sycnro_blocks_syncro',
            array(
                    'label' => __( 'Syncro', 'syncro-blocks' ),
                    'description' => __( 'Syncro Patterns', 'syncro-blocks' ),
            )
        );
        register_block_pattern_category(
            'sycnro_blocks_primary',
            array(
                    'label' => __( 'Primary', 'syncro-blocks' ),
                    'description' => __( 'Like the Platform page', 'syncro-blocks' ),
            )
        );
        register_block_pattern_category(
            'sycnro_blocks_secondary',
            array(
                    'label' => __( 'Secondary', 'syncro-blocks' ),
                    'description' => __( 'Like the RMM page', 'syncro-blocks' ),
            )
        );
        register_block_pattern_category(
            'sycnro_blocks_tertiary',
            array(
                    'label' => __( 'Tertiary', 'syncro-blocks' ),
                    'description' => __( 'Like the Ticketing page', 'syncro-blocks' ),
            )
        );
        register_block_pattern_category(
            'sycnro_blocks_sections',
            array(
                    'label' => __( 'Sections', 'syncro-blocks' ),
                    'description' => __( 'Empty sections to start new content', 'syncro-blocks' ),
            )
        );
    }
   add_action( 'init', 'syncro_blocks_register_block_pattern_categories' );
}