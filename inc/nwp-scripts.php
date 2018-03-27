<?php

add_action( 'wp_enqueue_scripts', function() {
	$dir = get_stylesheet_directory_uri() . '/assets/';
	wp_enqueue_script( 'nwp-bootstrap', $dir . 'js/bootstrap.min.js' );
	wp_enqueue_style( 'nwp-bootstrap', $dir . 'css/bootstrap.min.css' );
	wp_enqueue_style( 'nwp-style', get_stylesheet_uri() );
	wp_enqueue_script( 'nwp-comment', $dir . 'js/nwp-comment.js' );
});

add_action( 'comment_form_before', function() {
    if ( get_option( 'thread_comments' ) ) { 
        //wp_enqueue_script( 'comment-reply' ); 
    }
});

add_action( 'after_setup_theme', function() {
	load_theme_textdomain( 'nwp', get_template_directory() . '/languages' );
});

add_action( 'comment_form_top', function() {
	echo '<h1>Hello!</h1>';
});

/*add_filter( 'comment_form_submit_button', function( $btn, $args ) {
	return 10;
}, 10, 2);*/



/**
 * Temporary function for dev only
 */
function pretty_print( $data, $is_dump = false ) {
	echo '<pre>';
	$is_dump ? var_dump( $data ) : print_r( $data );
	echo '</pre>';
}