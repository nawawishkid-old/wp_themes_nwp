<?php

class NavSidebarTrigger extends \WPComponent\Component {

	public $name = 'nav-sidebar-trigger';

	public function __construct( $id ) {
		parent::__construct( $id );
	}

	public function customizer( $c, $panel ) {
		/*$c->add_section( $this->sectionName , [
			'title' => __( 'Sidebar', 'nwp' ) . ' (' . $this->id . ')',
			'description' => '<p>Sidebar settings</p>', 
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
		]);*/
	}

	public function markup( $param = null ) {
		//$side = get_theme_mod( $this->settingPrefix . '_position', false ) ? 'left' : 'right';
	?>

	<div class="nwp_sidebar-trigger nwp_icon-lg" data-nwp-id="<?php echo $this->id; ?>" data-nwp-ui-sidebar-trigger>
		<?php nwp_img( 'icon-nav-menu.svg' ); ?>
	</div>

	<?php
	}
}