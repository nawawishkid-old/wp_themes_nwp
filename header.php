<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php nwp_ui( 'nav_bar', 'nwp_nav-bar-1' ); ?>
	<?php nwp_ui( 'sidebar', 'nwp_sidebar-1' ); ?>
	<!-- <header>
		<img src="<?php header_image(); ?>">
	</header> -->
	<?php //get_sidebar(); ?>