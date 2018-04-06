<?php

use WPComponent\Bundle;

require_once 'inc/nwp-utils.php';
autoload( __DIR__ . '/inc/*.php', [
	'nwp-utils.php',
	'style.php',
	'content-callback.php'
] );

/**
 * Actions
 */
add_action( 'widgets_init', 'arphabet_widgets_init' );

/**
 * Register UI Component and its customizer.
 */
Bundle::addComponent( new NavSidebar( 'nav-sidebar-1' ) );
Bundle::addComponent( new NavTopbar( 'nav-topbar-1' ) );
Bundle::addComponent( new Page( 'page-1' ) );
Bundle::addComponent( new PageList( 'page-list-1' ) );
Bundle::addComponent( new PageList( 'page-list-2' ) );
Bundle::addComponent( new PostCard( 'post-card-1' ) );
Bundle::addComponent( new Footer( 'footer-1' ) );
Bundle::addComponent( new CommentMolecule( 'comment-molecule-1' ) );
Bundle::addComponent( new CommentOrganism( 'comment-organism-1' ) );
Bundle::addComponent( new CommentReplyMolecule( 'comment-reply-molecule-1' ) );

/**
 * Add global customizer
 */
/**
 * Colors customizer
 */
Bundle::addCustomizer(function( $c, $panel ) {
	$c->add_section( 'nwp_section_colors' , [
		'title' => __( 'Colors', 'nwp' ),
		'panel' => $panel
	]);

	/**
	 * Primary color
	 */
	$c->add_setting( 'nwp_setting_color-pri', [
		'type' => 'theme_mod',
		'default' => '#0096ff'
	]);

	$c->add_control( 'nwp_control_color-pri', [
		'type' => 'color',
		'section' => 'nwp_section_colors',
		'settings' => 'nwp_setting_color-pri',
		'label' => __( 'Primary color' ),
		'description' => __( 'The primary color of the theme.' ),
		'input_attrs' => [
			'class' => 'form-control'
		]
	]);
	/**
	 * End Primary color
	 */


	/**
	 * White primary color
	 */
	$c->add_setting( 'nwp_setting_color-pri-white', [
		'type' => 'theme_mod',
		'default' => '#f8fcfd'
	]);

	$c->add_control( 'nwp_control_color-pri-white', [
		'type' => 'color',
		'section' => 'nwp_section_colors',
		'settings' => 'nwp_setting_color-pri-white',
		'label' => __( 'White primary color' ),
		'description' => __( 'The primary color in a white tint.' ),
		'input_attrs' => [
			'class' => 'form-control'
		]
	]);
	/**
	 * End White primary color
	 */


	/**
	 * Dark primary color
	 */
	$c->add_setting( 'nwp_setting_color-pri-dark', [
		'type' => 'theme_mod',
		'default' => '#001e31'
	]);

	$c->add_control( 'nwp_control_color-pri-dark', [
		'type' => 'color',
		'section' => 'nwp_section_colors',
		'settings' => 'nwp_setting_color-pri-dark',
		'label' => __( 'Dark primary color' ),
		'description' => __( 'The primary color in a dark shade.' ),
		'input_attrs' => [
			'class' => 'form-control'
		]
	]);
	/**
	 * End Dark primary color
	 */


	/**
	 * Light primary color
	 */
	$c->add_setting( 'nwp_setting_color-pri-light', [
		'type' => 'theme_mod',
		'default' => '#0167ab'
	]);

	$c->add_control( 'nwp_control_color-pri-light', [
		'type' => 'color',
		'section' => 'nwp_section_colors',
		'settings' => 'nwp_setting_color-pri-light',
		'label' => __( 'Light primary color' ),
		'description' => __( 'The primary color in a light tint.' ),
		'input_attrs' => [
			'class' => 'form-control'
		]
	]);
	/**
	 * End Light primary color
	 */
});
/**
 * Text customizer
 */
Bundle::addCustomizer(function( $c, $panel ) {
	$c->add_section( 'nwp_section_text' , [
		'title' => __( 'Text', 'nwp' ),
		'panel' => $panel
	]);

	/**
	 * Font size
	 */
	$c->add_setting( 'nwp_setting_text-font-size', [
		'type' => 'theme_mod',
		'default' => '16px',
		'sanitize_callback' => 'sanitize_text_setting'
	]);

	$c->add_control( 'nwp_control_text-font-size', [
		'type' => 'text',
		'section' => 'nwp_section_text',
		'settings' => 'nwp_setting_text-font-size',
		'label' => __( 'Base font size.' ),
		'description' => __( 'The base font size of the theme.' ),
		'input_attrs' => [
			'class' => 'form-control'
		]
	]);
	/**
	 * End Font size
	 */

	/**
	 * Font size
	 */
	$c->add_setting( 'nwp_setting_text-line-height', [
		'type' => 'theme_mod',
		'default' => '20px',
		'sanitize_callback' => 'sanitize_text_setting'
	]);

	$c->add_control( 'nwp_control_text-line-height', [
		'type' => 'text',
		'section' => 'nwp_section_text',
		'settings' => 'nwp_setting_text-line-height',
		'label' => __( 'Base line height.' ),
		'description' => __( 'The base line height of the theme.' ),
		'input_attrs' => [
			'class' => 'form-control'
		]
	]);
	/**
	 * End Font size
	 */
});

Bundle::build();

/**
 * Functions
 */
/**
 *
 */
function sanitize_text_setting( $input ) {
	if ( ! isset( $input ) || empty( $input ) 
		|| is_null( $input ) || ! is_string( $input ) 
	   ) 
	{
		return 'initial';
	}

	$input = sanitize_text_field( $input );

	$is_match = preg_match( '/^(\d{1,2})(px|em|rem|%)?$/', $input, $matches );

	return ! $is_match ? 'initial' : ( $matches[2] ? $input : ( $matches[1] ? $matches[1] . 'px' : 'initial' ) );
}

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
