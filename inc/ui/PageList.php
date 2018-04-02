<?php

class PageList extends \WPComponent\Component {

	public $name = 'page-list';

	public function __construct( $id ) {
		parent::__construct( $id );
	}

	public function customizer( $c, $panel ) {}

	public function markup() {
		$pages = get_pages( ['parent' => 0] );
	?>
		<div data-nwp-id="<?php echo $this->id; ?>" class="nwp_page-list">
			<?php
				$this->markupItem( $pages );
			?>
		</div>
	<?php
	}

	public function markupItem( $pages ) {
		echo '<ul>';
		foreach ( $pages as $page ) :
			$subpages = get_pages( ['parent' => $page->ID] );
			?>
				<li class="">
					<div class="clearfix">
						<a href="<?php echo $page->guid; ?>"
						   class="float-left"
						>
							<?php echo $page->post_title; ?>
						</a>
						<?php if ( ! empty( $subpages ) ) : ?>
							<a href="#collapse-<?php echo $page->ID; ?>" 
							   class="float-right"
							   role="button" 
							   data-toggle="collapse" 
							   aria-expanded="false" 
							   aria-controls="collapse-<?php echo $page->ID; ?>"
							>v</a>
						<?php endif; ?>
					</div>
					<?php if ( ! empty( $subpages ) ) : ?>
						<div class="subpages collapse py-2 pl-2" id="collapse-<?php echo $page->ID; ?>">
							<?php $this->markupItem( $subpages ); ?>
						</div>
					<?php endif; ?>
				</li>
			<?php
		endforeach;
		echo '</ul>';
	}
}