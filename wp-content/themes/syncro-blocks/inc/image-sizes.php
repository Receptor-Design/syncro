<?php

add_image_size( 'related_post', 335, 187, true );
add_image_size( 'related_post@2x', 670, 374, true );
add_image_size( 'author_headshot', 124, 124, true );
add_image_size( 'author_archive_headshot', 510, 370, true );
add_image_size( 'author_headshot@2x', 248, 248, true );
add_image_size( 'gated_featured_image', 618, 999, false );
add_image_size( 'gated_featured_image@2x', 1236, 9999, false );
add_image_size( 'square', 160, 160, true );
add_image_size( 'square@2x', 320, 320, true );
add_image_size( 'feature_slider_screenshot', 840, 600, true );
add_image_size( 'feature_slider_screenshot@2x', 1680, 1200, true );


// Make custom sizes selectable from WordPress admin.
function syncro_blocks_custom_image_sizes( $size_names ) {
	$new_sizes = array(
		'related_post' => __( 'Related Post', 'syncro-blocks' ),
		'author_headshot' => __( 'Author Headshot', 'syncro-blocks' ),
        'gated_featured_image' => __( 'Gated Featured Image', 'syncro-blocks' ),
        'square'    => __( 'Square', 'syncro-blocks' ),
		'featured_slider_screenshot' => __( 'Feature Slider Screenshot', 'syncro-blocks' ),
	);
	return array_merge( $size_names, $new_sizes );
}
add_filter( 'image_size_names_choose', 'syncro_blocks_custom_image_sizes' );

function syncro_blocks_oembed_defaults( $sizes ) {
    return array(
        'width'  => 750,
        'height' => 400,
    );
}
 
add_filter( 'embed_defaults', 'syncro_blocks_oembed_defaults' );