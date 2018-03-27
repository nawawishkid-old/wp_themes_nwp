var $ = jQuery;

$(document).ready(function() {
	$('.comment-reply-link').click(function() {
		var $this = $(this),
			comID = $this.data('commentid'),
			model, newRespondID, cancelBtn;

		// Check if #respond component for this comment
		// has once been created.
		// If yes, just show it.
		// If no, clone it from original #respond component for the post.
		if ( $('#respond-' + comID).length ) {
			$('#respond-' + comID).removeClass('d-none');
			return;
		}

		// Clone WordPress #respond component.
		model = $('#respond').clone();
		// Define new id
		newRespondID = 'respond-' + comID;
		cancelBtn = model.find('.cancel');

		// Set new id
		model.attr('id', newRespondID);
		// Set data-commentid to cancel button as a reference for 'reply' link
		cancelBtn.data('commentid', comID);
		// Show cancel button
		cancelBtn.removeClass('d-none');
		// Add event listener for remove
		cancelBtn.click(hideRespond);
		// Insert cloned component to related comment area.
		model.insertAfter('#comment-' + comID);
		// Set value of WordPress hidden input
		// which tell the backend which comment the user going to reply to.
		$('#' + newRespondID + ' .comment-parent-id').val(comID);
		// Disable reply link
		$this.prop('disabled', true);
	});

	function hideRespond() {
		console.log(this);
		var comID = $(this).data('commentid');

		// Hide #respond component
		$('#respond-' + comID).addClass('d-none');
	}
});