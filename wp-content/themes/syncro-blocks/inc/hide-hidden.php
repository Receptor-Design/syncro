<?php
/* Hide any post that has the hidden meta field set to true from queries on the front end.
*/

function sycnro_blocks_pre_get_posts( $query ) {
    if( ! is_admin() && ! is_singular() ){
        $meta_query = array(
            'relation' => 'OR',
            array(
                'key' => 'hidden',
                'value' => '0',
                'compare' => '='
            ),
            array(
                'key' => 'hidden',
                'compare' => 'NOT EXISTS'
            )
        );
        $query->set( 'meta_query', $meta_query );
    }
}

add_action( 'pre_get_posts', 'sycnro_blocks_pre_get_posts' );