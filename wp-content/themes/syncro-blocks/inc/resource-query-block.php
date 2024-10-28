<?php 
function sycnro_blocks_resource_query_pre_render_block( $pre_render, $parsed_block ) {
    if( $parsed_block['blockName'] === 'core/query' 
        && array_key_exists( 'namespace', $parsed_block['attrs'] ) 
        && 'syncro-blocks/resource-query' === $parsed_block[ 'attrs' ][ 'namespace' ] ) {
        add_filter(
            'query_loop_block_query_vars',
            function( $query ) {
                $query['post_type'] = array( 'post', 'resource' );
                return $query;
            },
        );
    }
    return $pre_render;
}

add_filter( 'pre_render_block', 'sycnro_blocks_resource_query_pre_render_block', 10, 2 );

add_filter( 'rest_resource_query', function( $args, $request ) {
    $includePosts = $request->get_param( 'includePosts' );
    if( $includePosts ){
        $args['post_type'] = array( 'post', 'resource' );
    }
    return $args;
}, 10, 2 );

