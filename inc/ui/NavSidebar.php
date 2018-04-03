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

		<div data-nwp-id="<?php echo $this->id; ?>" class="nwp_sidebar <?php echo $side; ?>" data-nwp-ui-sidebar>
			<div class="wrapper p-3">
				<section class="pb-3">
					<?php 
						$search_bar = new SearchBar( 'searchbar-2' );
						$search_bar->markup();
					?>
					<h1 class="header"><?php _e( 'Menu', 'nwp' ); ?></h1>
				</section>
				<section class="pb-3">
					<?php //get_sidebar(); ?>
					<?php \WPComponent\Bundle::getComponent( 'page-list-1' ); ?>
				</section>
			</div>
			<div class="background" data-nwp-ui-sidebar-background></div>
		</div>

	<?php
	}
}