<article class="post">
	<header class="">
		<?php if ( has_post_thumbnail() ) : ?>
		<img src="<?php echo get_the_post_thumbnail_url(); ?>">
		<?php endif; ?>
	</header>
	<h1 class="title readable"><?php the_title(); ?></h1>
	<article class="readable">
		<?php the_content(); ?>
	</article>
	<footer class="readable">
		<?php 
			get_template_part( 'content', 'comments' );
		?>
	</footer>
</article>