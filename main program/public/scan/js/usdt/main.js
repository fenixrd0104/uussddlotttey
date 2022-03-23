/* jshint devel:true */
// Initialize your app

$(function () {
	// modal
	$('.gotoCollection').on('click', function () {
		$('.pages').append('<div class="modal-overlay"></div>');
		$('.modal-overlay').addClass('modal-overlay-visible');
		$('.modal').removeClass('modal-out').addClass('modal-in');
		setTimeout(function() {
			window.location.href = 'index.html';
		}, 3000);
	});
});
// back
function goback() {
	window.location.reload();
	window.history.back(-1);
}
