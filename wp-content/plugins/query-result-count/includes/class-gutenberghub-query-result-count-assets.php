<?php

/**
 * Admin Class.
 *
 * @package GutenberghubQueryFilters
 */

if (!defined('ABSPATH')) {
	die('No direct access');
}

/**
 * Main class for handling related assets and functionalities.
 */
class Gutenberghub_Query_Result_Count_Assets {

	/**
	 * Constructor.
	 *
	 * @return void
	 */
	public function __construct() {
		add_action('init', array($this, 'load_block_editor_assets'));
	}


	/**
	 * All block editor assets should be loaded here.
	 *
	 * @return void
	 */
	public function load_block_editor_assets() {

		// Checks if the current enqueue is for the tokengate post type.
		\wp_register_script(
			'gutenberghub-query-result-count-gutenberg-script',
			GHRC_PLUGIN_URL . 'dist/gutenberg.js',
			array(
				'wp-api',
				'wp-i18n',
				'wp-components',
				'wp-element',
				'wp-editor',
			),
			uniqid(),
			true
		);

		\wp_register_style(
			'gutenberghub-query-result-count-gutenberg-style',
			GHRC_PLUGIN_URL . 'dist/gutenberg.css',
			array(),
			uniqid()
		);
	}
}

new Gutenberghub_Query_Result_Count_Assets();
