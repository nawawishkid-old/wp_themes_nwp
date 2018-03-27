<?php

get_header();
?>

<section id="posts row">
<?php

	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'inc/UI/post-item' );
		}
	} else {

	}
?>
</section>

<?php

get_footer();

?>
