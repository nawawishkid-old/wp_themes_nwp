<?php

function nwp_ui_categories() {
	$cats = get_the_category();

	if ( ! $cats ) return;

	foreach ( $cats as $cat ) :
?>

<a href="<?php echo get_category_link( $cat->term_id ); ?>">
	<span class="post-category"><?php echo $cat->name; ?></span>
</a>

<?php
	endforeach;
}
