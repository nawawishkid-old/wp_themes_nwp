<?php 
if ( ! comments_open() ) : ?>

	<h3><?php _e( 'Comments are not allowed on this post.', 'nwp' ); ?></h3>

<?php
	return;
endif;

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
<p class="form-submit float-right">
	<button class="btn" type="button">$cancel</button>
	%1\$s %2\$s
</p>
SFIELD;

$comments_args = [
	'class_form' => 'add-new p-3 clearfix',
	'class_submit' => 'btn btn-outline-primary',
    'label_submit'=> $submit,
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

comment_form($comments_args);