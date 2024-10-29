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
        break;
    case 'media-release':
        $message = '<span class="resource-type-icon"><svg xmlns="http://www.w3.org/2000/svg" width="29" height="28" viewBox="0 0 29 28" fill="none"><circle cx="14.7324" cy="14" r="14" fill="black"/><path fill-rule="evenodd" clip-rule="evenodd" d="M10.7869 6.40332L10.7643 6.40332C10.4563 6.40331 10.1906 6.4033 9.97301 6.42399C9.74268 6.44589 9.51517 6.49445 9.30317 6.62436C9.10133 6.74804 8.93164 6.91774 8.80795 7.11957C8.67804 7.33157 8.62948 7.55908 8.60758 7.78941C8.58689 8.007 8.5869 8.27268 8.58691 8.58073L8.58692 8.60332V19.3968L8.58691 19.4194C8.5869 19.7274 8.58689 19.9931 8.60758 20.2107C8.62948 20.441 8.67804 20.6685 8.80795 20.8805C8.93164 21.0824 9.10133 21.2521 9.30317 21.3757C9.51517 21.5057 9.74268 21.5542 9.97301 21.5761C10.1906 21.5968 10.4563 21.5968 10.7643 21.5968H10.7869H18.6772H18.6998C19.0078 21.5968 19.2735 21.5968 19.4911 21.5761C19.7214 21.5542 19.9489 21.5057 20.1609 21.3757C20.3627 21.2521 20.5324 21.0824 20.6561 20.8805C20.786 20.6685 20.8346 20.441 20.8565 20.2107C20.8772 19.9931 20.8772 19.7274 20.8772 19.4194V19.3968V8.60332V8.58073C20.8772 8.27269 20.8772 8.007 20.8565 7.78941C20.8346 7.55908 20.786 7.33157 20.6561 7.11957C20.5324 6.91774 20.3627 6.74804 20.1609 6.62436C19.9489 6.49445 19.7214 6.44589 19.4911 6.42399C19.2735 6.4033 19.0078 6.40331 18.6998 6.40332L18.6772 6.40332H10.7869ZM9.82567 7.477C9.85414 7.45956 9.91053 7.43444 10.0677 7.4195C10.2322 7.40385 10.4499 7.40332 10.7869 7.40332H18.6772C19.0142 7.40332 19.2318 7.40385 19.3964 7.4195C19.5535 7.43444 19.6099 7.45956 19.6384 7.477C19.7057 7.51823 19.7623 7.57479 19.8035 7.64207C19.8209 7.67054 19.846 7.72694 19.861 7.88407C19.8766 8.04864 19.8772 8.2663 19.8772 8.60332V19.3968C19.8772 19.7338 19.8766 19.9515 19.861 20.116C19.846 20.2732 19.8209 20.3296 19.8035 20.358C19.7623 20.4253 19.7057 20.4819 19.6384 20.5231C19.6099 20.5405 19.5535 20.5657 19.3964 20.5806C19.2318 20.5963 19.0142 20.5968 18.6772 20.5968H10.7869C10.4499 20.5968 10.2322 20.5963 10.0677 20.5806C9.91053 20.5657 9.85414 20.5405 9.82567 20.5231C9.75839 20.4819 9.70182 20.4253 9.6606 20.358C9.64315 20.3296 9.61803 20.2732 9.60309 20.116C9.58744 19.9515 9.58692 19.7338 9.58692 19.3968V8.60332C9.58692 8.2663 9.58744 8.04864 9.60309 7.88407C9.61803 7.72694 9.64315 7.67054 9.6606 7.64207C9.70182 7.57479 9.75839 7.51823 9.82567 7.477ZM11.9095 17.0484C11.6333 17.0484 11.4095 17.2722 11.4095 17.5484C11.4095 17.8245 11.6333 18.0484 11.9095 18.0484H15.2966C15.5727 18.0484 15.7966 17.8245 15.7966 17.5484C15.7966 17.2722 15.5727 17.0484 15.2966 17.0484H11.9095ZM11.4095 14.0001C11.4095 13.7239 11.6333 13.5001 11.9095 13.5001H17.5546C17.8307 13.5001 18.0546 13.7239 18.0546 14.0001C18.0546 14.2762 17.8307 14.5001 17.5546 14.5001H11.9095C11.6333 14.5001 11.4095 14.2762 11.4095 14.0001ZM11.9095 9.95171C11.6333 9.95171 11.4095 10.1756 11.4095 10.4517C11.4095 10.7278 11.6333 10.9517 11.9095 10.9517H17.5546C17.8307 10.9517 18.0546 10.7278 18.0546 10.4517C18.0546 10.1756 17.8307 9.95171 17.5546 9.95171H11.9095Z" fill="white"/></svg></span>';
        $message .= '<div class="wp-block-post-type">Media Release</div> • <div class="wp-block-post-date"><time datetime="' . $datetime . '">' . $date . '</time></div>';
        break;
}


if( ! $message ){
    return;
}
?>
<div <?php echo esc_attr( $anchor ); ?>class="<?php echo esc_attr( $class_name ); ?>">
    <?php echo $message; ?>
</div>