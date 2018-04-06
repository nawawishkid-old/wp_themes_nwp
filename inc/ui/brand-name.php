<?php

function nwp_ui_brand_name( $id ) {
?>

<h3 class="nwp_brand-name m-0" id="<?php echo $id; ?>">
	<a href="<?php echo home_url(); ?>">
		<?php echo get_bloginfo( 'name' ); ?>
	</a>
</h3>

<?php
}
