<article class="post">
	<header class="">
		<?php if ( has_post_thumbnail() ) : ?>
		<img src="<?php echo get_the_post_thumbnail_url(); ?>">
		<?php endif; ?>
	</header>
	<h1 class="title readable px-3 px-md-0"><?php the_title(); ?></h1>
	<article class="readable px-3 px-md-0 mb-4">
		<?php the_content(); ?>
	</article>
	<hr>
	<footer class="readable px-3 px-md-0 mb-4">
		<?php 
			get_template_part( 'content', 'comments' );
		?>
	</footer>
</article>