<?php

function nwp_ui_search_bar( $id ) {
?>
<div id="<?php echo $id; ?>" class="nwp_search-bar d-flex align-items-center">
	<span class="nwp_icon h-100">
		<div class="position-relative d-flex justify-content-center align-items-center h-100 w-100">
			<?php nwp_img( 'icon-magnifier.svg' ); ?>
		</div>
	</span>
	<input type="text" 
			name="nwp_search-bar" 
			placeholder="<?php _e( 'Search', 'nwp' ); ?>"
			class="">
	<div class="nwp_search-bar-results"></div>
</div>

<?php
}

?>