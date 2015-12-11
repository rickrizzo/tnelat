<!--User profiles, containing reviews, ratings, and user data-->
<?php
  //Variables
  if (count($user = (new GetUser($_GET['UID']))->execute()) > 0) {
    $user = $user[0];
  }
  else {
    exit ('Error. Please log in.');
  }

  $name = ucfirst($user['first_name']) . "&nbsp;&nbsp;" . ucfirst($user['last_name']);
  $reviews = (new GetReviewsAbout($_GET['UID']))->execute();
?>

<section class="pagewidth login pad_bottom">
  <main class='profile_display'>
    <?php profile_bar($user, null); ?>
    
    <?php
      if ($_SESSION['UID'] == $user['UID'])
        echo 
          '<form action="/tnelat/handlers/upload.php" id="upload" method="post" enctype="multipart/form-data">
              <h5>Profile Picture:</h5>&nbsp;<input type="file" name="fileToUpload" id="fileToUpload">
          </form>';
    ?>

    <h2>Reviews</h2>
    <?php
      if(count($reviews) == 0) {
        echo ('<span class="message">This user has no reviews (yet!)</span>');
      }
      else {
        foreach ($reviews as $review) {
          review_bar($review);
        }
      }

      if ($_SESSION['UID'] != $user['UID']) {
        $written_already = false;
        foreach($reviews as $review) {          
          if ($review['authorUID'] == $_SESSION['UID']) {
            $written_already = true;
            break;
          }
        }
        if (!$written_already) {
         echo ('<span class="footer"><a class="btn foot_holder" href="/tnelat/?src=writereview&UID=' . $user['UID'] . '">Review This Person</a></span>');
        }
        else {
          echo ('<span class="footer"><a class="disabled_btn foot_holder">User Already Reviewed</a></span>');
        }
      }
    ?>
  </main>
</section>
<script src="js/delete_review.js"></script>
<script>
  if (document.getElementById("fileToUpload")) {
      document.getElementById("fileToUpload").onchange = function() {
      document.getElementById("upload").submit();
    };
  };
  $(window).load( function() {
    $.getJSON("/tnelat/data/emoji.json", function(data) {
      $(".emoji_detail").each(function() {
        $(this).html(data.emoji[$(this)[0].id]);
      });
    });
  });
</script>
