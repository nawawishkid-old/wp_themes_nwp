<?php

add_action( 'wp_enqueue_scripts', function() {
	$dir = get_stylesheet_directory_uri() . '/assets/';
	wp_enqueue_script( 'nwp-bootstrap', $dir . 'js/bootstrap.min.js' );
	wp_enqueue_style( 'nwp-bootstrap', $dir . 'css/bootstrap.min.css' );
	wp_enqueue_style( 'nwp-style', get_stylesheet_uri() );
	wp_enqueue_script( 'nwp-comment', $dir . 'js/nwp-comment.js' );
});