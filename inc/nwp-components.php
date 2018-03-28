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

function nwp_linked_author() {
?>
	<a href="<?php echo get_the_author_link(); ?>">
		<?php echo get_the_author(); ?>
	</a>
<?php
}