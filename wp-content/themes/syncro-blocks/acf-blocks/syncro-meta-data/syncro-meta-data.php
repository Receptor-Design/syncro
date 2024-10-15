<?php
/**
 * Syncro Meta Data Block template
 * 
 * @param array $block The block settings and attributes
 */

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}
$output_style = get_field( 'output_style' );

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'wp-block-syncro-syncro-meta-data ' . esc_attr( $output_style ) . '-style';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

/*
single : Single Post/Resource ( Reading Time • Date )
cream-card : Standard Card ( Reading Time • Date • Author )
collection-card : Collection Card ( Topic(s) • Type • Reading Time )
featured-resources : Featured Resources ( Reading Time or Author • Date )
*/
$message = '';

$post_type = get_post_type();
$datetime = get_the_date( 'c' );
$date = get_the_date();
$reading_time = syncro_get_reading_time( get_post( get_the_id() ), $output_style );
$author = '';
switch ($post_type){
    case 'post':
        $author = ' • <div class="wp-block-post-author"><div class="wp-block-post-author__content">By ' . get_the_author_posts_link() . '</div></div>';
        break;
    case 'resource':
        $types = wp_get_post_terms( get_the_ID(), 'resource-category' );
        if( is_array( $types) && count( $types ) ){
            if( $types[0]->slug === 'webinars' ){
                if( get_field( 'event_date', get_the_ID() ) ){
                    $date = get_field( 'event_date', get_the_ID() );
                    $event_date = DateTime::createFromFormat( 'M j, Y', get_field( 'event_date', get_the_ID() ) );
                    $datetime = $event_date->format( 'c' );
                }
            }
        }
        break;
}
switch ( $output_style ) {
    case 'single':
        $message = $reading_time . '<div style="font-size:11px;font-style:normal;font-weight:500;text-transform:uppercase;letter-spacing:0.715px;" class="has-link-color wp-block-post-date has-text-color has-foreground-80-color"><time datetime="' . $datetime . '">' . $date . '</time></div>';
        break;
    case 'cream-card':
        if( $reading_time ){
            $reading_time  = '<span class="reading-time">' . $reading_time . '</span>';
        }
        $message = $reading_time . '<div class="wp-block-post-date"><time datetime="' . $datetime . '">' . $date . '</time></div>' . $author;
        break;
    case 'featured-resources':
        if( 'post' === $post_type ){
            $message = '<div class="wp-block-post-author"><div class="wp-block-post-author__content">By ' . get_the_author_posts_link() . '</div></div> • ';
            $message .= '<div class="wp-block-post-date"><time datetime="' . $datetime . '">' . $date . '</time></div>';
        } else {
            if( $reading_time ){
                $reading_time  = '<span class="reading-time">' . $reading_time . '</span>';
            }
            $message = $reading_time . '<div class="wp-block-post-date"><time datetime="' . $datetime . '">' . $date . '</time></div>';
        }

}


if( ! $message ){
    return;
}
?>
<div <?php echo esc_attr( $anchor ); ?>class="<?php echo esc_attr( $class_name ); ?>">
    <?php echo $message; ?>
</div>