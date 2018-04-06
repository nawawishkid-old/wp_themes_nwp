<?php

class CommentReplyMolecule extends \WPComponent\Component {

	public $name = 'comment-reply-molecule';
	public $commentArguments;

	public function __construct( $id ) {
		parent::__construct( $id );

		add_filter( 'comment_id_fields', function( $result, $id, $replytoid ) {
			$result = "<button data-commentid=\"$id\" class=\"btn cancel d-none\" type=\"button\">" . __( 'Cancel', 'nwp' ) . "</button>";
			$result .= "<input type=\"hidden\" name=\"comment_post_ID\" value=\"$id\" class=\"comment-post-id\" />\n";
			$result .= "<input type=\"hidden\" name=\"comment_parent\" class=\"comment-parent-id\" value=\"$replytoid\" />\n";

			return $result;
		}, 10, 3);

		$this->addArguments();
	}

	public function customizer( $c, $panel ) {}

	public function markup( $param = null ) {

		if ( ! comments_open() ) : 
		?>

			<h3><?php _e( 'Comments are not allowed on this post.', 'nwp' ); ?></h3>

		<?php
			return;
		endif;

		comment_form( $this->commentArguments );
	}

	public function addArguments() {
		$title = __( 'Discuss it!', 'nwp' );
		$name = __( 'Name', 'nwp' );
		$email = __( 'Email', 'nwp' );
		$submit = __( 'Send', 'nwp' );
		$cancel = __( 'Cancel', 'nwp' );

		$textarea = <<<TEXTAREA
<div class="form-group">
	<textarea id="add_comment" 
				class="form-control" 
				name="comment" 
				aria-required="true"
				placeholder="{$title}"></textarea>
</div>
TEXTAREA;
	
		$input_name = <<<NAME
<div class="form-row">
	<div class="form-group col-sm-6">
		<input type="text" name="comment_author" class="form-control" placeholder="{$name}">
	</div>
NAME;

		$input_email = <<<EMAIL
<div class="form-group col-sm-6">
	<input type="email" name="comment_email" class="form-control" placeholder="{$email}">
</div>
</div> <!-- .form-row -->
EMAIL;

		$submit_field = <<<SFIELD
<div class="form-submit float-right">
	%1\$s %2\$s
	<input name="submit" type="submit" id="submit" class="btn btn-outline-primary" value="$submit">
</div>
SFIELD;

		$comments_args = [
			'class_form' => 'add-new p-3 clearfix',
			//'class_submit' => 'btn btn-outline-primary',
		    //'label_submit'=> $submit,
		    'submit_button' => '',
		    'title_reply'=> '',
		    'title_reply_before' => '',
		    'title_reply_after' => '',
		    'cancel_reply_link' => $cancel,
		    'comment_notes_before' => '',
		    'comment_field' => $textarea,
		    'fields' => [
		    	'author' => $input_name,
		    	'email' => $input_email
		    ],
		    'submit_field' => $submit_field
		];

		$this->commentArguments = $comments_args;
	}
}