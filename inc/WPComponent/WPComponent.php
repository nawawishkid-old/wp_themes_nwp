<?php
namespace WPComponent;

abstract class Component {
	private static $panelDidMount = false;
	protected $panel = 'wp-component';

	//abstract public function markup();
	//abstract public function customizer( $c );

	public function __construct( $customizer_callback ) {
		echo 'PARENT __CONSTRUCT!';

		if ( ! self::$panelDidMount ) {
				var_dump($customizer_callback);
			add_action( 'customize_register', function( $c ) {
				self::addPanel( $c );
				var_dump($customizer_callback);
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

class Sidebar extends Component {
	public $setting_name = 'sidebar-side';
	public $id;

	public function __construct( $id ) {
		$this->id = $id;
		//parent::__construct( [self, 'customizer'] );
		//$this->markup();
	}

	public function customizer( $c, $panel ) {
		$c->add_section( 'sidebar' , [
			'title' => __( 'Sidebar', 'nwp' ),
			'description' => '<p>Sidebar settings</p>', 
			'panel' => $panel
		]);

		$c->add_setting( $this->setting_name, [
			'type' => 'theme_mod',
			'default' => true
		]);

		$c->add_control( 'nwp_control_class_sidebar-left', [
			'type' => 'checkbox',
			'section' => 'sidebar',
			'settings' => $this->setting_name,
			'label' => __( 'Keep side navigation bar on left.' ),
			'description' => __( 'If unchecked, it will be on the right side of the page.' )
		]);
	}

	public function markup() {
		$side = get_theme_mod( $this->setting_name, false ) ? 'left' : 'right';
	?>

		<div id="<?php echo $this->id; ?>" class="nwp_sidebar <?php echo $side; ?>" data-nwp-ui-sidebar>
			<div class="wrapper p-3">
				<section class="pb-3">
					<?php nwp_ui( 'search_bar', 'nwp_search-bar-2_' . $id ); ?>
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