<?php
  function profile($UID) {
    //Includes
    include 'components/css.php';
    include 'components/connector.php';
    //include 'components/navigation.php';

    //Connect to DB
    try {
      $conn = new PDO('mysql:host=localhost;dbname=tnelat;',$user, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      //Variables
      //$name = $conn->exec("SELECT firstname FROM users WHERE UID=1");
      $reviews = $conn->prepare("SELECT * FROM reviews WHERE USERNAME='dickp'");
      $reviews->execute();

      if($reviews->rowCount() > 0) {
        echo "Reviews!";
      } else {
        "nope";
      }

      //Title
      echo "<!DOCTYPE html><html><head><title>" . $name . "</title></head>";
      echo "<body><h1 class='jumbotron'>" . $name . "</h1><section><h2>Reviews</h2>";
      echo "</section></body></html>";
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
?>

