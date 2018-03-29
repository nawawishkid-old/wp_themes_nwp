<?php
/**
 * Temporary function for dev only
 */
function nwp_pretty_print( $data, $is_dump = false ) {
	echo '<pre>';
	$is_dump ? var_dump( $data ) : print_r( $data );
	echo '</pre>';
}