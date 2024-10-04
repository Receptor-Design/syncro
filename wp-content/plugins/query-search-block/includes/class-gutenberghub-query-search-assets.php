<?php

/**
 * Admin Class.
 *
 * @package GutenberghubQuerySearch
 */

if (!defined('ABSPATH')) {
	die('No direct access');
}

/**
 * Main class for handling related assets and functionalities.
 */
class Gutenberghub_Query_Search_Assets {

	/**
	 * Constructor.
	 *
	 * @return void
	 */
	public function __construct() {

		add_action('init', array($this, 'register_frontend_assets'));
		add_action('enqueue_block_assets', array($this, 'load_block_editor_assets'));
		add_filter('register_block_type_args', array($this, 'custom_block_args'), 10, 2);
	}

	/**
	 * All frontend scripts/styles should be loaded here.
	 *
	 * @return void
	 */
	public function register_frontend_assets() {
		wp_register_style(
			'gutenberghub-query-search-frontend-style',
			GHQSEARCH_PLUGIN_URL . 'dist/frontend.css',
			array(),
			uniqid()
		);
		wp_register_script(
			'gutenberghub-query-search-frontend',
			GHQSEARCH_PLUGIN_URL . 'dist/frontend.js',
			array('jquery'),
			uniqid(),
			false
		);
	}

	public function custom_block_args($args, $block_type) {

		if ('core/search' === $block_type) {
			$current_provided_style = isset($args['style_handles']) ? $args['style_handles'] : array();
			$current_provided_scripts = isset($args['view_script']) ? $args['view_script'] : array();

			$args['style_handles'] = array_merge($current_provided_style, array('gutenberghub-query-search-frontend-style'));
			$args['view_script'] = array_merge($current_provided_scripts, array('gutenberghub-query-search-frontend'));
		}
		return $args;
	}

	/**
	 * All block editor assets should be loaded here.
	 *
	 * @return void
	 */
	public function load_block_editor_assets() {

		// Checks if the current enqueue is for the tokengate post type.
		\wp_enqueue_script(
			'gutenberghub-query-search-gutenberg-script',
			GHQSEARCH_PLUGIN_URL . 'dist/gutenberg.js',
			array(
				'wp-api',
				'wp-i18n',
				'wp-components',
				'wp-element',
				'wp-editor',
				'lodash'

			),
			uniqid(),
			true
		);

		\wp_enqueue_style(
			'gutenberghub-query-search-gutenberg-style',
			GHQSEARCH_PLUGIN_URL . 'dist/gutenberg.css',
			array(
				'wp-components',
			),
			uniqid()
		);
	}
}

new Gutenberghub_Query_Search_Assets();
