<?php

get_header();
?>

<section id="posts" class="container-fluid">
	<div class="row">
	<?php

		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				get_template_part( 'inc/UI/post-item' );
			}
		} else {

		}
	?>
	</div>
</section>

<?php

get_footer();

?>
