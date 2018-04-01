<article id="post" class="pb-5">
	<header class="">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="image">
				<?php the_post_thumbnail( 'large' ); ?>
			</div>
		<?php endif; ?>
	</header>
	<section class="readable px-4 pt-4 px-sm-5">
		<div class="pb-3">
			<?php get_template_part( 'inc/UI/categories' ); ?>
		</div>
		<h1 class="title"><?php the_title(); ?></h1>
		<div class="meta clearfix">
			<div class="pb-3">
				<span class="author">
					<a href="<?php echo nwp_author_page_url(); ?>">
						<img src="<?php echo get_avatar_url( get_the_author_meta( 'ID' ) ); ?>">
					</a>
					<a href="<?php echo nwp_author_page_url(); ?>">
						<strong><?php echo get_the_author(); ?></strong>
					</a>
				</span>
				<small class="date float-right">
					<?php echo get_the_date(); ?>
				</small>
			</div>
		</div>
		<!-- author img, author name, date/time, category -->
	</section>
	<article class="readable p-4 px-sm-5">
		<?php the_content(); ?>
	</article>
	<section class="readable p-4 px-sm-5">
		<!-- <?php get_template_part( 'inc/UI/tags' ); ?> -->
		<?php nwp_ui( 'tags' ); ?>
	</section>
	<hr>
	<footer class="readable p-4 px-sm-5">
		<?php 
			comments_template();
		?>
	</footer>
</article>