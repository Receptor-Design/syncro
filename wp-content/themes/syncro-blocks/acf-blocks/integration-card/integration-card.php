<?php
/**
 * Integration card Block template
 * 
 * @param array $block The block settings and attributes
 */

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'wp-block-syncro-integration-card as-cream-4-color has-text-color has-link-color has-x-small-font-size';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

$featured_image = get_field( 'integration_icon', get_the_ID() );

$title = get_the_title( get_the_ID() );
$integration_link = get_field( 'integration_link', get_the_ID() );
$integration_description = get_field( 'integration_description', get_the_ID() );
$allowed_blocks = [ 'core/post-terms' ];

if( $integration_link ) {
    $link = '<a href="' . esc_url( $integration_link ) . '" class="stretched-link" target="_blank" rel="noopener">';
} else if( ! $integration_link && get_field( 'integrations_page_type') == 'nopage' ) {
    $integration_link = get_post_type_archive_link( 'integrations', get_the_ID() );
    $link = '<a href="' . esc_url( $integration_link ) . '" class="stretched-link" target="_self" rel="noopener">';
} else if ( ! $integration_link && get_field( 'integrations_page_type', get_the_ID() ) == 'custompage' ) {
    $integration_link = get_the_permalink( get_the_ID() );
    $link = '<a href="' . esc_url( $integration_link ) . '" class="stretched-link" target="_self" rel="noopener">';
}

if( $is_preview ){
    $integration_link = '<a>';
}



?>
<div class="wp-block-group has-cream-2-background-color has-background has-global-padding is-layout-constrained wp-block-group-is-layout-constrained wp-elements-e539b10ac3368c83078698b1826d1140" style="border-radius:24px">
    <div class="wp-block-columns are-vertically-aligned-center is-layout-flex wp-container-core-columns-is-layout-8 wp-block-columns-is-layout-flex">
        <?php if( $featured_image ): ?>
        <div class="wp-block-column is-vertically-aligned-center is-layout-flow wp-block-column-is-layout-flow" style="flex-basis:40px">
            <figure class="wp-block-image has-custom-border wp-block-syncro-integration-icon">
                <?php echo wp_get_attachment_image( $featured_image, array( 40, 40 ) ); ?>
            </figure>
        </div>
        <?php endif; ?>

        <div class="wp-block-column is-vertically-aligned-center is-layout-flow wp-block-column-is-layout-flow">
            <h3 class="wp-block-syncro-integration-title wp-block-post-title">
                <?php echo $link; ?>
                    <?php echo esc_html( $title ); ?>
                </a>
            </h3>

            <p class="wp-block-syncro-integration-description has-cream-4-color has-text-color has-link-color has-x-small-font-size" style="margin-top:var(--wp--preset--spacing--20)">
                <?php echo strip_tags( $integration_description ); ?>
            </p>
        </div>

        <div class="wp-block-column is-vertically-aligned-center is-layout-flow wp-block-column-is-layout-flow">
            <InnerBlocks allowedBlocks="<?php echo esc_attr( wp_json_encode( $allowed_blocks ) ); ?>" />
        </div>
    </div>
</div>