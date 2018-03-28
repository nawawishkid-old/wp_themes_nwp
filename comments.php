<?php

/**
 * If the post has no comment.
 */
if ( ! have_comments() ) : ?>

	<h3><?php _e( 'No comments yet.', 'nwp' ); ?></h3>

<?php
	get_template_part( 'inc/UI/comment', 'form' );
	return;

endif;



/**
 * If the post has comments.
 */
$args = [
	'parent' => 0,
	'post_id' => get_the_ID()
];
$comments = get_comments( $args ); ?>

<?php //pretty_print( $comments ); ?>

<article id="comments">
	<header>
		<h4>
			<?php echo __( 'Discussion', 'nwp' ) . ' (' . get_comments_number() . ')'; ?>
		</h4>
	</header>
	<?php get_template_part( 'inc/UI/comment', 'form' ); ?>
	<article>
<?php

	foreach ( $comments as $comment ) : 
		//pretty_print( $comment );
		$profile = $comment->comment_author_url;
		$timestamp = strtotime( $comment->comment_date );
		$format = ( ( time() - $timestamp ) / ( 60 * 60 * 24 ) ) > 365 ? 'M d, y' : 'M d';
		$date = date( $format, $timestamp );
		$id = $comment->comment_ID;
?>
		<article id="comment-<?php echo $id; ?>" class="comment p-3">
			<header class="clearfix mb-3">
				<div class="author float-left">
					<a href="<?php echo $profile; ?>">
						<img src="<?php echo get_avatar_url( $comment->comment_author_email ); ?>">
					</a>
					<a href="<?php echo $profile; ?>">
						<?php echo $comment->comment_author; ?>
					</a>
				</div>
				<small class="date float-right">
					<?php echo $date; ?>
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

		</article>

	 	<section class="reply">
			<?php nwp_comment_threads( $id ); ?>
		</section>

<?php 
	endforeach;
?>
	</article>
</article>