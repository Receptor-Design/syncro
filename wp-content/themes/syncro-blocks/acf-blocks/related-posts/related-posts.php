<?php

/**
 * Related Posts Block template
 * 
 * @param array $block The block settings and attributes
 */

$current_post = get_the_ID();
$current_topics = wp_get_post_terms($current_post, 'resource-syncrotopic');
if (is_array($current_topics) && count($current_topics)) {
    $current_topic = $current_topics[0];
} else {
    return;
}

$args = array(
    'post_type' => array(
        'post',
        'resource'
    ),
    'meta_query' => array(
        'relation' => 'NOTIN',
        array(
            'key' => 'hidden',
            'value' => true,
            'compare' => '!='
        )
    ),
    'tax_query' => array(
        array(
            'taxonomy'  => 'resource-syncrotopic',
            'field'     => 'term_id',
            'terms'     => $current_topic->term_id
        )
    ),
    'post__not_in'  => array(
        $current_post
    ),
    'posts_per_page'    => 3
);
$related_posts_query = new WP_Query($args);

if ($related_posts_query->have_posts()) {
    echo '<div class="wp-block-columns is-layout-flex wp-container-core-columns-is-layout-15 wp-block-columns-is-layout-flex wp-block-syncro-related-resources">';
    while ($related_posts_query->have_posts()) {
        $related_posts_query->the_post();
         
        echo '<div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow">';
        echo '<hr class="wp-block-separator has-alpha-channel-opacity">';
        echo '<figure class="wp-block-post-featured-image"><a href="' . esc_url(get_permalink()) . '" target="_self">' . get_the_post_thumbnail(get_the_ID(), 'related_post') . '</a></figure>';
        echo '<div class="wp-block-group is-nowrap is-layout-flex wp-block-group-is-layout-flex terms-row">';
        $current_topics = wp_get_post_terms(get_the_ID(), 'resource-syncrotopic');
        if (is_array($current_topics) && count($current_topics)) {
            echo '<div class="taxonomy-resource-syncrotopic wp-block-post-terms"><a href="' . get_term_link($current_topics[0]) . '" rel="tag">' . $current_topics[0]->name . '</a></div>';
            echo '<p>•</p>';
        }
        $current_type = wp_get_post_terms(get_the_ID(), 'resource-category');
        if (is_array($current_type) && count($current_type)) {
            echo '<div class="taxonomy-resource-category wp-block-post-terms"><a href="' . get_term_link($current_type[0]) . '" rel="tag">' . $current_type[0]->name . '</a></div>';
        }
        echo '</div>';
        echo '<h4 class="wp-block-post-title"><a href="' . esc_url(get_permalink()) . '" target="_self">' . esc_html(get_the_title()) . '</a></h4>';
        echo '</div>';
    }
    echo '</div>';
}
