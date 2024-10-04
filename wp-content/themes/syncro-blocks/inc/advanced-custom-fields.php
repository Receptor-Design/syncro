<?php
function syncro_blocks_register_acf_blocks() {
    register_block_type( get_stylesheet_directory() . '/acf-blocks/related-posts/' );
    register_block_type( get_stylesheet_directory() . '/acf-blocks/author-headshot/' );
    register_block_type( get_stylesheet_directory() . '/acf-blocks/resource-type-eyebrow/' );
    register_block_type( get_stylesheet_directory() . '/acf-blocks/resource-time/' );
}


add_action( 'init', 'syncro_blocks_register_acf_blocks' );