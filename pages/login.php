<?php
  session_start();
  if (isset($_SESSION['session_id'])) {
    header("Location: ../index.php");
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php include '../components/css.php'; ?>

	  <!--Navigation Bar-->
  	<?php include '../components/navigation.php'; ?>
  </head>

  <body>
    <!--Login HTML Form-->
    <section class="log" style="margin-left: auto; margin-right: auto; margin-top: 150px; border: double; width: 380px">
      <div class="pagewidth">
        <h2><font color="white">Login </h2>
        <h5>Don't have an account? <b><a href="signup.php"> Sign up here. </a></b></h5>
        </font>
      </div>
      <fieldset>
        <section class="pagewidth">
          <div class="login">
            <article>
              <p><input id="username" type="text" name="username" value="" placeholder="Username or Email" required></p>
              <p><input id="password" type="password" name="password" value="" placeholder="Password" required></p>
              <p class="submit"><input id="login" type="button" name="commit" value="Login"></p>
            </article>
          </div>
          <div class="login-help">
            <p><font color="white">Forgot your password? <a href="index.php">Click here to reset it</a>.</p>
          </div>
        </section>
      </fieldset>
    </section>

    <!--Javascript-->
    <script src='../dan/Post.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
    <script>
      function myFunction() {
          document.getElementById("myForm").submit();
      }

      $('#login').click(function() {
          var PostReq = new Post('../dan/authentication.php');
          PostReq.addParamsById('username', 'password');
          PostReq.set_callback( function(val) {
            parent.window.location.reload();
          });
          PostReq.send();     
      });
    </script>

  	<!--Resouces-->
  	<?php include '../components/scripts.php'; ?>
  </body>
</html>
