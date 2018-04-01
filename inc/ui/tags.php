<?php

function nwp_ui_tags() {
	$tags = get_the_tags();

	if ( ! $tags ) return;

	foreach ( $tags as $tag ) : 
?>

<a href="<?php echo get_tag_link( $tag->term_id ); ?>">
	#<?php echo $tag->name; ?>
</a>

<?php
	endforeach;
}