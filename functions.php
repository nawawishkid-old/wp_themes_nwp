<?php

use WPComponent\Bundle;

require_once 'inc/nwp-utils.php';
autoload( __DIR__ . '/inc/*.php', [
	'nwp-utils.php',
	'style.php',
	'content-callback.php'
] );


	//nwp_pretty_print(get_pages());

/**
 * Register UI Component and its customizer
 */
Bundle::addComponent( new NavSidebar( 'nav-sidebar-1' ) );
Bundle::addComponent( new NavTopbar( 'nav-topbar-1' ) );
Bundle::addComponent( new Page( 'page-1' ) );
Bundle::addComponent( new PageList( 'page-list-1' ) );
Bundle::addComponent( new PageList( 'page-list-2' ) );
Bundle::addComponent( new Footer( 'footer-1' ) );
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
		'before_title'  => '<span class="d-none">',
		'after_title'   => '</span>',
	) );

}
