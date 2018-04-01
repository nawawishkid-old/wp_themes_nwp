<?php

function nwp_ui_brand_logo( $id ) {
	$logo_id = get_theme_mod( 'custom_logo' );
	$logo = wp_get_attachment_image_src( $logo_id, 'full' );

?>

<div class="nwp_brand-logo" id="<?php echo $id; ?>">
	<a href="<?php echo home_url(); ?>">
		<img src="<?php echo $logo[0]; ?>" />
	</a>
</div>

<?php
}
