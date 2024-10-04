<?php

/**
 * Plugin Name: Query Result Count By GutenbergHub 
 * Description: Query Result Count is a powerfull block that allows you to show posts count out of total on the page.
 * Author: GutenbergHub
 * Author URI:  https://shop.gutenberghub.com/
 * Version: 1.0.2
 * Requires at least: 6.1
 * Requires PHP: 7.0
 * Text Domain: ghub-query-result-count
 * Domain Path: /languages
 * Tested up to: 6.3
 *
 * @package GutenberghubQueryResultCount
 */

if (!defined('ABSPATH')) {
	die('No direct access');
}

if (!defined('GHRC_DIR_PATH')) {
	define('GHRC_DIR_PATH', \plugin_dir_path(__FILE__));
}

if (!defined('GHRC_PLUGIN_URL')) {
	define('GHRC_PLUGIN_URL', \plugins_url('/', __FILE__));
}

if (!defined('GHRC_PLUGIN_BASE_NAME')) {
	define('GHRC_PLUGIN_BASE_NAME', \plugin_basename(__FILE__));
}

if (!class_exists('Gutenberghub_Query_Result_Count')) {
	/**
	 * Main plugin class
	 */
	final class Gutenberghub_Query_Result_Count {
		/**
		 * Var to make sure we only load once
		 *
		 * @var boolean $loaded
		 */
		public static $loaded = false;

		/**
		 * Constructor
		 *
		 * @return void
		 */
		public function __construct() {
			// GutenbergHub SDk
			require_once GHRC_DIR_PATH . 'gutenberghub-sdk/loader.php';

			// Core.
			require_once GHRC_DIR_PATH . 'includes/class-gutenberghub-query-result-count-assets.php';

			// Blocks.
			require_once GHRC_DIR_PATH . 'includes/blocks/class-gutenberghub-query-result-count.php';

			// Result Count
			add_filter('block_categories_all', array($this, 'register_category'));
		}

		/**
		 * Register custom category
		 * 
		 */
		public function register_category($categories) {
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
		}
	}

	new Gutenberghub_Query_Result_Count();
}
