<?php
namespace WPComponent;

class Bundle {

	public static $panelName = 'wp-component';
	public static $components = [];

	public static function build() {
		\add_action( 'customize_register', function( $c ) {
			$c->add_panel( self::$panelName, [
				'title' => __( 'WP Component' ),
				'description' => '<p>NWP Theme Customization</p>', // Include html tags such as <p>.
				'priority' => 0, // Mixed with top-level-section hierarchy.
				'capability' => 'edit_theme_options',
			]);

			foreach ( self::$components as $comp ) {
				$comp->customizer( $c, self::$panelName );
			}
		});
	}

	public static function addComponent( Component $comp ) {
		self::$components[$comp->id] = $comp;
	}

	public static function get( $id ) {
		return self::$components[$id]->markup();
	}
}