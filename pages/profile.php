<?php
  function profile($name) {
    include 'components/css.php';
    include 'components/navigation.php';
    echo "<!DOCTYPE html><html><head><title>" . $name . "</title></head>";
    echo "<body><h1 class='jumbotron'>" . $name . "</h1><section><h2>Reviews</h2></section></body>";
    echo "</html>";
  }
?>

