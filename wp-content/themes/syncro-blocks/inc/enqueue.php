<?php
$screen_asset = include get_theme_file_path( 'build/css/screen.asset.php' );
// Load front-end assets.
add_action( 'wp_enqueue_scripts', 'syncro_blocks_assets' );

function syncro_blocks_assets() {
	$asset = include get_theme_file_path( 'build/css/screen.asset.php' );

	wp_enqueue_style(
		'syncro-blocks-style',
		get_theme_file_uri( 'build/css/screen.css' ),
		$asset['dependencies'],
		$asset['version']
	);

	$script_asset = include get_theme_file_path( 'build/js/screen.asset.php'  );

	wp_enqueue_script(
		'syncro-blocks',
		get_theme_file_uri( 'build/js/screen.js' ),
		$script_asset['dependencies'],
		$script_asset['version'],
		true
	);

}

// Load editor stylesheets.
add_action( 'after_setup_theme', 'syncro_blocks_editor_styles' );

function syncro_blocks_editor_styles() {
	add_editor_style( [
		get_theme_file_uri( 'build/css/screen.css' )
	] );
}

// Load editor scripts.
add_action( 'enqueue_block_editor_assets', 'syncro_blocks_editor_assets' );

function syncro_blocks_editor_assets() {
	$script_asset = include get_theme_file_path( 'build/js/editor.asset.php'  );
	$style_asset  = include get_theme_file_path( 'build/css/editor.asset.php' );

	wp_enqueue_script(
		'syncro-blocks-editor',
		get_theme_file_uri( 'build/js/editor.js' ),
		$script_asset['dependencies'],
		$script_asset['version'],
		true
	);

	wp_enqueue_style(
		'syncro-blocks-editor',
		get_theme_file_uri( 'build/css/editor.css' ),
		$style_asset['dependencies'],
		$style_asset['version']
	);
}