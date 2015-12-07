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
  
        <main>
            <header class="profile" style='width:100%; overflow:auto'>
              <img height='100px' width='100px' class='profile_pic' src='https://lh3.googleusercontent.com/-mLGBxfgzyHI/AAAAAAAAAAI/AAAAAAAAADg/00zpJ3q4oL0/s120-c/photo.jpg'>
              <?php echo("<span style='float: left; text-align: left; margin-left: 15px'>
                            <h2 class='jumbotron'>" . $name . "</h2>
                            <h4>" . $user['username'] . "</h4>
                            <h4><a href=mailto:'" . $user['email'] . "'>" . $user['email'] . "</a></h4>
                         </span>"); 
              ?>
            </header>

          <hr>
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
