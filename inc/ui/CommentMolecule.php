<?php

class CommentMolecule extends \WPComponent\Component {

	public $name = 'comment-molecule';

	public function __construct( $id ) {
		parent::__construct( $id );
	}

	public function customizer( $c, $panel ) {}

	public function markup( $param = null ) {
		$comment = $param['comment'];
		$is_thread = $param['is_thread'];

		$has_sibling = $is_thread && count( $comment ) > 1 ? 'thread-sibling' : '';
		$class = ( $is_thread ? 'thread' : 'comment p-3' ) . ' ' . $has_sibling;
		$author_url = nwp_author_page_url( 
			get_user_by( 'email', $comment->comment_author_email )->ID 
		);
		$id = $comment->comment_ID;
		$key = parent::getItemKey();
	?>
		<article id="comment-<?php echo $id; ?>" 
				 class="<?php echo $class; ?>"
				 data-nwp-id="<?php echo $key; ?>"
		>
			<div class="content p-3">
				<header class="clearfix mb-3">
					<div class="author float-left">
						<a href="<?php echo $author_url; ?>">
							<img src="<?php echo get_avatar_url( $comment->comment_author_email ); ?>">
						</a>
						<a href="<?php echo $author_url; ?>" class="font-weight-bold">
							<?php echo $comment->comment_author; ?>
						</a>
					</div>
					<small class="date float-right">
						<?php echo $this->getCommentDate( $comment->comment_date ); ?>
					</small>
				</header>

			 	<article class="px-3 pl-4 pb-3">
			 		<?php echo $comment->comment_content; ?>
			 	</article>

			 	<footer class="clearfix">
			 		<small class="float-right">
				 		<?php
				 			$reply_args = [
				 				'depth' => 5,
				 				'max_depth' => 10
				 			];
				 			comment_reply_link( $reply_args, $id, $comment->comment_post_ID  ); 
					 	?>
					 </small>
			 	</footer>
			 </div>

		</article>

		<?php
			$threads = $this->getThreads( $id );
			// nwp_pretty_print( $threads );
			if ( ! empty( $threads ) ) :
		?>
		 	<section class="reply">
				<?php 
					foreach ( $threads as $thread ) {
						$this->markup( [
							'comment' => $thread, 
							'is_thread' => true
						] );
					}
				?>
			</section>
		<?php
			endif;
	}

	public function getCommentDate( $comment_date ) {
		$timestamp = strtotime( $comment_date );
		$format = ( ( time() - $timestamp ) / ( 60 * 60 * 24 ) ) > 365 ? 'M d, y' : 'M d';
		return date( $format, $timestamp );
	}

	public function getThreads( $parent_id ) {
		$args = [
			'parent' => $parent_id,
			'order' => 'ASC'
		];
		return get_comments( $args );
	}
}