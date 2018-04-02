<?php

add_action( 'wp_enqueue_scripts', function() {
	$dir = get_stylesheet_directory_uri() . '/assets/';

	// !!! DO NOT REPLACE WORDPRESS DEFAULT LIBRARIES WITH NEWER VERSION !!!
	// see https://developer.wordpress.org/themes/advanced-topics/javascript-best-practices/#use-included-libraries
	// wp_deregister_script( 'jquery' );
	// wp_enqueue_script( 'nwp-jquery', $dir . 'js/jquery.min.js' );

	wp_enqueue_script( 'nwp-bootstrap', $dir . 'js/bootstrap.min.js' );
	wp_enqueue_style( 'nwp-bootstrap', $dir . 'css/bootstrap.min.css' );
	wp_enqueue_style( 'nwp-style', get_stylesheet_uri() );
	wp_enqueue_script( 'nwp', $dir . 'js/nwp.js' );
	wp_enqueue_script( 'nwp-components', $dir . 'js/nwp-components.js' );
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
