<?php

namespace DeliciousBrains\WPMDB\Common\Compatibility;

class Compatibility {
	/**
	 * @var
	 */
	protected $default_whitelisted_plugins;

	/**
	 * Registers action and filter hooks
	 *
	 * @return void
	 **/
	public function register() {
		add_action( 'admin_init', array( $this, 'wpmdbc_tgmpa_compatibility' ), 1 );
		add_filter( 'option_active_plugins', array( $this, 'wpmdbc_include_plugins' ) );
		add_filter( 'site_option_active_sitewide_plugins', array( $this, 'wpmdbc_include_site_plugins' ) );
		add_filter( 'stylesheet_directory', array( $this, 'wpmdbc_disable_theme' ) );
		add_filter( 'template_directory', array( $this, 'wpmdbc_disable_theme' ) );
		add_action( 'muplugins_loaded', array( $this, 'wpmdbc_set_default_whitelist' ), 5 );
		add_action( 'muplugins_loaded', array( $this, 'wpmdbc_plugins_loaded' ), 10 );
		add_action( 'after_setup_theme', array( $this, 'wpmdbc_after_theme_setup' ) );
	}

	/**
	 * During the `wpmdb_flush` and `wpmdb_remote_flush` actions, start output buffer in case theme spits out errors
	 */
	public function wpmdbc_plugins_loaded() {
		if ( $this->wpmdbc_is_wpmdb_flush_call() ) {
			ob_start();
		}
	}

	/**
	 * During the `wpmdb_flush` and `wpmdb_remote_flush` actions, if buffer isn't empty, log content and flush buffer.
	 */
	public function wpmdbc_after_theme_setup() {
		if ( $this->wpmdbc_is_wpmdb_flush_call() ) {
			if ( ob_get_length() ) {
				error_log( ob_get_clean() );
			}
		}
	}

	/**
	 *
	 * Disables the theme during MDB AJAX requests
	 *
	 * Called from the `stylesheet_directory` hook
	 *
	 * @param $stylesheet_dir
	 *
	 * @return string
	 */
	public function wpmdbc_disable_theme( $stylesheet_dir ) {
		$force_enable_theme = apply_filters( 'wpmdb_compatibility_enable_theme', false );

		if ( $this->wpmdbc_is_compatibility_mode_request() && ! $force_enable_theme ) {
			$theme_dir  = realpath( dirname( __FILE__ ) . '/../Compatibility' );
			$stylesheet = 'temp-theme';
			$theme_root = "$theme_dir/$stylesheet";

			return $theme_root;
		}

		return $stylesheet_dir;
	}

	public function wpmdbc_set_default_whitelist() {
		// Allow users to filter whitelisted plugins
		$filtered_plugins = apply_filters( 'wpmdb_compatibility_plugin_whitelist', array() );

		// List of default plugins that should be whitelisted. Can be partial names or slugs
		$wpmdb_plugins = array(
			'wpmdb', // Some tweaks plugins start with this string
			'wp-migrate-db',
			'wpe-site-migration',
		);

		$plugins                           = array_merge( $filtered_plugins, $wpmdb_plugins );
		$this->default_whitelisted_plugins = $plugins;
	}

	/**
	 * Remove TGM Plugin Activation 'force_activation' admin_init action hook if present.
	 *
	 * This is to stop excluded plugins being deactivated after a migration, when a theme uses TGMPA to require a
	 * plugin to be always active. Also applies to the WDS-Required-Plugins by removing `activate_if_not` action
	 */
	public function wpmdbc_tgmpa_compatibility() {
		$remove_function = false;

		// run on wpmdb page
		if ( isset( $_GET['page'] ) && 'wp-migrate-db-pro' == $_GET['page'] ) {
			$remove_function = true;
		}
		// run on wpmdb ajax requests
		if (
			defined( 'DOING_AJAX' ) &&
			DOING_AJAX &&
			isset( $_POST['action'] ) &&
			false !== strpos( $_POST['action'], 'wpmdb' )
		) {
			$remove_function = true;
		}

		if ( $remove_function ) {
			global $wp_filter;
			$admin_init_functions = $wp_filter['admin_init'];
			foreach ( $admin_init_functions as $priority => $functions ) {
				foreach ( $functions as $key => $function ) {
					// searching for function this way as can't rely on the calling class being named TGM_Plugin_Activation
					if ( false !== strpos( $key, 'force_activation' ) || false !== strpos( $key, 'activate_if_not' ) ) {
						if ( is_array( $wp_filter['admin_init'] ) ) {
							// for core versions prior to WP 4.7
							unset( $wp_filter['admin_init'][ $priority ][ $key ] );
						} else {
							unset( $wp_filter['admin_init']->callbacks[ $priority ][ $key ] );
						}

						return;
					}
				}
			}
		}
	}

