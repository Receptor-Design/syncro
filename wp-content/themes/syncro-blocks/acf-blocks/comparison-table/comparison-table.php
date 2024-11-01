<?php
/**
 * Comparison Table Block template
 * 
 * @param array $block The block settings and attributes
 */

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'wp-block-syncro-comparison-table';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}
$companies = array();
if( have_rows( 'companies' ) ):
    while( have_rows( 'companies' ) ): the_row();
        $companies[] = get_sub_field( 'company_name' );
    endwhile;
endif;
$columns_count = count( $companies );

?>
<div <?php echo $anchor; ?> class="<?php esc_attr_e( $class_name ); ?>">    
    <table>
    <thead>
        <tr>
        <th scope="col"></th>
        <?php foreach( $companies as $company ): 
            echo '<th scope="col"><span>' . esc_html( $company ) . '</span></th>';
        endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <?php if( have_rows( 'comparison_row' ) ):
            $row_count = 0;
            while( have_rows( 'comparison_row' ) ): the_row();
                if( $row_count === 0 ){
                    echo '<tr class="open">';
                } else {
                    echo '<tr>';
                }
                echo '<td class="row-label">' . esc_html( get_sub_field( 'label') ) . '</td>';
                if( have_rows( 'row_data' ) ):
                    $count = 0;
                    while( have_rows( 'row_data' ) ): the_row();
                        echo '<td data-label="' . $companies[$count] . '">' . esc_html( get_sub_field( 'data' ) ) . '</td>';
                        $count++;
                    endwhile;
                endif;
                echo '</tr>';
                $row_count++;
            endwhile;
        endif; ?>
    </tbody>
    </table>
</div>