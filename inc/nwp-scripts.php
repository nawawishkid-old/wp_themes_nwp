<?php

add_action( 'wp_enqueue_scripts', function() {
	$dir = get_stylesheet_directory_uri() . '/assets/';
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



/**
 * Temporary function for dev only
 */
function pretty_print( $data, $is_dump = false ) {
	echo '<pre>';
	$is_dump ? var_dump( $data ) : print_r( $data );
	echo '</pre>';
}