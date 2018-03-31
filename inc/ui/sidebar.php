<?php

function nwp_ui_sidebar( $id, $is_left = true ) {
	$side = $is_left ? 'left' : 'right';
?>
<!-- Use get_theme_mod to define class left or right -->
<div id="<?php echo $id; ?>" class="nwp_sidebar <?php echo $side; ?>" data-nwp-ui-sidebar>
	<div class="wrapper p-3">
		<section class="pb-3">
			<?php nwp_ui( 'search_bar', 'nwp_search-bar-2_' . $id ); ?>
			<h1 class="header"><?php _e( 'Menu', 'nwp' ); ?></h1>
		</section>
		<section class="pb-3">
			<?php get_sidebar(); ?>
		</section>
	</div>
	<div class="background" data-nwp-ui-sidebar-background></div>
</div>

<?php
}
