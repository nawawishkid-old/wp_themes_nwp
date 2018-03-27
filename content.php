<div class="card">
	<div class="card-header">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="card-thumnail">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php endif; ?>
	</div>
	<div class="card-body">
		<h3 class="card-title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h3>
		<p class="card-text">
			<?php the_excerpt(); ?>
		</p>
	</div>
	<div class="card-footer">
	</div>
</div>