<?php
/**
 * Term Featured Image Block template
 * 
 * @param array $block The block settings and attributes
 */
if( $is_preview ){
    echo 'Term Featured Image';
    return;
}
// Bail early if this isn't a taxonomy archive
if( ! is_tax() ) {
    return;
}
// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'wp-block-syncro-term-featured-image';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}
global $wp_query;
$taxonomy = $wp_query->query_vars['taxonomy'];
$term_slug = $wp_query->query_vars['term'];
$term = get_term_by( 'slug', $term_slug, $taxonomy );
$featured_image = get_field( 'featured_image', $term );
if( ! $featured_image || ! is_integer( $featured_image ) ){
    return;
}


?>
<figure class="wp-block-image size-full has-custom-border">
    <?php echo wp_get_attachment_image( $featured_image, 'full', false, array( 'style' => 'border-radius:24px') ); ?>
</figure>