<?php
define( 'IRIS_THEME_DIR', __DIR__ );
define( 'IRIS_THEME_URL', get_stylesheet_directory_uri() );

// Theme shortcode
require_once( IRIS_THEME_DIR . '/includes/shortcodes/blog-posts.php');
require_once( IRIS_THEME_DIR . '/includes/shortcodes/categories-posts.php');
require_once( IRIS_THEME_DIR . '/includes/shortcodes/author-post.php');
require_once( IRIS_THEME_DIR . '/includes/shortcodes/search-posts.php');


/** 
 * Frontend Styles and Scripts
 */
function irisx_theme_enqueue_frontend_scripts() {
	wp_enqueue_style(
		'iris_main_style',
		IRIS_THEME_URL . '/assets/css/main.css',
		array(),
		filemtime( IRIS_THEME_DIR . '/assets/css/main.css' ),
	);
	// Register blog post style
	wp_register_style(
		'iris_blog_posts',
		IRIS_THEME_URL . '/assets/css/blog-posts.css',
		array(),
		filemtime( IRIS_THEME_DIR . '/assets/css/blog-posts.css' ),
	);

}
add_action( 'wp_enqueue_scripts', 'irisx_theme_enqueue_frontend_scripts' );