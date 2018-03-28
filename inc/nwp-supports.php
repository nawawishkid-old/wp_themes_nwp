<?php

/**
 * Enable user to select format of currently edit post.
 */
add_theme_support( 'post-formats', ['aside', 'video'] );

/**
 * Enable post featured image
 */
add_theme_support( 'post-thumbnails' );

/**
 * Enable background image & color customization.
 */
$defaults = array(
    'default-image' => '',
    'default-preset' => 'default',
    'default-position-x' => 'left',
    'default-position-y' => 'top',
    'default-size' => 'auto',
    'default-repeat' => 'repeat',
    'default-attachment' => 'scroll',
    'default-color' => 'ff0000',
    'admin-head-callback' => '',
    'admin-preview-callback' => '',
);
$args = array(
	'default-color' => '000000',
	'default-image' => 'https://instagram.fbkk1-2.fna.fbcdn.net/vp/164f10e37017019323fa3e0dc81fabe8/5B6ED22B/t51.2885-15/sh0.08/e35/p640x640/29401925_224193371656886_4149783700449525760_n.jpg',
);
add_theme_support( 'custom-background', $defaults );

/**
 * Enable user to choose page header image
 *
 * Usage: <img src="<?php header_image(); ?>">
 */
$defaults = array(
    'default-image' => '',
    'random-default' => false,
    'width' => 0,
    'height' => 0,
    'flex-height' => false,
    'flex-width' => false,
    'default-text-color' => '',
    'header-text' => true,
    'uploads' => true,
    'wp-head-callback' => '',
    'admin-head-callback' => '',
    'admin-preview-callback' => '',
    'video' => false,
    'video-active-callback' => 'is_front_page',
);
add_theme_support( 'custom-header', $defaults );

/**
 * Enable user to choose site logo
 *
 * Usage:
 *      1) Get custom logo URL:
 *          <?php
     *          $custom_logo_id = get_theme_mod( 'custom_logo' );
     *          $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
 *          ?>
 *          <img src="<?php echo $image[0]; ?>>
 *      2) Display custom logo markup
 *          the_custom_logo();
 *      3) Return custom logo markup
 *          get_custom_logo();
 */
add_theme_support( 'custom-logo', array(
    'height'      => 100,
    'width'       => 400,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
) );

/*
 * Allows the use of HTML5 markup 
 * for the search forms, comment forms, comment lists, gallery, and caption.
 */
add_theme_support( 'html5', [
    'comment-list', 'comment-form', 'search-form', 'gallery', 'caption'
]);