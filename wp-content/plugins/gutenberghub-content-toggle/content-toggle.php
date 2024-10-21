<?php

/**
 * Plugin Name:       Content Toggle By GutenbergHub
 * Description:       Use the Content Toggle block in Gutenberg to switch between two sets of content, such as primary/secondary or annual/monthly.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           1.0.1
 * Author:            GutenbergHub
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       ghub-content-toggle
 *
 * @package           ghub-content-toggle
 */

require_once plugin_dir_path(__FILE__) . 'gutenberghub-sdk/loader.php';

function ghub_content_toggle_block_init()
{
	register_block_type(__DIR__ . '/build');


	wp_register_script(
		'ghub-toggle-frontend',
		plugins_url('/', __FILE__) . 'script/frontend.js',
		array(),
		uniqid(),
		true
	);
}
add_action('init', 'ghub_content_toggle_block_init');


add_filter('block_categories_all', function ($categories) {
    // Check if "GutenbergHub" category already exists
    foreach ($categories as $category) {
        if ($category['slug'] === 'ghub-products') {
            // "GutenbergHub" category already exists, do not add again
            return $categories;
        }
    }

    // Adding "GutenbergHub" category.
    $categories[] = array(
        'slug'  => 'ghub-products',
        'title' => 'GutenbergHub'
    );

    return $categories;
});