<?php
/**
 * Integration Title Block template
 * 
 * @param array $block The block settings and attributes
 */

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'wp-block-syncro-integration-title wp-block-post-title';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

$title = get_the_title( get_the_ID() );
$integration_link = get_field( 'integration_link', get_the_ID() );

?>
<h3 class="<?php esc_attr_e( $class_name ); ?>">
    <?php if( ! $is_preview ): ?>
    <a href="<?php echo esc_url( $integration_link ); ?> " class="stretched-link" target="_blank" rel="noopener">
       <?php echo esc_html( $title ); ?>
    </a>
    <?php else: ?>
        <?php echo esc_html( $title ); ?>
    <?php endif; ?>
</h3>