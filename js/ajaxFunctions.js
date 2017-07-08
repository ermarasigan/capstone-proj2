// Ajax function for Account Delete
function acctDelete(){
	swal({
		title: "Are you sure?",
		text: "Deleting an account is irreversible!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Yes",
		cancelButtonText: "No",
		closeOnConfirm: false,
		closeOnCancel: false
	},
	function(isConfirm){
		if (isConfirm) {
			delpswd = $('#delpswd').val();
			$.post("ajax/acctDelete.php",
				{
					delpswd: delpswd
				},
				function(data,status){
					if (data=='success') {
						swal({
							title: "Deleted!",
							text: "Your account has been deleted", 
							type: "success",
							confirmButtonText: "Exit"
						},
						function(isConfirm){
							location.reload()
						});
					} else {
						$('#delpswd').focus();
						swal({
							title: "Error!",
							text: "Invalid password entered", 
							type: "error",
							confirmButtonText: "Ok"
						},
						function(isConfirm){
							$('#delpswd').val('');
						});
					}
				}
			)
		} else {
			swal({
				title: "Cancelled",
				text: "Account not deleted", 
				type: "error",
				confirmButtonText: "Back"
			},
			function(isConfirm){
				location.reload()
			});
		}
	});
}

// On enter of input in password, execute account delete
$(function() {
    $("#delpswd").keypress(function( event ) {
      if ( event.which == 13 ) {
        event.preventDefault()
        acctDelete();
      }
    });
});