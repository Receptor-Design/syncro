<?php
/**
 * Selected Resources Grid Block template
 * 
 * @param array $block The block settings and attributes
 */

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'wp-block-syncro-featured-resources wp-block-group is-layout-grid wp-block-group-is-layout-grid';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

$featured_resources = get_field( 'featured_resources' );
$alt_featured_image = get_field( 'alternative_featured_image' );
$count = 0;
?>
<div class="<?php esc_attr_e( $class_name ); ?>">    
   <?php foreach( $featured_resources as $resource ): $count++;
        $post_type = get_post_type( $resource );
        $heading_level = $count === 1 ? 'h2' : 'h3';
        $topics = get_the_term_list( $resource->ID, 'resource-syncrotopic', '<div class="taxonomy-resource-syncrotopic has-style-topic-label-black wp-block-post-terms">', ' • ', '</div>');
        $type = get_the_terms( $resource->ID, 'resource-category' );
        $type_singular = get_field( 'singular_label', 'resource-category_' . $type[0]->term_id );
        $button_label = $type_singular ? $type_singular : $type[0]->name;
        $datetime = get_the_date( 'c', $resource->ID );
        $date = get_the_date( 'M j, Y', $resource->ID );
        $reading_time = syncro_get_reading_time( $resource, 'featured-resources' );
        if( $reading_time ){
            $reading_time = '<span class="reading-time">' . $reading_time . '</span>';
        }
        if( $type[0]->slug === 'webinars' ){
            if( get_field( 'event_date', $resource->ID ) ){
                $date = get_field( 'event_date', $resource->ID );
                $event_date = DateTime::createFromFormat( 'M j, Y', get_field( 'event_date', $resource->ID ) );
                $datetime = $event_date->format( 'c' );
            }
        }
        if( 'post' === $post_type ){
            $post_meta = '<div class="post-meta-data"><div class="wp-block-post-author"><div class="wp-block-post-author__content">By ' . get_the_author_posts_link() . '</div></div> • ';
            $post_meta .= '<div class="wp-block-post-date"><time datetime="' . $datetime . '">' . $date . '</time></div></div>';
        } else {
            $post_meta = '<div class="post-meta-data">' . $reading_time . '<div class="wp-block-post-date"><time datetime="' . $datetime . '">' . $date . '</time></div></div>';
        }

        echo '<div class="wp-block-group has-global-padding is-layout-constrained wp-block-group-is-layout-constrained"><hr class="wp-block-separator has-text-color has-tertiary-color has-alpha-channel-opacity has-tertiary-background-color has-background">';
            echo $topics;
            echo '<' . $heading_level . ' class="wp-block-heading has-base-color has-text-color has-link-color">' . get_the_title( $resource ) . '</' . $heading_level . '>';
            if( $count === 1 ) {
                echo '<p class="has-base-color has-text-color has-link-color has-small-font-size">' . get_the_excerpt( $resource ) . '</p>';
            }
            echo $post_meta;
            echo '<div class="wp-block-buttons is-layout-flex wp-block-buttons-is-layout-flex"><div class="wp-block-button is-style-cta-medium"><a href="' . get_permalink( $resource ) . '" class="wp-block-button__link has-syncro-black-color has-base-background-color has-text-color has-background has-link-color wp-element-button">' . $button_label . '</a></div></div>';
            if( $count === 1 && $alt_featured_image ){
                echo '<figure class="wp-block-image size-full">' . wp_get_attachment_image( $alt_featured_image, 'full' ) . '</figure>';
            } else if( $count === 1 ){
                echo '<figure class="wp-block-image size-full">' . get_the_post_thumbnail( $alt_featured_image, 'full' ) . '</figure>';
            }
        echo '</div>';
    endforeach; ?>
</div>