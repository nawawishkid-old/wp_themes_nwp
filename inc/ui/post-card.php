<?php

function nwp_ui_post_card( $key = null ) {

?>

<div data-key="<?php echo $key; ?>" class="nwp_post-card mb-3 px-3 mx-auto">
	<div class="wrapper">
		<div class="header">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="thumbnail">
					<?php nwp_linked_thumbnail(); ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="body p-3">
			<div class="title">
				<h3><?php nwp_linked_title(); ?></h3>
			</div>
			<div class="sub-title clearfix pb-3">
				<small class="float-left">
					<?php nwp_author_linked_name(); ?>
				</small>
				<small class="float-right">
					<?php the_date(); ?>
				</small>
			</div>
			<div class="text">
				<?php the_excerpt(); ?>
			</div>
			<div class="taxonomies clearfix">
				<small class="float-left">
					<?php nwp_ui( 'categories' ); ?>
				</small>
				<small class="float-right">
					<?php nwp_ui( 'tags' ); ?>
				</small>
			</div>
		</div>
	</div>
</div>

<?php
}
