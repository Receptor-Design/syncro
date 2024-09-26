<?php
add_filter( 'default_wp_template_part_areas', 'syncro_blocks_template_part_areas' );

function syncro_blocks_template_part_areas( array $areas ) {
	$areas[] = array(
		'area'        => 'footer-newsletter',
		'area_tag'    => 'section',
		'label'       => __( 'Footer Newsletter', 'synco-blocks' ),
		'icon'        => 'sidebar'
	);

    $areas[] = array(
		'area'        => 'footer-cta',
		'area_tag'    => 'section',
		'label'       => __( 'Footer CTA', 'synco-blocks' ),
		'icon'        => 'sidebar'
	);

	return $areas;
}