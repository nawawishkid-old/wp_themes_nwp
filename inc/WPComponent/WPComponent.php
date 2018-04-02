<?php

abstract class WPComponent {
	private static $panelDidMount = false;
	protected $panel = 'wp-component';

	abstract public function markup();
	abstract public function customizer();

	public function __construct( $customizer_callback ) {

		if ( ! self::$panelDidMount ) {
			add_action( 'customize_register', function( $c ) {
				self::addPanel( $c );
				call_user_func_array( $customizer_callback, [$c] );
			});

			self::$panelDidMount = true;
		}

		add_action( 'customize_register', $customizer_callback );
	}

	public static function addPanel( $c ) {
		$c->add_panel( 'nwp_panel', [
			'title' => __( 'NWP Theme' ),
			'description' => '<p>NWP Theme Customization</p>', // Include html tags such as <p>.
			'priority' => 0, // Mixed with top-level-section hierarchy.
			'capability' => 'edit_theme_options',
		]);
	}
}

class NavBar extends WPComponent {
	public function __construct() {
		parent::__construct( $this->customizer );
		$this->markup();
	}

	public function customizer() {
		$c->add_section( 'nwp_section' , [
			'title' => __( 'NWP Theme', 'nwp' ),
			'description' => '<p>NWP Theme Customization</p>', 
			'panel' => parent::$panel
		]);

		$c->add_setting( 'nwp_class_nav_bar-sticky', [
			'type' => 'theme_mod',
			'default' => 'on'
		]);
	}

	public function markup() {
		?>

		<

		<?php
	}
}