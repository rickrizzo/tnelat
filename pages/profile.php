<?php
  session_start();
  function profile($UID) {
    //Includes
    include 'components/css.php';
    include 'components/connector.php';
    include 'components/scripts.php';
    include 'components/navigation.php';
    include 'dan/SQL_Operation.php';

    //Variables
    $userdata = (new GetUser($UID))->execute();

    $name = ucfirst($userdata[0]['first_name']) . " " . ucfirst($userdata[0]['last_name']);
    $reviews = (new GetReviewsAbout($UID))->execute();

    //Title
    echo "<!DOCTYPE html><html><head><title>" . $name . "</title></head>";
    echo "<body id='profile' class='pagewidth'><h1 class='jumbotron'>" . $name . "</h1>";

    //Submit Review
    echo "<a class='btn' href='/tnelat/writereview/" . $UID . "'>Review This Person</a>";

    echo "<section><h2>Reviews</h2>";
    foreach ($reviews as $review) {
      echo '<div class="review"><script>$.getJSON("/tnelat/data/emoji.json", function(data) {$("article").html(data.emoji[' . $review['emoji'] . ']); });</script>';
      echo "<article></article>";
      echo "<p>" . $review['body']. "</p></div>";
    }
    echo "</section></body></html>";
  }
?>