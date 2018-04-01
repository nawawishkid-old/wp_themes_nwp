<?php

function nwp_ui_post_index() {

?>

<main>
	<section class="nwp_post-index">
		<?php
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					nwp_ui( 'post_card' );
				}
			} else {

			}
		?>
	</section>
</main>

<?php
}
