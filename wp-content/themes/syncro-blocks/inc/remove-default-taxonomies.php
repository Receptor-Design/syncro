<?php
function syncro_blocks_remove_default_taxonomies() {
    unregister_taxonomy_for_object_type( 'post_tag', 'post' );
    unregister_taxonomy_for_object_type( 'category', 'post' );
}


add_action( 'init', 'syncro_blocks_remove_default_taxonomies' );