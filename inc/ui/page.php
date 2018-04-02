<?php

function nwp_ui_page() {
	$allow_title = get_theme_mod( 'nwp_class_page-title', 'off' );
?>

<article id="page-<?php the_ID(); ?>">
	<header>
		<?php if ( $allow_title ) : ?>
			<h1><?php the_title(); ?></h1>
		<?php endif; ?>
	</header>
	<article>
		<?php the_content(); ?>
	</article>
	<footer></footer>
</article>

<?php
}