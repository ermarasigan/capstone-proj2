// Play song
function songPlay(id){
  $.post("ajax/songPlay.php?id="+id,
  {
  },
  function(data,status){
    if(data=='notloggedin'){
      swal({
        title:"Log in to play song"
      },function(isConfirm){
        if(isConfirm){
          $('#login_modal').modal('show')
        }
      });
    } else {
      document.location = "song_play.php?id="+id
    }
  });
}

// Pick song
function songPick(id){
  $.post("ajax/songPick.php?id="+id,
  {
  },
  function(data,status){
    if(data=='notloggedin'){
      swal({
        title:"Log in to add song to Picks (Favorites)"
      },function(isConfirm){
        if(isConfirm){
          $('#login_modal').modal('show')
        }
      });
    } else {
      if (data=='success') {
        swal({
          title: "Song added to Picks!",
          text: "See Picks for your favorite songs", 
          type: "success",
          confirmButtonText: "Ok"
        },
        function(isConfirm){
          location.reload()
        });
      } else {
        swal({
          title: "Error!",
          text: data, 
          type: "error",
        });
      }
    }
  });
}

// Unpick song
function songUnpick(id){
  $.post("ajax/songUnpick.php?id="+id,
  {
  },
  function(data,status){
    if(data=='notloggedin'){
      swal({
        title:"Log in to remove song from Picks (Favorites)"
      },function(isConfirm){
        if(isConfirm){
          $('#login_modal').modal('show')
        }
      });
    } else {
      if (data=='success') {
        swal({
          title: "Song removed from Picks!",
          text: "See Picks for your favorite songs", 
          type: "success",
          confirmButtonText: "Ok"
        },
        function(isConfirm){
          location.reload()
        });
      } else {
        swal({
          title: "Error!",
          text: data, 
          type: "error",
        });
      }
    }
  });
}

// Delete song
function songDelete(id){
  swal({
    title: "Are you sure?",
    text: "Deleting a song is irreversible!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yes",
    cancelButtonText: "No",
    closeOnConfirm: false,
    closeOnCancel: true
  },
  function(isConfirm){
    if (isConfirm){
      $.post("ajax/songDelete.php?id="+id,
      {
      },
      function(data,status){
        if (data=='success') {
          swal({
            title: "Deleted!",
            text: "Song has been deleted", 
            type: "success",
            confirmButtonText: "Ok"
          },
          function(isConfirm){
            location.reload()
          });
        } else {
          swal({
            title: "Error!",
            text: data, 
            type: "error",
          });
        }
      });
    }
  });
}




