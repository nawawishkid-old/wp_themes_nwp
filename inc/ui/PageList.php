<?php

class PageList extends \WPComponent\Component {

	public $name = 'page-list';

	public function __construct( $id ) {
		parent::__construct( $id );
	}

	public function customizer( $c, $panel ) {}

	public function markup( $param = null ) {
		$pages = get_pages( ['parent' => 0] );
		$key = parent::getItemKey();
	?>
		<div data-nwp-id="<?php echo $key; ?>" class="nwp_page-list">
			<?php
				$this->markupItem( $pages, $key );
			?>
		</div>
	<?php
	}

	public function markupItem( $pages, $key ) {
		echo '<ul>';
		foreach ( $pages as $page ) :
			$subpages = get_pages( ['parent' => $page->ID] );
			$collapseID = $key . '-collapse-' . $page->ID;
			?>
				<li class="page-item">
					<div class="clearfix py-2">
						<a href="<?php echo $page->guid; ?>"
						   class="float-left"
						>
							<?php echo $page->post_title; ?>
						</a>
						<?php if ( ! empty( $subpages ) ) : ?>
							<a href="#<?php echo $collapseID; ?>" 
							   class="float-right nwp_icon-sm"
							   role="button" 
							   data-toggle="collapse" 
							   aria-expanded="false" 
							   aria-controls="<?php echo $collapseID; ?>"
							>
								<?php nwp_img( 'icon-down-arrow.svg' ); ?>
							</a>
						<?php endif; ?>
					</div>
					<?php if ( ! empty( $subpages ) ) : ?>
						<div class="subpages collapse" id="<?php echo $collapseID; ?>">
							<div class="py-2 pl-2">
								<?php $this->markupItem( $subpages, $key ); ?>
							</div>
						</div>
					<?php endif; ?>
				</li>
			<?php
		endforeach;
		echo '</ul>';
	}
}