<?php

use \WPComponent\Bundle;

/**
 * If the post has no comment.
 */
if ( ! have_comments() ) : ?>

	<h3><?php _e( 'No comments yet.', 'nwp' ); ?></h3>

<?php
	Bundle::getComponent( 'comment-reply-molecule-1' );
	return;

endif;



/**
 * If the post has comments.
 */
Bundle::getComponent( 'comment-organism-1' );