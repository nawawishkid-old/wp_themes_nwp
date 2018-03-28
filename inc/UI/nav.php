<div id="navPlaceHolder">
	<nav id="navBar" class="fixed">
		<div class="px-5 row">
			<div class="col-4">
				<a href="<?php echo site_url(); ?>">
					<?php echo get_bloginfo( 'name' ); ?>
				</a>
			</div>
			<div class="col-4 justify-content-center">
				<?php get_template_part( 'inc/UI/searchbar' ); ?>
			</div>
			<div class="col-4 justify-content-end">Menu</div>
		</div>
	</nav>
</div>