<div class="card">
	<div class="card-header">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="card-thumnail">
				<img src="<?php the_post_thumbnail(); ?>">
			</div>
		<?php endif; ?>
	</div>
	<div class="card-body">
		<a href="<?php the_permalink(); ?>">
			<h3 class="card-title"><?php the_title(); ?></h3>
		</a>
		<p class="card-text">
			<?php the_excerpt(); ?>
		</p>
	</div>
	<div class="card-footer">
	</div>
</div>