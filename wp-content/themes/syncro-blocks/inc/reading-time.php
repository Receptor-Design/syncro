<?php
function syncro_get_reading_time( $resource, $context = '' ) {
    $post_type = get_post_type( $resource );
    $message = '';
    switch ($post_type){
        case 'post':
            $read_length = get_field( 'read_length', $resource->ID );
            if( $read_length > 0 ){
                $message = $read_length . ' min read';
            }
        case 'resource':
            $types = wp_get_post_terms( $resource->ID, 'resource-category' );
            if( is_array( $types) && count( $types ) ){
                if( $types[0]->slug === 'webinars' ){
                    $message = 'On Demand';
                }
                else if( $types[0]->slug === 'guides' ){
                    $read_length = get_field( 'read_length', $resource->ID );
                    if( $read_length > 0 ){
                        $message = $read_length . 'min read';
                    }
                }
                else if( $types[0]->slug === 'podcast' ){
                    $read_length = get_field( 'listen_time', $resource->ID );
                    if( $read_length > 0 ){
                        $message = $read_length;
                    }
                }

            }
            break;
    }
    return $message;
}