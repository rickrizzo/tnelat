<!DOCTYPE html>
<html>
  <head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/tnelat/components/page_resources.php"; ?>
  </head>
  <body>

    <?php
      function profile($UID) {

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
        $i = 0;
        foreach ($reviews as $review) {
          $i++;
          echo "<div class='review'><article  id='"  . $i ."' ></article>";
          echo '<script>$.getJSON("/tnelat/data/emoji.json", function(data) {$("#' . $i . '").html(data.emoji[' . $review["emoji"] . ']); console.log(data.emoji[' . $review['emoji'] . ']);});</script>';
          echo "<p>" . $review['body']. "</p></div>";
        }
        echo "</section></body></html>";
      }
    ?>
  </body>
</html> 
