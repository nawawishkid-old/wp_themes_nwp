<?php
namespace WPComponent;

class Bundle {

	public static $panelName = 'wp-component';
	public static $components = [];
	public static $componentKeys = [];
	public static $customizer = [];
	public static $modifications = [];

	public static function build() {
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

		self::assignComponentModification();
	}

	public static function addComponent( Component $comp ) {
		if ( in_array( $comp->id, self::$componentKeys ) )
			throw new Exception("Duplicate component key: `{$comp->id}`");
			
		self::$componentKeys[] = $comp->id;
		self::$components[$comp->id] = $comp;
	}

	public static function getComponent( $id, $param = null ) {
		return self::$components[$id]->markup( $param );
	}

	public static function addCustomizer( $callback ) {
		self::$customizer[] = $callback;
	}

	// Assign theme mod for each component
	private static function assignComponentModification() {
		add_action( 'pre_get_posts', function() {
			self::$modifications = get_theme_mods();
			//nwp_pretty_print(self::$modifications, true);

			foreach ( self::$components as $comp ) {
				if ( empty( $comp->settings ) ) {
					continue;
				}

				foreach ( $comp->settings as $name => $fullname ) {
					// echo 'Name: ' . $name . '<br>';
					$comp->setMod( $name, self::$modifications[$fullname] );
				}
			}
		});
	}
}