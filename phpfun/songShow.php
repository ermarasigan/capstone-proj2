<?php

  function searchShow(){

    $array = [];

    if(isset($_SESSION['username'])){
      $filename = "json/searches/" . htmlspecialchars(strtolower($_SESSION['username'])) . "_search.json";
    } else {
      $filename = "json/searches/search.json";
    }

    fopen($filename,'a');
    $string = file_get_contents($filename);

    if($string != null) {
      $array = json_decode($string, true);
    } 

    switch (sizeof($array)%4) {
      case 0:
        $colwidth = "col-lg-3";
        break;

      case 1:
        $colwidth = "col-lg-12";
        break;

      case 2:
        $colwidth = "col-lg-6";
        break;

      case 3:
        $colwidth = "col-lg-4";
        break;
      
      default:
        $colwidth = "col-lg-12";
        break;
    }

    foreach ($array as $key) {

      global $conn;

      $picked='';
      if(isset($_SESSION['userid'])){
        $userid = $_SESSION['userid'];
        $sql = "SELECT * FROM picks 
            WHERE songid = $key
            AND userid = $userid
            AND deleted is null
            ";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
          $picked='yes';
        }
      }

      $sql = "SELECT title, artist, year, bpm FROM songs 
      WHERE id = '$key'
      ";

      $result = mysqli_query($conn,$sql);

      if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          extract($row);
        }
        echo
          "<div class='$colwidth song-column'>

            <h4> $title </h4>
            <h5> $artist </h5>
            <h5> ($year) </h5>
          
            <div class='center songbox'>";

        if($picked=='yes'){
          echo "
              <button id='$key' class='btn btn-md btn-default' onclick='songUnpick(this.id);'>
                <span class='glyphicon glyphicon-star'></span>
              </button>";
        } else {
          echo "
              <button id='$key' class='btn btn-md btn-default' onclick='songPick(this.id);'>
                <span class='glyphicon glyphicon-star-empty'></span>
              </button>";
        }          

          echo "
              <button id='$key' class='btn btn-md btn-default' onclick='songPlay(this.id);'>
              <span class='glyphicon glyphicon-play'></span>
              </button>";   

          if($_SESSION['role']=='admin'){
            echo "
              <button id='$key' class='btn btn-md btn-default' onclick='songDelete(this.id);'>
                <span class='glyphicon glyphicon-trash'></span>
              </button>";
          }

          echo
            "</div>
          </div>";
      } 
    }
  }

  function pickShow(){

    global $conn;
    $array = [];

    if(isset($_SESSION['userid'])) {
      $userid = $_SESSION['userid'];
      $sql = "SELECT songid FROM picks 
              WHERE deleted is null
              AND userid = $userid 
              ";
    } else {
      $sql = "SELECT songid,count(songid) FROM picks 
              WHERE deleted is null
              GROUP BY songid
              ORDER BY count(songid) DESC LIMIT 8
              ";
    }
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)) {
        extract($row);
        array_push($array, $songid);
      }
    }

    switch (sizeof($array)%4) {
      case 0:
        $colwidth = "col-lg-3";
        break;

      case 1:
        $colwidth = "col-lg-12";
        break;

      case 2:
        $colwidth = "col-lg-6";
        break;

      case 3:
        $colwidth = "col-lg-4";
        break;
      
      default:
        $colwidth = "col-lg-12";
        break;
    }

    foreach ($array as $key) {

      global $conn;

      $picked='';
      if(isset($_SESSION['userid'])){
        $userid = $_SESSION['userid'];
        $sql = "SELECT * FROM picks 
            WHERE songid = $key
            AND userid = $userid
            AND deleted is null
            ";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
          $picked='yes';
        }
      }

      $sql = "SELECT title, artist, year, bpm FROM songs 
              WHERE id = '$key'
              ";

      $result = mysqli_query($conn,$sql);

      if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          extract($row);
        }
        echo
          "<div class='$colwidth pick-column'>

            <h4> $title </h4>
            <h5> $artist </h5>
            <h5> ($year) </h5>
          
            <div class='center pickbox'>";

        if($picked=='yes'){
          echo "
              <button id='$key' class='btn btn-md btn-default' onclick='songUnpick(this.id);'>
                <span class='glyphicon glyphicon-star'></span>
              </button>";
        } else {
          echo "
              <button id='$key' class='btn btn-md btn-default' onclick='songPick(this.id);'>
                <span class='glyphicon glyphicon-star-empty'></span>
              </button>";
        }

        echo "
              <button id='$key' class='btn btn-md btn-default' onclick='songPlay(this.id);'>
              <span class='glyphicon glyphicon-play'></span>
              </button>";             

          if($_SESSION['role']=='admin'){
            echo "
              <button id='$key' class='btn btn-md btn-default' onclick='songDelete(this.id);'>
                <span class='glyphicon glyphicon-trash'></span>
              </button>";
          }

          echo
            "</div>
          </div>";
      } 
    }
  }
?>