<?php

function themeInit() {

	// allow editor style
	add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

	// let's get language support going, if you need it
	load_theme_textdomain( 'bonestheme', get_template_directory() . '/library/translation' );

	// launching operation cleanup (library/bones.php)
	add_action( 'init', 'bones_head_cleanup' );

	// a better title (library/bones.php)
	add_filter( 'wp_title', 'rw_title', 10, 3 );

	// remove wp version from rss (library/bones.php)
	add_filter( 'the_generator', 'bones_rss_version' );

	// remove pesky injected css for recent comments widget (library/bones.php)
	add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );

	// clean up comment styles in the head (library/bones.php)
	add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );

	// clean up gallery output in wp (library/bones.php)
	add_filter( 'gallery_style', 'bones_gallery_style' );

	// enqueue base scripts and styles (library/bones.php)
	// add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );

	// launching this stuff after theme setup (library/bones.php)
	bones_theme_support();

	// cleaning up random code around images
	add_filter( 'the_content', 'bones_filter_ptags_on_images' );

	// cleaning up excerpt
	add_filter( 'excerpt_more', 'bones_excerpt_more' );

	// add filter to prevent "slack.png" from occupying the "slack" slug
	add_filter( 'wp_unique_post_slug_is_bad_attachment_slug', '__return_true' );


}

add_action( 'after_setup_theme', 'themeInit' );


// Page Slug Body Class
function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
}

add_filter( 'body_class', 'add_slug_body_class' );