	/**
	 * remove blog-active plugins
	 *
	 * @param array $plugins numerically keyed array of plugin names
	 *
	 * @return array
	 */
	public function wpmdbc_include_plugins( $plugins ) {
		if ( ! is_array( $plugins ) || empty( $plugins ) ) {
			return $plugins;
		}

		if ( ! $this->wpmdbc_is_compatibility_mode_request() ) {
			return $plugins;
		}

		$whitelist_plugins = $this->wpmdbc_get_whitelist_plugins( $plugins );
		$default_whitelist = $this->default_whitelisted_plugins;

		foreach ( $plugins as $key => $plugin ) {
			if (
				true === $this->wpmdbc_plugin_in_default_whitelist( $plugin, $default_whitelist ) ||
				isset( $whitelist_plugins[ $plugin ] )
			) {
				continue;
			}

			unset( $plugins[ $key ] );
		}

		return $plugins;
	}

	/**
	 * remove network-active plugins
	 *
	 * @param array $plugins array of plugins keyed by name (name=>timestamp pairs)
	 *
	 * @return array
	 */
	public function wpmdbc_include_site_plugins( $plugins ) {
		if ( ! is_array( $plugins ) || empty( $plugins ) ) {
			return $plugins;
		}

		if ( ! $this->wpmdbc_is_compatibility_mode_request() ) {
			return $plugins;
		}

		$whitelist_plugins = $this->wpmdbc_get_whitelist_plugins( $plugins );

		if ( ! $this->default_whitelisted_plugins ) {
			$this->wpmdbc_set_default_whitelist();
		}

		$default_whitelist = $this->default_whitelisted_plugins;

		foreach ( array_keys( $plugins ) as $plugin ) {
			if (
				true === $this->wpmdbc_plugin_in_default_whitelist( $plugin, $default_whitelist ) ||
				isset( $whitelist_plugins[ $plugin ] )
			) {
				continue;
			}
			unset( $plugins[ $plugin ] );
		}

		return $plugins;
	}

	/**
	 *
	 * Checks if the current request is a WPMDB request
	 *
	 * @return bool
	 */
	public function is_wpmdb_ajax_call() {
		if (
			( defined( 'DOING_AJAX' ) && DOING_AJAX ) &&
			( isset( $_POST['action'] ) && false !== strpos( $_POST['action'], 'wpmdb' ) )
		) {
			return true;
		}

		return false;
	}

	/**
	 * @return bool
	 */
	public function wpmdbc_is_wpmdb_ajax_call() {
		return $this->is_wpmdb_ajax_call();
	}

	/**
	 * Checks if the current request is a WPMDB REST API migration request.
	 *
	 * Uses `$_SERVER` global since we're attempting to grab the current
	 * route _before_ `rest_api_init` is fired by WordPress core.
	 *
	 * @return bool
	 */
	public function wpmdbc_is_wpmdb_rest_request() {
		$api_base    = 'mdb-api/v1/';
		$request_uri = isset( $_SERVER['REQUEST_URI'] ) ? $_SERVER['REQUEST_URI'] : '';

		if ( false === strpos( $request_uri, $api_base ) ) {
			return false;
		}

		$current_endpoint = explode( $api_base, $request_uri );
		$current_endpoint = end( $current_endpoint );

		$migration_endpoints = apply_filters(
			'wpmdb_compatibility_mode_api_endpoints',
			[
				'initiate-migration',
				'verify-connection',
				'cancel-migration',
				'prepare-upload',
				'upload-file',
				'import-file',
			]
		);

		// Checks that the current API call is a MDB migration request.
		if ( in_array( $current_endpoint, $migration_endpoints ) ) {
			return true;
		}

		return false;
	}

