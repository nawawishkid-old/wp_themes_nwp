<?php

function nwp_ui_sidebar_trigger( $id ) {
?>

<div class="nwp_sidebar-trigger nwp_icon" id="<?php echo $id; ?>" data-nwp-ui-sidebar-trigger>
	<?php nwp_img( 'icon-nav-menu.svg' ); ?>
</div>

<?php
}
