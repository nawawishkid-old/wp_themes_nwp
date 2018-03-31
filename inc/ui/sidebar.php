<?php

function nwp_ui_sidebar( $id ) {
?>
<!-- Use get_theme_mod to define class left or right -->
<div id="<?php echo $id; ?>" class="nwp_sidebar right" data-nwp-ui-sidebar>
	<section class="p-3">
		<?php nwp_ui( 'search_bar', 'nwp_search-bar-2' ); ?>
		<h1><?php _e( 'Menu', 'nwp' ); ?></h1>
	</section>
	<section>
		<?php get_sidebar(); ?>
	</section>
	<div class="background"></div>
</div>

<?php
}
