<?php

function nwp_linked_thumbnail( $size = null, $attr = null ) {
?>
	<a href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail( $size, $attr ); ?>
	</a>
<?php
}

function nwp_linked_title() {
?>
	<a href="<?php the_permalink(); ?>">
		<?php the_title(); ?>
	</a>
<?php
}

function nwp_author_linked_name() {
?>
	<a href="<?php echo nwp_author_page_url(); ?>">
		<?php echo get_the_author(); ?>
	</a>
<?php
}

function nwp_author_page_url( $id = null ) {
	$id = is_null( $id ) 
				? ( in_the_loop() ? get_the_author_meta( 'ID' ) : '#' )
				: $id;

	return get_author_posts_url( $id );
}

function nwp_style_php() {
	$css = require 'style.php';

	echo <<<STYLE
<style type="text/css">
	$css
</style>
STYLE;
}