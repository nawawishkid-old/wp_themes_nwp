<?php

add_action( 'after_setup_theme', 'nwp_support' );

function nwp_support() {

    /**
     * Add default posts and comments RSS feed links to head.
     */
    add_theme_support( 'automatic-feed-links' );

    /**
     * Enable user to select format of currently edit post.
     */
    add_theme_support( 'post-formats', [
        'aside', 'image',
        'video', 'quote',
        'link', 'gallery',
        'audio',
    ]);

    /**
     * Add theme support for selective refresh for widgets.
     */
    //add_theme_support( 'customize-selective-refresh-widgets' );

    /**
     * Enable post featured image
     */
    add_theme_support( 'post-thumbnails' );
    //add_image_size( 'twentyseventeen-featured-image', 2000, 1200, true );
    //add_image_size( 'twentyseventeen-thumbnail-avatar', 100, 100, true );

    // Set the default content width.
    //$GLOBALS['content_width'] = 525;

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus([
            'top'    => __( 'Top Menu', 'nwp' ),
            'social' => __( 'Social Links Menu', 'nwp' ),
    ]);

    /*
     * This theme styles the visual editor to resemble the theme style,
     * specifically font, colors, and column width.
     */
    //add_editor_style( ['assets/css/editor-style.css', twentyseventeen_fonts_url()] );

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
     *              $custom_logo_id = get_theme_mod( 'custom_logo' );
     *              $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
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

    /**
     * This feature enables plugins and themes to manage the document title tag.
     */
    add_theme_support( 'title-tag' );

    /**
     * Define and register starter content to showcase the theme on new sites.
     */
    //add_theme_support( 'starter-content', $starter_content );
}