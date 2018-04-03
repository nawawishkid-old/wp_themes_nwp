<?php

class NavTopbar extends \WPComponent\Component {
	public $name = 'nav-topbar';

	public function __construct( $id ) {
		parent::__construct( $id );
	}

	public function customizer( $c, $panel ) {
		$c->add_section( $this->sectionName , [
			'title' => __( 'Top Navigation Bar', 'nwp' ) . ' (' . $this->id . ')',
			'description' => '<p>Top navigation bar setting.</p>', 
			'panel' => $panel
		]);

		$c->add_setting( $this->settingPrefix . '_sticky', [
			'type' => 'theme_mod',
			'default' => true
		]);

		$c->add_control( $this->controlPrefix . '_sticky', [
			'type' => 'checkbox',
			'section' => $this->sectionName,
			'settings' => $this->settingPrefix . '_sticky',
			'label' => __( 'Keep top navigation bar stay on top.' ),
			'description' => __( 'If unchecked, it will not be sticky on the top of the page.' )
		]);
	}

	public function markup() {
		$is_sticky = get_theme_mod( $this->settingPrefix . '_sticky', true ) ? 'fixed' : '';

	?>

		<div data-nwp-id="<?php echo $this->id; ?>" class="nwp_nav-bar-placeholder">
			<nav class="nwp_nav-bar  nwp_bg-pri <?php echo $is_sticky; ?>">
				<div class="px-3 px-md-5 row no-gutters">
					<div class="col-6 col-sm-3">
						<?php nwp_ui( 'brand_name', 'nwp_brand-name-1' ); ?>
					</div>
					<div class="d-none d-sm-flex col-sm-6 justify-content-center">
						<?php 
							$search_bar = new SearchBar( 'searchbar-1' );
							$search_bar->markup();
						?>
						<!--?php nwp_ui( 'search_bar', 'nwp_search-bar-1' ); ?-->
					</div>
					<div class="col-6 col-sm-3 justify-content-end">
						<!--?php nwp_ui( 'sidebar_trigger', 'nwp_sidebar-trigger-1' ); ?-->
						<?php
							$trg1 = new NavSidebarTrigger( 'trigger-1' );
							$trg1->markup();
						?>
					</div>
				</div>
			</nav>
		</div>

	<?php
	}
}