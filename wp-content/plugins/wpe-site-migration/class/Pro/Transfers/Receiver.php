<?php

namespace DeliciousBrains\WPMDB\Pro\Transfers;

use DeliciousBrains\WPMDB\Common\Debug;
use DeliciousBrains\WPMDB\Common\Error\ErrorLog;
use DeliciousBrains\WPMDB\Common\Exceptions\FileOperationException;
use DeliciousBrains\WPMDB\Common\Filesystem\Filesystem;
use DeliciousBrains\WPMDB\Common\Settings\Settings;
use DeliciousBrains\WPMDB\Common\Transfers\Files\Util;
use DeliciousBrains\WPMDB\Pro\Transfers\Files\Payload;
use Exception;
use Requests;
use Requests_Response;
use WP_Error;

class Receiver {
	public $remote;
	public $util;
	public $payload;
	public $tmpfile;
	public $tmpfile_path;

	protected $wpmdb_settings;

	/**
	 * @var ErrorLog
	 */
	private $error_log;

	/**
	 * @var Filesystem
	 */
	private $filesystem;

	function __construct(
		Util $util,
		Payload $payload,
		Settings $settings,
		ErrorLog $error_log,
		Filesystem $filesystem
	) {
		$this->wpmdb_settings = $settings->get_settings();
		$this->util           = $util;
		$this->payload        = $payload;
		$this->error_log      = $error_log;
		$this->filesystem     = $filesystem;
	}

	/**
	 * Set tmpfile class property to a stream handle to download payloads to
	 *
	 * @return void
	 * @throws FileOperationException
	 */
	public function set_tmp_file() {
		$this->tmpfile = Util::tmpfile();

		if ( empty( $this->tmpfile ) ) {
			throw new FileOperationException( __( 'Unable to create payload temporary file.', 'wp-migrate-db' ) );
		}
	}

	/**
	 *
	 * Create a stream resource in the php://memory stream
	 *
	 * @param $content
	 *
	 * @return bool|resource
	 */
	public static function create_memory_stream( $content ) {
		$stream = fopen( 'php://memory', 'rb+' );
		stream_copy_to_stream( $content, $stream );
		rewind( $stream );

		return $stream;
	}

	/**
	 * Send a request.
	 *
	 * @param array  $data
	 * @param string $url
	 *
	 * @return Requests_Response|WP_Error
	 * @throws Exception
	 */
	public function send_request( $data, $url ) {
		$requests_options = $this->util->get_requests_options();

		$this->set_tmp_file();

		// @TODO if other Requests hooks on 'curl.before_send' are invoked, this won't get called
		$hooks = new \Requests_Hooks();
		$hooks->register( 'curl.before_send', function ( $handle ) {
			curl_setopt( $handle, CURLOPT_CONNECTTIMEOUT, 0 );
			curl_setopt( $handle, CURLOPT_TIMEOUT, 0 );

			$stream = $this->tmpfile;

			// Save payload directly to tmp file to get around memory limits
			curl_setopt( $handle, CURLOPT_FILE, $stream );
		} );

		$requests_options['hooks'] = $hooks;

		$options = apply_filters( 'wpmdb_transfers_requests_options', $requests_options );

		try {
			$response = Requests::post( $url, array(), $data, $options );
		} catch ( Exception $e ) {
			return new WP_Error( 'wpmdb_error', $e->getMessage() );
		}

		// Use Requests interface to get response information
		$code = $response->status_code;

		// @TODO handle 500 error on remote
		if ( 200 !== $code ) {
			throw new Exception(
				sprintf(
					__( 'Remote server responded with %s and body of %s', 'wp-migrate-db' ),
					$code,
					$response->body
				)
			);
		}

		return $response;
	}

	/**
	 * Process a pushed payload.
	 *
	 * @param array    $state_data
	 * @param resource $content
	 *
	 * @return bool|array|WP_Error
	 */
	public function process_received_payload( $state_data, $content ) {
		return $this->payload->process_payload( $state_data, $content );
	}

	/**
	 * Grabs the payload received from a remote (on a pull) and sends it to be processed.
	 *
	 * @param $response
	 * @param $state_data
	 *
	 * @return array|WP_Error
	 */
	public function receive_stream_batch( $response, $state_data ) {
		$decoded_response = json_decode( $response->body );

		if ( isset( $decoded_response->wpmdb_error ) ) {
			throw new Exception( $decoded_response->msg );
		}

		$handle = $this->tmpfile;

		rewind( $handle );

		$meta = $this->payload->process_payload( $state_data, $handle, true );

		if ( is_wp_error( $meta ) ) {
			return $meta;
		}

		if ( ! $meta ) {
			Debug::log( __FUNCTION__ . ': decoded_response:' );
			Debug::log( $decoded_response );
			throw new Exception( __( 'Unable to process payload.', 'wp-migrate-db' ) );
		}

		fclose( $handle );

		return array( $response, $meta );
	}
}
