<?php
define( 'IRIS_THEME_DIR', __DIR__ );
define( 'IRIS_THEME_URL', get_stylesheet_directory_uri() );

// Theme shortcode
require_once( IRIS_THEME_DIR . '/includes/shortcodes/blog-posts.php');
require_once( IRIS_THEME_DIR . '/includes/shortcodes/categories-posts.php');
require_once( IRIS_THEME_DIR . '/includes/shortcodes/author-post.php');
require_once( IRIS_THEME_DIR . '/includes/shortcodes/search-posts.php');
require_once( IRIS_THEME_DIR . '/includes/shortcodes/single-post-title.php');
require_once( IRIS_THEME_DIR . '/includes/shortcodes/single-post-details.php');
require_once( IRIS_THEME_DIR . '/includes/shortcodes/single-post-categories.php');
require_once( IRIS_THEME_DIR . '/includes/shortcodes/single-popular-blog-posts.php');
require_once( IRIS_THEME_DIR . '/includes/shortcodes/view-counter.php');
require_once( IRIS_THEME_DIR . '/includes/shortcodes/reviews.php');
require_once( IRIS_THEME_DIR . '/includes/shortcodes/latest-reviews.php');


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

	wp_register_style(
		'iris_single_post_style',
		IRIS_THEME_URL . '/assets/css/single-posts.css',
		array(),
		filemtime( IRIS_THEME_DIR . '/assets/css/single-posts.css' ),
	);
	wp_register_style(
		'iris_single_post_categories',
		IRIS_THEME_URL . '/assets/css/single-post-categories.css',
		array(),
		filemtime( IRIS_THEME_DIR . '/assets/css/single-post-categories.css' ),
	);
	wp_register_style(
		'iris_single_popular_blog_post',
		IRIS_THEME_URL . '/assets/css/single-popular-blog-posts.css',
		array(),
		filemtime( IRIS_THEME_DIR . '/assets/css/single-popular-blog-posts.css' ),
	);
	wp_register_style(
		'iris_cleaning_services_reviews',
		IRIS_THEME_URL . '/assets/css/reviews.css',
		array(),
		filemtime( IRIS_THEME_DIR . '/assets/css/reviews.css' ),
	);

}
add_action( 'wp_enqueue_scripts', 'irisx_theme_enqueue_frontend_scripts' );
