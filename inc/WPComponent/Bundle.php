<?php
namespace WPComponent;

class Bundle {

	public static $panelName = 'wp-component';
	public static $components = [];
	public static $componentKeys = [];
	public static $customizer = [];

	public static function buildCustomizer() {
		\add_action( 'customize_register', function( $c ) {
			$c->add_panel( self::$panelName, [
				'title' => __( 'WP Component' ),
				'description' => '<p>NWP Theme Customization</p>', // Include html tags such as <p>.
				'priority' => 0, // Mixed with top-level-section hierarchy.
				'capability' => 'edit_theme_options',
			]);

			// Customizer from Component
			foreach ( self::$components as $comp ) {
				$comp->customizer( $c, self::$panelName );
			}

			// Customizer alone
			foreach ( self::$customizer as $customizer ) {
				call_user_func_array( $customizer, [ $c, self::$panelName ] );
			}
		});
	}

	public static function addComponent( Component $comp ) {
		if ( in_array( $comp->id, self::$componentKeys ) )
			throw new Exception("Duplicate component key: `{$comp->id}`");
			
		self::$componentKeys[] = $comp->id;
		self::$components[$comp->id] = $comp;
	}

	public static function getComponent( $id ) {
		return self::$components[$id]->markup();
	}

	public static function addCustomizer( $callback ) {
		self::$customizer[] = $callback;
	}
}