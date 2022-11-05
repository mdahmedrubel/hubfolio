<?php 
/**
 * Hubfolio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Hubfolio
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Enqueue scripts and styles.
 */
function hubfolio_scripts() {
	wp_enqueue_style('google_font', '//fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
	wp_enqueue_style( 'hubfolio-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'hubfolio-style', 'rtl', 'replace' );

	wp_enqueue_style('bootstrap-css' ,get_template_directory_uri()  .'/assets/css/bootstrap.min.css', array(), false);
	wp_enqueue_style('all-min-css' ,get_template_directory_uri()  .'/assets/css/all.css', array(), false);
	wp_enqueue_style('style-css' ,get_template_directory_uri()  .'/assets/css/style.css', array(), false);
	wp_enqueue_style('responsive-css' ,get_template_directory_uri()  .'/assets/css/responsive.css', array(), false);


	wp_enqueue_script( 'jquery-js', get_template_directory_uri() .'/assets/js/jquery-3.6.0.min.js', array(), '3.6.0', true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'isotop-js', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'masonry-js', get_template_directory_uri() . '/assets/js/masonry.pkgd.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/assets/js/custom.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'navigation-js', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hubfolio_scripts' );