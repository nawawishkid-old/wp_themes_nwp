<?php

if ( ! is_active_sidebar( 'sidebar-right' ) ) : ?>

<h1>Sidebar is not active.</h1>

<?php
	//return;
endif;

dynamic_sidebar( 'sidebar-right' );
?>

<h1>This is sidebar.</h1>