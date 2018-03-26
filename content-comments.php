<?php 
$args = [
	'post_id' => get_the_ID()
];
$comments = get_comments( $args ); ?>

<article class="comments">
	<header>
		<p>Discussion (<?php echo get_comments_number(); ?>)</p>
	</header>
	<article>
<?php
//print_r($comments);
	foreach ( $comments as $comment ) : 
		$profile = $comment->comment_author_url;
		$timestamp = strtotime( $comment->comment_date );
		$format = ( ( time() - $timestamp ) / ( 60 * 60 * 24 ) ) > 365 ? 'M d, y' : 'M d';
		$date = date( $format, $timestamp );
		$id = get_comment_ID();
?>
		<article id="comment-<?php echo $id; ?>" class="comment p-3 mb-2">
			<header class="clearfix mb-3">
				<div class="author float-left">
					<a href="<?php echo $profile; ?>">
						<img class="pr-2" 
							 src="<?php echo get_avatar_url( $comment->comment_author_email ); ?>">
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
			 			comment_reply_link( $reply_args, get_comment_ID(), get_the_ID()  ); 
				 	?>
				 </small>
		 	</footer>

		 </article>
<?php 
	endforeach;
?>
	</article>
	<footer>
		<?php 
			$comments_args = [
				'class_form' => 'add-new p-3',
				'class_submit' => 'btn btn-outline-primary btn-block',
		        'label_submit'=> 'Send',
		        'title_reply'=> '',
		        'comment_notes_before' => '',
		        'comment_field' => '
		        	<div class="form-group">
			        	<textarea id="add_comment" 
			        				class="form-control" 
			        				name="comment" 
			        				aria-required="true"
			        				placeholder="Discuss it!"></textarea>
			        </div>',
		        'fields' => [
		        	'author' => '
		        		<div class="form-row">
			        		<div class="form-group col-sm-6">
			        			<input type="text" name="comment_author" class="form-control" placeholder="Name">
			        		</div>',
		        	'email' => '
			        		<div class="form-group col-sm-6">
			        			<input type="email" name="comment_email" class="form-control" placeholder="Email">
			        		</div>
		        		</div>'
		        ]
			];

			comment_form($comments_args); 
		?>
	</footer>
</article>