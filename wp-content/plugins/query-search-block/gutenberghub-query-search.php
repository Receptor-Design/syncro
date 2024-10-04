<?php

/**
 * Plugin Name: Query Search By GutenbergHub 
 * Description: Query search allows you specifically search inside query loop. Simply insert it inside the query loop.
 * Author: GutenbergHub
 * Author URI:  https://shop.gutenberghub.com/
 * Version: 1.0.2
 * Requires at least: 6.1
 * Requires PHP: 7.0
 * Text Domain: gutenberghub-query-search
 * Domain Path: /languages
 * Tested up to: 6.3
 *
 * @package GutenberghubQuerySearch
 */

if (!defined('ABSPATH')) {
	die('No direct access');
}

if (!defined('GHQSEARCH_DIR_PATH')) {
	define('GHQSEARCH_DIR_PATH', \plugin_dir_path(__FILE__));
}

if (!defined('GHQSEARCH_PLUGIN_URL')) {
	define('GHQSEARCH_PLUGIN_URL', \plugins_url('/', __FILE__));
}

if (!defined('GHQSEARCH_PLUGIN_BASE_NAME')) {
	define('GHQSEARCH_PLUGIN_BASE_NAME', \plugin_basename(__FILE__));
}

if (!class_exists('Gutenberghub_Query_Search')) {
	/**
	 * Main plugin class
	 */
	final class Gutenberghub_Query_Search {
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

			// Core.
			require_once GHQSEARCH_DIR_PATH . 'includes/class-gutenberghub-query-search-assets.php';

			// Extensions.
			require_once GHQSEARCH_DIR_PATH . 'includes/class-gutenberghub-query.php';

			//GutenbergHub SDK
			require_once GHQSEARCH_DIR_PATH . 'gutenberghub-sdk/loader.php';


			// Search
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

	new Gutenberghub_Query_Search();
}
