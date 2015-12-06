<?php
  if (isset($_SESSION['session_id'])) {
    header("Location: /tnelat");
  }
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php include 'components/css.php'; ?>

	  <!--Navigation Bar-->
  	<?php include 'components/navigation.php'; ?>
  </head>

  <body>
    <!--Login HTML Form-->
    <section id="login" class="pagewidth">
      <div>
        <h2><font color="white">Login </h2>
        <h5>Don't have an account? <b><a href="/tnelat/signup"> Sign up here. </a></b></h5>
        </font>
      </div>
      <fieldset>
        <section>
          <div>
            <article>
              <p><input id="username" type="text" name="username" value="" placeholder="Username or Email" required></p>
              <p><input id="password" type="password" name="password" value="" placeholder="Password" required></p>
              <p class="btn" id="loginsubmit" value="Login">Submit</p>
            </article>
          </div>
          <div>
            <!--<p><font color="white">Forgot your password? <a href="#">Click here to reset it</a>.</p>-->
          </div>
        </section>
      </fieldset>
    </section>

    <!--Javascript-->
    <script src='/tnelat/dan/Post.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
    <script>


      $('#loginsubmit').click(function() {
          var PostReq = new Post('/tnelat/dan/authentication.php');
          PostReq.addParamsById('username', 'password');
          PostReq.set_callback( function(val) {
            parent.window.location.reload();
          });
          PostReq.send();     
      });
    </script>

  	<!--Resouces-->
  	<?php include 'components/scripts.php'; ?>
  </body>
</html>
