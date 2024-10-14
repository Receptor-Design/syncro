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
    register_block_type( get_stylesheet_directory() . '/acf-blocks/featured-resources/' );
    register_block_type( get_stylesheet_directory() . '/acf-blocks/syncro-meta-data/', [
        'icon' => '<svg viewBox="290.3969 230 40 40" width="40px" height="40px" xmlns="http://www.w3.org/2000/svg"><defs><clipPath id="clip0_1876_325728"><rect width="40" height="40" fill="white" transform="translate(0 0.5)"/></clipPath></defs><g clip-path="url(#clip0_1876_325728)" transform="matrix(1, 0, 0, 1, 290.3968811035156, 229.5)" id="object-0"><path fill-rule="evenodd" clip-rule="evenodd" d="M40 20.5C40 31.5457 31.0457 40.5 20 40.5C8.95431 40.5 0 31.5457 0 20.5C0 9.45431 8.95431 0.5 20 0.5C31.0457 0.5 40 9.45431 40 20.5ZM21.3236 18.7768C21.3666 18.7987 21.4096 18.8205 21.4525 18.8423H21.4599C24.6272 20.4855 27.8391 22.5226 27.8391 26.478C27.8391 30.4334 23.9952 33.3851 20.2257 33.3851C16.4562 33.3851 13.1774 31.2587 12.0547 27.7122H14.4785C15.445 29.9873 17.3855 31.2959 20.2257 31.2959C23.0658 31.2959 25.5268 29.3107 25.5268 26.478C25.5268 23.6453 22.9841 22.1881 20.4116 20.8795C17.2368 19.2736 13.616 16.7308 13.616 13.1323C13.616 9.53379 17.0064 7.22896 20.6049 7.19922H20.6644C21.0956 7.19922 21.5342 7.23639 21.9655 7.31074L23.1328 9.20665L23.0639 9.19751C22.363 9.10443 21.7296 9.02031 20.88 9.00591C18.471 8.97617 15.9283 10.1063 15.9283 13.0951C15.9283 16.0342 18.7824 17.4851 21.3236 18.7768Z" fill="#272E2D"/></g></svg>'
    ] );

}


add_action( 'init', 'syncro_blocks_register_acf_blocks' );