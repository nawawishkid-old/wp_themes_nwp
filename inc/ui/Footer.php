<?php

class Footer extends \WPComponent\Component {

	public $name = 'footer';

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

			<footer class="nwp_bg-pri-dark p-3">
				<div class="row no-gutters">
					<div class="col-12 col-sm-6 col-md-4">
						<?php \WPComponent\Bundle::getComponent( 'page-list-2' ); ?>
					</div>
					<div class="col-12 col-sm-6 col-md-4 py-2">
						Col 2
					</div>
					<div class="col-12 col-sm-6 col-md-4 py-2">
						Col 3
					</div>
				</div>
				<div></div>
			</footer>

		<?php
	}
}