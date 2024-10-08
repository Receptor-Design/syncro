<?php
function syncro_blocks_register_acf_blocks() {
    register_block_type( get_stylesheet_directory() . '/acf-blocks/related-posts/' );
    register_block_type( get_stylesheet_directory() . '/acf-blocks/author-headshot/' );
    register_block_type( get_stylesheet_directory() . '/acf-blocks/resource-type-eyebrow/' );
    register_block_type( get_stylesheet_directory() . '/acf-blocks/resource-time/' );
    //register_block_type( get_stylesheet_directory() . '/acf-blocks/taxonomy-name/' );
    register_block_type( get_stylesheet_directory() . '/acf-blocks/term-featured-image/' );
    //register_block_type( get_stylesheet_directory() . '/acf-blocks/integration-icon/' );
    //register_block_type( get_stylesheet_directory() . '/acf-blocks/integration-title/' );
    //register_block_type( get_stylesheet_directory() . '/acf-blocks/integration-description/' );
    register_block_type( get_stylesheet_directory() . '/acf-blocks/integration-card/' );
    register_block_type( get_stylesheet_directory() . '/acf-blocks/selected-resources-grid/' );

}


add_action( 'init', 'syncro_blocks_register_acf_blocks' );