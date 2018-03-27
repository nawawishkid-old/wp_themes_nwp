<article id="post">
	<header class="">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="image">
				<img src="<?php echo get_the_post_thumbnail_url(); ?>">
			</div>
		<?php endif; ?>
	</header>
	<section class="readable px-3 px-md-0">
		<h1 class="title"><?php the_title(); ?></h1>
		<div class="meta clearfix">
			<span class="author">
				<a href="<?php echo get_the_author_link(); ?>">
					<img src="<?php echo get_avatar_url( get_the_author_meta( 'ID' ) ); ?>">
				</a>
				<a href="<?php echo get_the_author_link(); ?>">
					<?php echo get_the_author(); ?>
				</a>
			</span>
			<small class="date float-right">
				<?php echo get_the_date(); ?>
			</small>
		</div>
		<!-- author img, author name, date/time, category -->
	</section>
	<article class="readable px-3 px-md-0 mb-4">
		<?php the_content(); ?>
	</article>
	<hr>
	<footer class="readable px-3 px-md-0 mb-4">
		<?php 
			comments_template();
		?>
	</footer>
</article>