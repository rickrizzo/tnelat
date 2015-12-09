<!DOCTYPE html>
<html>
  <head>
    <?php
      include $_SERVER['DOCUMENT_ROOT'] . "/tnelat/components/page_resources.php";

      //Variables
      $user = (new GetUser($_GET['UID']))->execute()[0];
      $name = ucfirst($user['first_name']) . "&nbsp;&nbsp;" . ucfirst($user['last_name']);
      $reviews = (new GetReviewsAbout($_GET['UID']))->execute();

      echo ('<title>' . $name . '</title>')
    ?>
  </head>
  <body>
      <?php include $_SERVER['DOCUMENT_ROOT'] . "/tnelat/components/nav.php"; ?>

      <section class="pagewidth login">
        <main class='profile_display'>
          <?php profile_bar($user, null); ?>
          
          <h2>Reviews</h2>
          <?php
            $i = 0;
            foreach ($reviews as $review) {
              $i++;
              echo "<div class='review'><article  id='"  . $i ."' ></article>";
              echo '<script>$.getJSON("/tnelat/data/emoji.json", function(data) {$("#' . $i . '").html(data.emoji[' . $review["emoji"] . ']); console.log(data.emoji[' . $review['emoji'] . ']);});</script>';
              echo "<p>" . $review['body']. "</p></div>";
            }
            if ($i==0)
              echo ('<span class="message">This user has no reviews (yet!)</span>');
            //Submit Review
            echo ('<span class="foot_holder"><a class="btn foot" href="/tnelat/writereview/' . $user['UID'] . '">Review This Person</a></span>')
          ?>
        </main>
      </section>
  </body>
</html> 
