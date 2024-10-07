<?php
/**
 * Taxonomy Name Block template
 * 
 * @param array $block The block settings and attributes
 */
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
$class_name = 'wp-block-syncro-taxonomy-name';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}
global $wp_query;
$taxonomy = get_taxonomy( $wp_query->query_vars['taxonomy'] );
print_r( $taxonomy );


?>
<div <?php echo esc_attr( $anchor ); ?>class="<?php echo esc_attr( $class_name ); ?>">
    <span class="resource-type-icon"><?php echo $icon; ?></span><span class="resource-type-label"><?php esc_html_e( $label ); ?></span>
</div>