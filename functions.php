<?php

use WPComponent\Bundle;

require_once 'inc/nwp-utils.php';
autoload( __DIR__ . '/inc/*.php', [
	'nwp-utils.php',
	'style.php',
	'content-callback.php'
] );

/**
 * Register UI Component and its customizer
 */
Bundle::addComponent( new NavSidebar( 'nav-sidebar-1' ) );
Bundle::addComponent( new NavTopbar( 'nav-topbar-1' ) );
Bundle::addComponent( new Page( 'page-1' ) );
Bundle::buildCustomizer();

add_action( 'widgets_init', 'arphabet_widgets_init' );

/**
 * Functions
 */

/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Home right sidebar',
		'id'            => 'sidebar-right',
		'description'   => 'This is side bar description',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
