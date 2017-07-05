// Javascript for homepage modals (signup/login)

$('#signup_modal').on('shown.bs.modal', function () {
	$('#reguser').focus();
});
$('#login_modal').on('shown.bs.modal', function () {
	$('#username').focus();
});

// $('#login_modal').on('hide.bs.modal', function () {
	if(status=="login_error") {
		$('#login_modal').modal('show');
	}
// });
// $('#signup_modal').on('hide.bs.modal', function () {
	if(status=="signup_msg") {
		$('#signup_modal').modal('show');
	}
// });
	
$(document.body).on('hide.bs.modal', function () {
	$('body').css('padding-right','0');
});
$(document.body).on('hidden.bs.modal', function () {
	$('body').css('padding-right','0');
});