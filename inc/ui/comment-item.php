<?php

function nwp_ui_comment_item( $key, $args ) {
	$defaults = [
		
	]
?>

<article id="comment-<?php echo $id; ?>" class="nwp_comment-item p-3">
	<header class="clearfix mb-3">
		<div class="author float-left">
			<a href="<?php echo $author_url; ?>">
				<img src="<?php echo get_avatar_url( $comment->comment_author_email ); ?>">
			</a>
			<a href="<?php echo $author_url; ?>">
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
}