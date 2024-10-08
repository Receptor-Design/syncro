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
$class_name = 'wp-block-syncro-selected-resources-grid wp-block-group is-layout-grid wp-block-group-is-layout-grid';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

$selected_resources = get_field( 'selected_posts' );

?>
<div class="<?php esc_attr_e( $class_name ); ?>">    
   <?php foreach( $selected_resources as $resource ):
        $post_type = get_post_type( $resource );
        $bg_color = get_page_template_slug( $resource ) === 'gated' ? 'has-teal-2-background-color' : 'has-teal-3-background-color';
        $topics = wp_get_post_terms( $resource->ID, 'resource-syncrotopic' );
        $topics_html = '';
        foreach( $topics as $topic ) {
            $topics_html .= '<span class="topic">' . $topic->name . '</span>';
        }
        if( $topics_html ){
            $topics_html .= '<span>•</span>';
        }
        $type = '<span>' . strip_tags( get_the_term_list( $resource->ID, 'resource-category', '', ' ', '') ) . '</span>';
        $reading_time = syncro_get_reading_time( $resource );
        $reading_time_html = $reading_time ? '<span>•</span> ' . $reading_time : '';
        if( $post_type === 'post' ){ ?>
            <a href="<?php the_permalink( $resource ); ?>" class="grid-card">
                <div class="wp-block-cover has-custom-content-position is-position-top-left" style="border-radius:24px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient has-blog-card-overlay-gradient-background"></span>
                    <?php echo get_the_post_thumbnail( $resource, 'full', array( 'class' => 'wp-block-cover__image-background', 'data-object-fit' => 'cover') ); ?>
                    <div class="wp-block-cover__inner-container has-global-padding is-layout-constrained wp-block-cover-is-layout-constrained">
                        <h4 class="wp-block-heading"><?php echo get_the_title( $resource ); ?></h4>
                        <p class="post-excerpt has-small-font-size"><?php echo get_the_excerpt( $resource ); ?></p>
                        <p class="post-meta-data">
                            <?php echo $topics_html . $type . $reading_time_html; ?>
                        </p>
                        
                    </div>
                </div>
            </a>
        <?php } else { ?>
            <a href="<?php the_permalink( $resource ); ?>" class="grid-card">
                <div class="wp-block-cover has-custom-content-position is-position-top-left" style="border-radius:24px">
                    <span aria-hidden="true" class="wp-block-cover__background <?php echo $bg_color; ?> has-background-dim-100 has-background-dim"></span>
                    <div class="wp-block-cover__inner-container has-global-padding is-layout-constrained wp-block-cover-is-layout-constrained">
                        <h4 class="wp-block-heading"><?php echo get_the_title( $resource ); ?></h4>
                        <p class="post-excerpt has-small-font-size"><?php echo get_the_excerpt( $resource ); ?></p>
                        <p class="post-meta-data">
                        <?php echo $topics_html . $type . $reading_time_html; ?>
                        </p>
                    </div>
                </div>
            </a>
        <?php }
    endforeach; ?>
</div>