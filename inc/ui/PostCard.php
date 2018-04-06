<?php

class PostCard extends \WPComponent\Component {

	public $name = 'post-card';
	public $settings = [];

	public function __construct( $id ) {
		parent::__construct( $id );
	}

	public function customizer( $c, $panel ) {
		// $c->add_section( $this->sectionName , [
		// 	'title' => __( 'Side Navgation Bar', 'nwp' ) . ' (' . $this->id . ')',
		// 	'description' => '<p>Side navigation bar settings</p>', 
		// 	'panel' => $panel
		// ]);

		// $c->add_setting( $this->settingPrefix . '_position', [
		// 	'type' => 'theme_mod',
		// 	'default' => true
		// ]);

		// $c->add_control( $this->controlPrefix . '_position', [
		// 	'type' => 'checkbox',
		// 	'section' => $this->sectionName,
		// 	'settings' => $this->settingPrefix . '_position',
		// 	'label' => __( 'Keep side navigation bar on left.' ),
		// 	'description' => __( 'If unchecked, it will be on the right side of the page.' )
		// ]);
	}

	public function markup( $param = null ) {
	?>

		<div data-nwp-id="<?php echo parent::getItemKey(); ?>" class="nwp_post-card mb-3 px-3 mx-auto">
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
}
