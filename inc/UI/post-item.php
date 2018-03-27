<div class="post-item card col-12 col-md-6 col-l-4">
	<!-- thumbnail, title, excerpt, author, date/time, category -->
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="image">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php endif; ?>
	<div class="card-title">
		<?php the_title(); ?>
		<small class="author">
			<a href="<?php echo get_the_author_link(); ?>">
				<img src="<?php echo get_avatar_url( get_the_author_meta( 'ID' ) ); ?>">
			</a>
			<a href="<?php echo get_the_author_link(); ?>">
				<?php echo get_the_author(); ?>
			</a>
		</small>
	</div>
	<div class="card-text">
		<?php the_excerpt(); ?>
	</div>
</div>