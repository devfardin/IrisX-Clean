<?php
define( 'IRIS_THEME_DIR', __DIR__ );
define( 'IRIS_THEME_URL', get_stylesheet_directory_uri() );

/**
 * Frontend Styles and Scripts
 */
function irisx_theme_enqueue_frontend_scripts() {
	wp_enqueue_style(
		'meti',
		IRIS_THEME_URL . '/assets/css/main.css',
		array(),
		filemtime( IRIS_THEME_DIR . '/assets/css/main.css' )
	);

}
add_action( 'wp_enqueue_scripts', 'irisx_theme_enqueue_frontend_scripts' );