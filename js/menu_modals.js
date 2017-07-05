// Javascript for homepage modals (Account update/delete)

if (typeof update_status == 'undefined'){
	update_status = '';
}
if (typeof delete_status == 'undefined'){
	delete_status = '';
}
// $('#update_modal').on('hide.bs.modal', function () {
	if(update_status=="update_msg") {
		$('#update_modal').modal('show');
	}
// });

// $('#update_modal').on('hide.bs.modal', function () {
	if(delete_status=="delete_msg") {
		$('#update_modal').modal('show');
	}
// });

// Javascript for popover
$(document).ready(function(){
	$('[data-toggle="popover"]').popover(); 
});