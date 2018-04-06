<?php

get_header();

$auth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

//nwp_pretty_print( $auth );
?>

<main class="py-5">

	<h2 class="text-center my-3"><?php printf( __( 'Post collection of <b><i>%s</i></b>', 'nwp' ), $auth->display_name ); ?></h2>

<?php

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		\WPComponent\Bundle::getComponent( 'post-card-1' );
	}
} else {

}
?>

</main>

<?php

get_footer();

?>
