<?php
/**
 * Plugin Name:       Mobile Menu Template Part
 * Description:       A block that displays a hamburger to reveal a template part in its modal rather than a navigation menu.
 * Version:           0.1.0
 * Requires at least: 6.6
 * Requires PHP:      7.2
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       mobile-menu-template-part
 *
 * @package           cdc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function cdc_mobile_menu_template_part_block_init() {
	register_block_type_from_metadata( __DIR__ . '/build' );
}
add_action( 'init', 'cdc_mobile_menu_template_part_block_init' );

/**
 * Adds a custom template part area for mega menus to the list of template part areas.
 *
 * This function introduces a new area specifically for menu templates, allowing
 * the creation of sections within a mega menu. The new area is appended to the 
 * existing list of template part areas.
 * 
 * @see https://developer.wordpress.org/reference/hooks/default_wp_template_part_areas/
 *
 * @param array $areas Existing array of template part areas.
 * @return array Modified array of template part areas including the new mega menu area.
 */
function cdc_mobile_menu_template_part_template_part_areas( array $areas ) {
	$areas[] = array(
		'area'        => 'menu',
		'area_tag'    => 'div',
		'description' => __( 'Menu templates are used to create sections of a mobile menu.', 'mobile-menu-template-part' ),
		'icon' 		  => 'layout',
		'label'       => __( 'Menu', 'mobile-menu-template-part' ),
	);

	return $areas;
}
add_filter( 'default_wp_template_part_areas', 'cdc_mobile_menu_template_part_template_part_areas' );
