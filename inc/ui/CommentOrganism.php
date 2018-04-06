<?php

class CommentOrganism extends \WPComponent\Component {

	public $name = 'comment-organism';

	public function __construct( $id ) {
		parent::__construct( $id );
	}

	public function customizer( $c, $panel ) {}

	public function markup( $param = null ) {
		$args = [
			'parent' => 0,
			'post_id' => get_the_ID()
		];
		$comments = get_comments( $args );
		$key = parent::getItemKey();
	?>
		<article id="comments" data-nwp-id="<?php echo $key; ?>">
			<header>
				<h4>
					<?php echo __( 'Discussion', 'nwp' ) . ' (' . get_comments_number() . ')'; ?>
				</h4>
			</header>
			<?php \WPComponent\Bundle::getComponent( 'comment-reply-molecule-1' ); ?>
			<article>
			<?php
				foreach ( $comments as $comment ) {
					\WPComponent\Bundle::getComponent( 'comment-molecule-1', [
						'comment' => $comment,
						'is_thread' => false
					] );
				}
			?>
			</article>
		</article>
	<?php
	}
}