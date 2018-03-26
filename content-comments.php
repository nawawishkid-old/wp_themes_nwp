<?php 
$args = [
	'post_id' => get_the_ID()
];
$comments = get_comments( $args ); ?>

<article class="post-comments">
	<div class="post-comments-header">
		<p>Discussion (<?php echo get_comments_number(); ?>)</p>
	</div>
	<div class="post-comments-body">
<?php
//print_r($comments);
	foreach ( $comments as $comment ) : 
		$profile = $comment->comment_author_url;
		$timestamp = strtotime( $comment->comment_date );
		$format = ( ( time() - $timestamp ) / ( 60 * 60 * 24 ) ) > 365 ? 'M d, y' : 'M d';
		$date = date( $format, $timestamp );
?>
		<div class="card comment p-3 mb-2">
			<div class="card-title comment-header clearfix">
				<span class="comment-author-img pr-2">
					<a href="<?php echo $profile; ?>">
						<img src="<?php echo get_avatar_url( $comment->comment_author_email ); ?>">
					</a>
				</span>
				<span class="comment-author">
					<a href="<?php echo $profile; ?>">
						<?php echo $comment->comment_author; ?>
					</a>
				</span>
				<small class="comment-date float-right">
					<?php echo $date; ?>
				</small>
			</div>

		 	<article class="comment-content px-3 pl-4 pb-3">
		 		<?php echo $comment->comment_content; ?>
		 	</article>

		 </div>
<?php 
	endforeach;
?>
	</div>
	<div class="post-comment-footer">
		<?php 
			$comments_args = [
				'class_form' => 'comment-form card p-3',
				'class_submit' => 'btn btn-outline-primary btn-block',
		        'label_submit'=> 'Send',
		        'title_reply'=> '',
		        'comment_notes_before' => '',
		        'comment_field' => '
		        	<div class="form-group">
			        	<textarea id="comment" 
			        				class="form-control" 
			        				name="comment" 
			        				aria-required="true">Discuss it!</textarea>
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
	</div>
</article>