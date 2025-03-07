<?php

namespace DeliciousBrains\WPMDB\Pro\MF;

use DeliciousBrains\WPMDB\Data\Stage;
use DeliciousBrains\WPMDB\Pro\Transfers\Files\PluginHelper;

class MediaFilesRemote {
	/**
	 * @var PluginHelper
	 */
	private $plugin_helper;

	public function __construct(
		PluginHelper $plugin_helper
	) {
		$this->plugin_helper = $plugin_helper;
	}

	public function register() {
		// Remote AJAX handlers
		add_action(
			'wp_ajax_nopriv_wpmdbmf_respond_to_get_remote_media',
			array( $this, 'respond_to_get_remote_media' )
		);

		add_action( 'wp_ajax_nopriv_wpmdbmf_transfers_send_file', array( $this, 'ajax_mf_respond_to_request_files', ) );
		add_action( 'wp_ajax_nopriv_wpmdbmf_transfers_receive_file', array( $this, 'ajax_mf_respond_to_post_file' ) );
	}

	/**
	 * @return void
	 */
	public function respond_to_get_remote_media() {
		$this->plugin_helper->respond_to_get_remote_folders( Stage::MEDIA_FILES );
	}

	public function ajax_mf_respond_to_request_files() {
		$this->plugin_helper->respond_to_request_files();
	}

	public function ajax_mf_respond_to_post_file() {
		$this->plugin_helper->respond_to_post_file();
	}
}
