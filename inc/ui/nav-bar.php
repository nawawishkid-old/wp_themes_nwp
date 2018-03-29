<?php

$is_nav_sticky = get_theme_mod( 'nwp_class_nav_bar-sticky', 'on' );

?>
<!-- <a href="<?php echo site_url(); ?>">
	<?php echo get_bloginfo( 'name' ); ?>
	<?php the_custom_logo(); ?>
	<?php wp_nav_menu( array( 'theme_location' => 'social' ) ); ?>
				<?php wp_nav_menu( array( 'theme_location' => 'top' ) ); ?>
</a> -->

<div class="nwp_nav-bar-placeholder">
	<nav class="nwp_nav-bar <?php echo $is_nav_sticky ? 'fixed' : ''; ?>">
		<div class="px-5 row">
			<div class="col-4">
				<?php nwp_ui( 'brand-name' ); ?>
			</div>
			<div class="col-4 justify-content-center">
				<?php nwp_ui( 'search-bar' ); ?>
			</div>
			<div class="col-4 justify-content-end">
				<?php nwp_ui( 'nav-menu' ); ?>
			</div>
		</div>
	</nav>
</div>