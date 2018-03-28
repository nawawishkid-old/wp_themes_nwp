<div class="col-12 col-sm-6 col-md-4 mb-2">
	<div class="post-item card">
		<!-- thumbnail, title, excerpt, author, date/time, category -->
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="image">
				<?php nwp_linked_thumbnail( 'medium' ); ?>
			</div>
		<?php endif; ?>
		<h5 class="card-title">
			<?php nwp_linked_title(); ?>
		</h5>
		<div class="card-text">
			<?php the_excerpt(); ?>
		</div>
		<div class="card-footer">
			<small class="author">
				<!-- <a href="<?php echo get_the_author_link(); ?>">
					<img src="<?php echo get_avatar_url( get_the_author_meta( 'ID' ) ); ?>">
				</a> -->
				<?php nwp_author_linked_name(); ?>
			</small>
		</div>
	</div>
</div>