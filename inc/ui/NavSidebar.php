<?php

class NavSidebar extends \WPComponent\Component {

	public $name = 'nav-sidebar';

	public function __construct( $id ) {
		parent::__construct( $id );
	}

	public function customizer( $c, $panel ) {
		$c->add_section( $this->sectionName , [
			'title' => __( 'Side Navgation Bar', 'nwp' ) . ' (' . $this->id . ')',
			'description' => '<p>Side navigation bar settings</p>', 
			'panel' => $panel
		]);

		$c->add_setting( $this->settingPrefix . '_position', [
			'type' => 'theme_mod',
			'default' => true
		]);

		$c->add_control( $this->controlPrefix . '_position', [
			'type' => 'checkbox',
			'section' => $this->sectionName,
			'settings' => $this->settingPrefix . '_position',
			'label' => __( 'Keep side navigation bar on left.' ),
			'description' => __( 'If unchecked, it will be on the right side of the page.' )
		]);
	}

	public function markup() {
		$side = get_theme_mod( $this->settingPrefix . '_position', false ) ? 'left' : 'right';
	?>

		<div id="<?php echo $this->id; ?>" class="nwp_sidebar <?php echo $side; ?>" data-nwp-ui-sidebar>
			<div class="wrapper p-3">
				<section class="pb-3">
					<?php nwp_ui( 'search_bar', 'nwp_search-bar-2_' . $this->id ); ?>
					<h1 class="header"><?php _e( 'Menu', 'nwp' ); ?></h1>
				</section>
				<section class="pb-3">
					<?php get_sidebar(); ?>
				</section>
			</div>
			<div class="background" data-nwp-ui-sidebar-background></div>
		</div>

	<?php
	}
}