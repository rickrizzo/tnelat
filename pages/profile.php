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
          
          <?php
            if ($_SESSION['UID'] == $user['UID'])
              echo 
                '<form action="/tnelat/dan/upload.php" id="upload" method="post" enctype="multipart/form-data">
                    <h5>Profile Picture:</h5></br>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                </form>';
          ?>

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
            //echo ('<span><a class="btn foot_holder" href="/tnelat/writereview/' . $user_object['UID'] . '">Review This Person</a></span>');
          ?>
        </main>
      </section>

      <script>
      document.getElementById("fileToUpload").onchange = function() {
        document.getElementById("upload").submit();
      };
      </script>
  </body>
</html> 
