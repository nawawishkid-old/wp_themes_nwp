<?php

class Page extends \WPComponent\Component {
	public $name = 'page';

	public function __construct( $id ) {
		parent::__construct( $id );
	}

	public function customizer( $c, $panel ) {
		$c->add_section( $this->sectionName , [
			'title' => __( 'General Page', 'nwp' ) . ' (' . $this->id . ')',
			'description' => '<p>General page setting.</p>', 
			'panel' => $panel
		]);

		$c->add_setting( $this->settingPrefix . '_allow-title', [
			'type' => 'theme_mod',
			'default' => true
		]);

		$c->add_control( $this->controlPrefix . '_allow-title', [
			'type' => 'checkbox',
			'section' => $this->sectionName,
			'settings' => $this->settingPrefix . '_allow-title',
			'label' => __( 'Enable title display.' ),
			'description' => __( 'If unchecked, the page title will disappear.' )
		]);
	}

	public function markup() {
		$allow_title = get_theme_mod( $this->settingPrefix . '_allow-title', true );

	?>

		<article id="page-<?php the_ID(); ?>">
			<header>
				<?php if ( $allow_title ) : ?>
					<h1><?php the_title(); ?></h1>
				<?php endif; ?>
			</header>
			<article>
				<?php the_content(); ?>
			</article>
			<footer></footer>
			</article>

	<?php
	}
}