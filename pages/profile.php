<?php
  
  function profile($UID) {
    //Includes
    include 'components/css.php';
    include 'components/connector.php';
    include 'components/scripts.php';
    //include 'components/navigation.php';
    include 'dan/SQL_Operation.php';

    //Connect to DB
    try {
      $conn = new PDO('mysql:host=localhost;dbname=tnelat;',$user, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      //Variables
      $userdata = (new GetUser($UID))->execute();
      $name = ucfirst($userdata[0]['firstname']) . " " . ucfirst($userdata[0]['lastname']);
      $reviews = (new GetReviewsAbout($UID))->execute();

      //Title
      echo "<!DOCTYPE html><html><head><title>" . $name . "</title></head>";
      echo "<body><h1 class='jumbotron'>" . $name . "</h1><section><h2>Reviews</h2>";
      echo '<script>$.getJSON("/tnelat/data/emoji.json", function(data) {$("article").html(data.emoji[' . $reviews[0]['emoji'] . ']); });</script>';
      echo "<article></article>";
      echo "<p>" . $reviews[0]['review']. "</p>";
      echo "</section></body></html>";
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
?>