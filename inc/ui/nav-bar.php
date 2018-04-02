<?php

function nwp_ui_nav_bar( $id ) {
$is_nav_sticky = get_theme_mod( 'nwp_class_nav_bar-sticky', true );

?>
<!-- <a href="<?php echo site_url(); ?>">
	<?php echo get_bloginfo( 'name' ); ?>
	<?php the_custom_logo(); ?>
	<?php wp_nav_menu( array( 'theme_location' => 'social' ) ); ?>
				<?php wp_nav_menu( array( 'theme_location' => 'top' ) ); ?>
</a> -->

<div id="<?php echo $id; ?>" class="nwp_nav-bar-placeholder">
	<nav class="nwp_nav-bar <?php echo $is_nav_sticky ? 'fixed' : ''; ?>">
		<div class="px-3 px-md-5 row no-gutters">
			<div class="col-6 col-sm-3">
				<?php nwp_ui( 'brand_name', 'nwp_brand-name-1' ); ?>
			</div>
			<div class="d-none d-sm-flex col-sm-6 justify-content-center">
				<?php nwp_ui( 'search_bar', 'nwp_search-bar-1' ); ?>
			</div>
			<div class="col-6 col-sm-3 justify-content-end">
				<!--?php nwp_ui( 'sidebar_trigger', 'nwp_sidebar-trigger-1' ); ?-->
				<?php
					$trg1 = new NavSidebarTrigger( 'trigger-1' );
					$trg2 = new NavSidebarTrigger( 'trigger-2' );

					$trg1->markup();
					$trg2->markup();
				?>
			</div>
		</div>
	</nav>
</div>

<?php
}
?>