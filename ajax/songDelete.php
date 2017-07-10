<?php

  session_start();
  require_once "../phpfun/connectDB.php";

  $deleteid = $_GET['id'];
    
  $sql = "DELETE FROM songs
          WHERE id = $deleteid
          ";

  $result = mysqli_query($conn,$sql);
  if($result) {
    if(mysqli_affected_rows($conn) > 0) {
      // Delete chord file
      $filename = "../json/songs/song" . $deleteid . "_chords.json";
      fopen($filename,'a');
      $string = file_get_contents($filename);
      if($string != null) {
        unlink($filename);
      }

      // Delete lyric file
      $filename = "../json/songs/song" . $deleteid . "_chords.json";
      fopen($filename,'a');
      $string = file_get_contents($filename);
      if($string != null) {
        unlink($filename);
      }

      echo "success";
    } else {
      echo "No song deleted";
    }
  } else {
    echo "Delete Failed";
  }
?>