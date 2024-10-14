<?php
/* Hide any post that has the hidden meta field set to true from queries on the front end.
 * Add the Gutenberg Hub Query Search Block's search query to the archive query.
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
    //Any front-end, main query, archive page that has the Gutenberg Hub Query Search Block query param
    if( ! is_admin() && $query->is_main_query() && is_archive() && isset( $_GET[ 'qs' ] ) ){
        $searched_term = sanitize_text_field(wp_unslash($_GET['qs']));

		if ( isset( $query->query_vars['s'] ) && $query->query_vars['s'] ) {
			$searched_term = $query->query_vars['s'] . ',' . $searched_term;
		}
        //Add that searh param to the query so that any Query Loop Blocks that inherit the template's query 
        //Return the expected results.
        $query->set( 's', $searched_term );
    }
}

add_action( 'pre_get_posts', 'sycnro_blocks_pre_get_posts' );