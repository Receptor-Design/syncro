<?php
/**
 * Resource Time Block template
 * 
 * @param array $block The block settings and attributes
 */

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'wp-block-syncro-resource-time';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

$message = '';

$post_type = get_post_type();
switch ($post_type){
    case 'post':
        $read_length = get_field( 'read_length', get_the_ID() );
        if( $read_length > 0 ){
            $message = $read_length . 'min read';
        }
    case 'resource':
        $types = wp_get_post_terms( get_the_ID(), 'resource-category' );
        if( is_array( $types) && count( $types ) ){
            if( $types[0]->slug === 'webinars' ){
                $message = 'On Demand';
            }
            else if( $types[0]->slug === 'guides' ){
                $read_length = get_field( 'read_length', get_the_ID() );
                if( $read_length > 0 ){
                    $message = $read_length . 'min read';
                }
            }
            else if( $types[0]->slug === 'podcast' ){
                $read_length = get_field( 'listen_time', get_the_ID() );
                if( $read_length > 0 ){
                    $message = $read_length;
                }
            }

        }
        break;
}
if( ! $message ){
    return;
}
?>
<div <?php echo esc_attr( $anchor ); ?>class="<?php echo esc_attr( $class_name ); ?>">
    <?php esc_html_e( $message ); ?>
</div>