	/**
	 *
	 * Checks if the current request is a WPMDB background migration request.
	 *
	 * @return bool
	 */
	public function wpmdbc_is_wpmdb_background_migration_request() {
		if (
			defined( 'DOING_AJAX' ) &&
			DOING_AJAX &&
			! empty( $_GET['action'] ) &&
			( false !== strpos( $_GET['action'], 'wpmdb__' ) || false !== strpos( $_GET['action'], 'wpesm__' ) )
		) {
			return true;
		}

		return false;
	}

	/**
	 * @return bool
	 */
	public function wpmdbc_is_wpmdb_flush_call() {
		if (
			$this->wpmdbc_is_wpmdb_ajax_call() &&
			in_array( $_POST['action'], array( 'wpmdb_flush', 'wpmdb_remote_flush', ) )
		) {
			return true;
		}

		return false;
	}

	/**
	 * Should the current request be processed by Compatibility Mode?
	 *
	 * @return bool
	 */
	public function wpmdbc_is_compatibility_mode_request() {
		if ( $this->wpmdbc_is_wpmdb_rest_request() ) {
			return true;
		}

		if ( $this->wpmdbc_is_wpmdb_background_migration_request() ) {
			return true;
		}

		// Requests that shouldn't be handled by compatibility mode.
		if (
			! $this->wpmdbc_is_wpmdb_ajax_call() ||
			in_array(
				$_POST['action'],
				array(
					'wpmdb_get_log',
					'wpmdb_maybe_collect_data',
					'wpmdb_flush',
					'wpmdb_remote_flush',
					'wpmdb_get_themes',
					'wpmdb_get_plugins',
					'wpmdb_verify_connection_to_remote_site',
				)
			)
		) {
			return false;
		}

		return true;
	}

	/**
	 * Returns an array of plugin slugs that are allowed to be loaded.
	 *
	 * @param array $plugins
	 *
	 * @return array
	 */
	public function wpmdbc_get_whitelist_plugins( $plugins ) {
		$whitelist_plugins = [];

		if ( empty( $plugins ) || ! is_array( $plugins ) ) {
			return $whitelist_plugins;
		}

		$option = in_array( 'wpe-site-migration/wpe-site-migration.php', $plugins )
			? 'wpesm_settings'
			: 'wpmdb_settings';

		$wpmdb_settings = get_site_option( $option );

		if ( ! empty( $wpmdb_settings['whitelist_plugins'] ) && is_array( $wpmdb_settings['whitelist_plugins'] ) ) {
			$whitelist_plugins = array_flip( $wpmdb_settings['whitelist_plugins'] );
		}

		$whitelist_plugins = apply_filters( 'wpmdb_filter_whitelist_plugins', $whitelist_plugins );

		if ( is_array( $whitelist_plugins ) ) {
			return $whitelist_plugins;
		}

		return [];
	}

	/**
	 *
	 * Checks if $plugin is in the $whitelisted_plugins property array
	 *
	 * @param $plugin
	 * @param $whitelisted_plugins
	 *
	 * @return bool
	 */
	public function wpmdbc_plugin_in_default_whitelist( $plugin, $whitelisted_plugins ) {
		if ( ! is_array( $whitelisted_plugins ) ) {
			return false;
		}

		if ( in_array( $plugin, $whitelisted_plugins ) ) {
			return true;
		}

		// strpos() check to see if the item slug is in the current $plugin name
		foreach ( $whitelisted_plugins as $item ) {
			if ( false !== strpos( $plugin, $item ) ) {
				return true;
			}
		}

		return false;
	}
}
