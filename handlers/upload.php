<?php 
  //Uploads picture to the database
  session_start();
  if (!isset($_SESSION['UID'])) {
    echo 'Error. You are not logged in.';
    exit;
  }
  //Create directory
  if (!file_exists('path/to/directory')) {
    mkdir($_SERVER['DOCUMENT_ROOT'] . "/tnelat/data/profile_pictures/", 0777, true);
  }
  
  $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/tnelat/data/profile_pictures/" . $_SESSION['UID'];

  $target_file = $target_dir;
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

  // This file was mostly taken from online, but was fairly simple. Didn't really make sense to rewrite it.
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          echo "File is not an image.";
          $uploadOk = 0;
      }
  }

  //Deletes duplicates
  if (file_exists($target_file)) {
    unlink($target_file);
  }

  //Add File
  if ($uploadOk = 0) {
    echo ('Error uploading file');
  }
  else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        if(!isset($_SESSION)) 
          session_start();
        header('Location: /tnelat?src=profile&UID=' . $_SESSION['UID']);
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
  }
?>