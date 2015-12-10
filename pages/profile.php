<?php
  //Variables
  $user = (new GetUser($_GET['UID']))->execute()[0];
  $admin = (new GetUser($_SESSION['UID']))->execute()[0]['admin'];
  $name = ucfirst($user['first_name']) . "&nbsp;&nbsp;" . ucfirst($user['last_name']);
  $reviews = (new GetReviewsAbout($_GET['UID']))->execute();
?>

<section class="pagewidth login">
  <main class='profile_display'>
    <?php profile_bar($user, null); ?>
    
    <?php
      if ($_SESSION['UID'] == $user['UID'])
        echo 
          '<form action="/tnelat/handlers/upload.php" id="upload" method="post" enctype="multipart/form-data">
              <h5>Profile Picture:</h5>&nbsp;<input type="file" name="fileToUpload" id="fileToUpload">
          </form>';
        echo '<script src="js/profile_upload.js"></script>';
    ?>

    <h2>Reviews</h2>
    <?php
      $i = 0;
      foreach ($reviews as $review) {
        $i++;
        echo "<div class='review'><article  id='"  . $i ."' ></article>";
        echo '<script>$.getJSON("/tnelat/data/emoji.json", function(data) {$("#' . $i . '").html(data.emoji[' . $review["emoji"] . ']); console.log(data.emoji[' . $review['emoji'] . ']);});</script>';
        echo "<p>" . $review['body']. "</p>";
        if($admin || $user['UID'] == $_SESSION['UID']) {
          echo "<button id='delete' value=" .$review['RID'] . ">Delete</button>";
        }
        echo "</div>";
      }
      if ($i==0)
        echo ('<span class="message">This user has no reviews (yet!)</span>');

      if ($_SESSION['UID'] != $user['UID']) {
        $written_already = false;
        foreach($reviews as $review) {
          //var_dump($review);
          
          if ($review['authorUID'] == $_SESSION['UID']) {
            $written_already = true;
            break;
          }
        }

        if (!$written_already)
         echo ('<span class="footer"><a class="btn foot_holder" href="/tnelat/pages/writereview.php?UID=' . $user['UID'] . '">Review This Person</a></span>');
        else
          echo ('<span class="footer"><a class="disabled_btn foot_holder">User Already Reviewed</a></span>');
      }
    ?>
  </main>
</section>
<script>
  $('#delete').click(function() {
    var PostReq = new Post('/tnelat/handlers/delete_review.php');
    PostReq.addParamByPair("RID", $('#delete').val());
    PostReq.set_callback(function(val) {
      if(val == 'SUCCESS') {
        parent.window.location.reload();
      } else {
        alert(val);
      }
    });
    PostReq.send();
  });
</script>