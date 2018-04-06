<?php

class Page extends \WPComponent\Component {
	public $name = 'page';
	public $settings = ['allow-title'];

	public function __construct( $id ) {
		parent::__construct( $id );
	}

	public function customizer( $c, $panel ) {
		$c->add_section( $this->sectionName , [
			'title' => __( 'General Page', 'nwp' ) . ' (' . $this->id . ')',
			'description' => '<p>General page setting.</p>', 
			'panel' => $panel
		]);

		$c->add_setting( $this->settings['allow-title'], [
			'type' => 'theme_mod',
			'default' => true
		]);

		$c->add_control( $this->controlPrefix . 'allow-title', [
			'type' => 'checkbox',
			'section' => $this->sectionName,
			'settings' => $this->settings['allow-title'],
			'label' => __( 'Enable title display.' ),
			'description' => __( 'If unchecked, the page title will disappear.' )
		]);
	}

	public function markup( $param = null ) {
	?>

		<article id="page-<?php the_ID(); ?>">
			<header>
				<?php if ( $this->getMod( 'allow-title', true ) ) : ?>
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