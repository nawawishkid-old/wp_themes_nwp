var $ = jQuery;

$(document).ready(function() {
	$('.comment-reply-link').click(function() {
		$model = $('#respond').clone().insertAfter('#comment-' + $(this).data('commentid'));
		console.log($(this).data('commentid'));
		//$('#comment_parent').val($(this).data('commentid'));
	});
});