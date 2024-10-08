<?php
/**
 * Integration Description Block template
 * 
 * @param array $block The block settings and attributes
 */

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'wp-block-syncro-integration-description as-cream-4-color has-text-color has-link-color has-x-small-font-size';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

$integration_description = get_field( 'integration_description', get_the_ID() );

?>
<p class="<?php esc_attr_e( $class_name ); ?>" style="margin-top:var(--wp--preset--spacing--20)">
   <?php echo strip_tags( $integration_description ); ?>
</p>