<?php

function nwp_ui_list( $list ) {

	foreach ( $list as $item ) :
		if ( is_array( $item ) ) :
?>
			<div class="accordion"></div>
<?php endif; ?>


<?php 
	endforeach;
}