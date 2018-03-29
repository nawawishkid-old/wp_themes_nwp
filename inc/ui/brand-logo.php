<?php

$logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $logo_id, 'full' );

?>

<div class="nwp_brand-logo">
	<a href="<?php echo home_url(); ?>">
		<img src="<?php echo $logo; ?>" />
	</a>
</div>