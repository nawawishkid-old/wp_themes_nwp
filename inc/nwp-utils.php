<?php
/**
 * Temporary function for dev only
 */
function nwp_pretty_print( $data, $is_dump = false ) {
	echo '<pre>';
	$is_dump ? var_dump( $data ) : print_r( $data );
	echo '</pre>';
}

function nwp_ui( $path ) {
	$dir = get_template_directory() . '/inc/ui/';
	nwp_include( $dir, $path . '.php' );
}

function nwp_img( $path ) {
	$dir = get_template_directory() . '/assets/img/';
	nwp_include( $dir, $path );
}

function nwp_include( $dir, $path ) {
	$filepath = $dir . $path;

	if ( ! file_exists( $filepath ) )
		throw new Exception("Resource not found: $filepath");
		
	include $filepath;
}