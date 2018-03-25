<?php

get_header();
?>

<?php
if ( have_posts() ) : while ( have_posts() ) : the_post();
?>

<h1><?php the_title(); ?></h1>

<?php dynamic_sidebar( 'home_right_1' ); ?>
<?php //the_widget( $my_widget2 ); ?>

<?php
endwhile;
else:
?>

<h1>No posts found.</h1>

<?php endif; ?>

<?php
get_footer();
