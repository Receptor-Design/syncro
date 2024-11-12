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

    register_block_pattern_category(  'heros', array(
        'label' => __( 'Heros', 'syncro-blocks' )
    ) );
}

add_action( 'init', 'syncro_blocks_pattern_categories' ); 

function syncro_blocks_disable_gutenberg( $current_status, $post_type ) {

    // Disabled post types
    $disabled_post_types = array( 'integrations' );

    // Change $can_edit to false for any post types in the disabled post types array
    if ( in_array( $post_type, $disabled_post_types, true ) ) {
        $current_status = false;
    }

    return $current_status;
}
add_filter( 'use_block_editor_for_post_type', 'syncro_blocks_disable_gutenberg', 10, 2 );

/*
 * Add template class to admin body based on current page's template.
 */
function syncro_blocks_add_template_class( $classes ){
    $template = get_page_template_slug();
    if ($template) {
        $class = preg_replace('/\.php$/', '', $template);
        $classes .= ' template-' . sanitize_html_class($class);
    }
    return $classes;
}
add_filter('admin_body_class', 'syncro_blocks_add_template_class');