<?php
function autoload( $path, $user_excludes = [] ) {
	$excludes = [];
	$excludes = array_merge( $excludes, (array) $user_excludes );

	foreach ( glob( $path ) as $name ) {
		if ( in_array( basename( $name ), $excludes ) ) {
			continue;
		}

		include $name;
	}
}
/**
 * Temporary function for dev only
 */
function nwp_pretty_print( $data, $is_dump = false ) {
	echo '<pre>';
	$is_dump ? var_dump( $data ) : print_r( $data );
	echo '</pre>';
}

function nwp_ui( $name, $callback_args = [] ) {
	call_user_func_array( 'nwp_ui_' . $name, (array) $callback_args );
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