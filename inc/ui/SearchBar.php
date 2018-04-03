<?php

class SearchBar extends \WPComponent\Component {
	public $name = 'searchbar';

	public function __construct( $id ) {
		parent::__construct( $id );
	}

	public function customizer( $c, $panel ) {
		// $c->add_section( $this->sectionName , [
		// 	'title' => __( 'Search Bar', 'nwp' ) . ' (' . $this->id . ')',
		// 	'description' => '<p>Search bar setting.</p>', 
		// 	'panel' => $panel
		// ]);

		// $c->add_setting( $this->settingPrefix . '_sticky', [
		// 	'type' => 'theme_mod',
		// 	'default' => true
		// ]);

		// $c->add_control( $this->controlPrefix . '_sticky', [
		// 	'type' => 'checkbox',
		// 	'section' => $this->sectionName,
		// 	'settings' => $this->settingPrefix . '_sticky',
		// 	'label' => __( 'Keep top navigation bar stay on top.' ),
		// 	'description' => __( 'If unchecked, it will not be sticky on the top of the page.' )
		// ]);
	}

	public function markup() {
		// $is_sticky = get_theme_mod( $this->settingPrefix . '_sticky', true ) ? 'fixed' : '';

	?>

		<div data-nwp-id="<?php echo $this->id; ?>" class="nwp_search-bar d-flex align-items-center" data-nwp-ui-search_bar>
			<span class="nwp_icon-sm h-100 mx-1">
				<div class="position-relative d-flex justify-content-center align-items-center h-100 w-100 nwp_text-pri-dark">
					<?php nwp_img( 'icon-magnifier.svg' ); ?>
				</div>
			</span>
			<input type="text" 
					name="nwp_search-bar" 
					placeholder="<?php _e( 'Search', 'nwp' ); ?>"
					class="">
			<div class="nwp_search-bar-results"></div>
		</div>

	<?php
	}
}