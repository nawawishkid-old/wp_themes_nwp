<?php 

function nwp_comment_threads( $parent_id ) {

	$args = [
		'parent' => $parent_id,
		'order' => 'ASC'
	];
	$threads = get_comments( $args );
	//pretty_print( $threads );
	if ( empty( $threads ) )
		return;

	$hasSibling = count( $threads ) > 1 ? 'thread-sibling' : '';

	foreach ( $threads as $thread ) :
		$profile = $thread->comment_author_url;
		$timestamp = strtotime( $thread->comment_date );
		$format = ( ( time() - $timestamp ) / ( 60 * 60 * 24 ) ) > 365 ? 'M d, y' : 'M d';
		$date = date( $format, $timestamp );
		$id = $thread->comment_ID;
?>
		<article id="comment-<?php echo $id; ?>" class="thread py-3 pl-3 <?php echo $hasSibling; ?>">
			<header class="clearfix mb-3">
				<div class="author float-left">
					<a href="<?php echo $profile; ?>">
						<img src="<?php echo get_avatar_url( $thread->comment_author_email ); ?>">
					</a>
					<a href="<?php echo $profile; ?>">
						<?php echo $thread->comment_author; ?>
					</a>
				</div>
				<small class="date float-right">
					<?php echo $date; ?>
				</small>
			</header>

		 	<article class="px-3 pl-4 pb-3">
		 		<?php echo $thread->comment_content; ?>
		 	</article>

		 	<footer class="clearfix">
		 		<small class="float-right">
			 		<?php
			 			$reply_args = [
			 				'depth' => 5,
			 				'max_depth' => 10
			 			];
			 			comment_reply_link( $reply_args, $id, $thread->comment_post_ID  ); 
				 	?>
				 </small>
		 	</footer>

		</article>

	 	<section class="reply">
			<?php nwp_comment_threads( $id ); ?>
		</section>

<?php
	endforeach;

}
