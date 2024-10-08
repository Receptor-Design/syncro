<?php
/**
 * Integration Icon Block template
 * 
 * @param array $block The block settings and attributes
 */

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'wp-block-image has-custom-border wp-block-syncro-integration-icon';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

$featured_image = get_field( 'integration_icon', get_the_ID() );
if( ! $featured_image || ! is_integer( $featured_image ) ){
    return;
}


?>
<figure class="<?php esc_attr_e( $class_name ); ?>">
    <?php echo wp_get_attachment_image( $featured_image, array( 40, 40 ) ); ?>
</figure>