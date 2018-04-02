<?php

add_action( 'customize_register', 'customizer_callback' );

function customizer_callback( $c ) {

	$c->add_section( 'nwp_section' , [
		'title' => __( 'NWP Theme', 'nwp' ),
		'description' => '<p>NWP Theme Customization</p>', 
		'priority' => 0
	]);

	$c->add_setting( 'nwp_class_nav_bar-sticky', [
		'type' => 'theme_mod',
		'default' => true
	]);

	$c->add_setting( 'nwp_class_page-title', [
		'type' => 'theme_mod',
		'default' => true
	]);

	$c->add_setting( 'nwp_class_sidebar-left', [
		'type' => 'theme_mod',
		'default' => true
	]);

	$c->add_control( 'nwp_control_class_nav_bar-sticky', [
		'type' => 'checkbox',
		'section' => 'nwp_section',
		'settings' => 'nwp_class_nav_bar-sticky',
		'label' => __( 'Sticky Navigation Bar' ),
		'description' => __( 'Make navigation bar sticky.' )
	]);

	$c->add_control( 'nwp_control_class_page-title', [
		'type' => 'checkbox',
		'section' => 'nwp_section',
		'settings' => 'nwp_class_page-title',
		'label' => __( 'Display page title' ),
		'description' => __( 'If on, page title will display.' )
	]);

	$c->add_control( 'nwp_control_class_sidebar-left', [
		'type' => 'checkbox',
		'section' => 'nwp_section',
		'settings' => 'nwp_class_sidebar-left',
		'label' => __( 'Keep side navigation bar on left.' ),
		'description' => __( 'If unchecked, it will be on the right side of the page.' )
	]);

	/*$c->add_panel( 'nwp_panel', [
		'title' => __( 'NWP Theme' ),
		'description' => '<p>NWP Theme Customization</p>', // Include html tags such as <p>.
		'priority' => 0, // Mixed with top-level-section hierarchy.
		'capability' => 'edit_theme_options',
	]);*/

	/*$c->add_section( 'nwp_section_colors' , [
		'title' => __( 'Colors', 'nwp' ),
		'panel' => 'nwp_panel'
	]);

	$c->add_section( 'nwp_section_fonts' , [
		'title' => __( 'Fonts', 'nwp' ),
		'panel' => 'nwp_panel'
	]);*/

	/**
	 * Settings
	 */
	/*$c->add_setting( 'nwp_cssvar_pri', [
		'type' => 'theme_mod',
		'default' => '#0096ff'
	]);

	$c->add_setting( 'nwp_cssvar_pri-light', [
		'type' => 'theme_mod',
		'default' => '#00aaff'
	]);

	$c->add_setting( 'nwp_cssvar_pri-dark', [
		'type' => 'theme_mod',
		'default' => '#0078c8'
	]);

	// Fonts
	$c->add_setting( 'nwp_cssvar_font-size', [
		'type' => 'theme_mod',
		'default' => '16px',
		'sanitize_callback' => 'sanitize_font_setting'
	]);

	$c->add_setting( 'nwp_cssvar_line-height', [
		'type' => 'theme_mod',
		'default' => '20px',
		'sanitize_callback' => 'sanitize_font_setting'
	]);*/

	/**
	 * Controls
	 */
	/*$c->add_control( 'nwp_control_cssvar_pri', [
		'type' => 'color',
		'section' => 'nwp_section_colors',
		'settings' => 'nwp_cssvar_pri',
		'label' => __( 'Primary color' ),
		'description' => __( 'The primary color of the theme.' ),
		'input_attrs' => [
			'class' => 'form-control'
		]
	]);

	$c->add_control( 'nwp_control_cssvar_pri-light', [
		'type' => 'color',
		'section' => 'nwp_section_colors',
		'settings' => 'nwp_cssvar_pri-light',
		'label' => __( 'Primary color light' ),
		'description' => __( 'The lighter primary color of the theme.' ),
		'input_attrs' => [
			'class' => 'form-control'
		]
	]);

	$c->add_control( 'nwp_control_cssvar_pri-dark', [
		'type' => 'color',
		'section' => 'nwp_section_colors',
		'settings' => 'nwp_cssvar_pri-dark',
		'label' => __( 'Primary color dark' ),
		'description' => __( 'The darker primary color of the theme.' ),
		'input_attrs' => [
			'class' => 'form-control'
		]
	]);

	// Fonts
	$c->add_control( 'nwp_control_cssvar_font-size', [
		'type' => 'text',
		'section' => 'nwp_section_fonts',
		'settings' => 'nwp_cssvar_font-size',
		'label' => __( 'Base font size' ),
		'description' => __( 'The base font size of the theme.' ),
		'input_attrs' => [
			'class' => 'form-control'
		]
	]);

	$c->add_control( 'nwp_control_cssvar_line-height', [
		'type' => 'text',
		'section' => 'nwp_section_fonts',
		'settings' => 'nwp_cssvar_line-height',
		'label' => __( 'Base line height' ),
		'description' => __( 'The base line height of the theme.' ),
		'input_attrs' => [
			'class' => 'form-control'
		]
	]);*/
}

/*function sanitize_font_setting( $input ) {
	if ( ! isset( $input ) || empty( $input ) 
		|| is_null( $input ) || ! is_string( $input ) 
	   ) 
	{
		return 'initial';
	}

	$input = sanitize_text_field( $input );

	$is_match = preg_match( '/^(\d{1,2})(px|em|rem|%)?$/', $input, $matches );

	return ! $is_match ? 'initial' : ( $matches[2] ? $input : ( $matches[1] ? $matches[1] . 'px' : 'initial' ) );
}*/