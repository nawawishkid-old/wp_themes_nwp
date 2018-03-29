<?php

add_action( 'wp_enqueue_scripts', function() {
	$dir = get_stylesheet_directory_uri() . '/assets/';

	// WordPress jQuery is outdated
	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'nwp-jquery', $dir . 'js/jquery.min.js' );
	wp_enqueue_script( 'nwp-bootstrap', $dir . 'js/bootstrap.min.js' );
	wp_enqueue_style( 'nwp-bootstrap', $dir . 'css/bootstrap.min.css' );
	wp_enqueue_style( 'nwp-style', get_stylesheet_uri() );
	wp_enqueue_script( 'nwp', $dir . 'js/nwp.js' );
});

add_action( 'comment_form_before', function() {
    if ( get_option( 'thread_comments' ) ) { 
        //wp_enqueue_script( 'comment-reply' ); 
    }
});

add_action( 'after_setup_theme', function() {
	load_theme_textdomain( 'nwp', get_template_directory() . '/languages' );
});

// Add user style configuration
add_action( 'wp_head', function() {
	$css = require 'style.php';

	echo <<<STYLE
<style type="text/css" id="nwp-user-style">
	$css
</style>
STYLE;
}, 200);

/**
 * Enqueue style into the Customizer page
 */
add_action( 'customize_controls_enqueue_scripts', function() {
	$dir = get_stylesheet_directory_uri() . '/assets/';

	wp_enqueue_script( 'nwp-bootstrap', $dir . 'js/bootstrap.min.js' );
	wp_enqueue_style( 'nwp-bootstrap', $dir . 'css/bootstrap.min.css' );
	//wp_enqueue_style( 'nwp-style', get_stylesheet_uri() );
	//wp_enqueue_script( 'nwp', $dir . 'js/nwp.js' );
});
