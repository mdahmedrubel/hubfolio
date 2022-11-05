<?php
/*hfolio setup*/
require get_template_directory() . '/inc/includes/hubfolio-enqueue.php';
require get_template_directory() . '/inc/includes/hubfolio-theme-setup.php';
require get_template_directory() . '/inc/includes/hubfolio-hooks.php';
require get_template_directory() . '/inc/bootstrap-navwalker/portfolio-bootstrap-navwalker.php';
require get_template_directory() . '/inc/hfolio-activation/hfolio-activation.php';
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/*comments template*/
require_once get_template_directory(). '/inc/comments/comments-template.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function get_max_num_pages(){
	global $wp_query;
	return $wp_query->max_num_pages;
}

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Portfolio Settings',
		'menu_title'	=> 'Portfolio Options',
		'parent_slug'	=> 'theme-general-settings',
	));

}

/*blog comment form replace*/
function move_comment_field( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields', 'move_comment_field' );

