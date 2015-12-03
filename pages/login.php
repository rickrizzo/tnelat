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

  	<!--About-->
  	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
   
    <style>
    label {
      display: inline-block; width: 5em;
    }
    fieldset div {
      margin-bottom: 2em;
    }
    fieldset .help {
      display: inline-block;
    }
    .ui-tooltip {
      width: 210px;
    }
    </style>

    <script>
      $(function() {
        var tooltips = $( "[title]" ).tooltip({
          position: {
            my: "left top",
            at: "right+5 top-5"
          }
        }); 
      });
    </script>
  </head>

  <body>

    <form class= "log"  method="post" action="login.php" style="margin-left: auto; margin-right: auto; margin-top: 150px; border: double; width: 380px">
   
    <div class="container">
      <h2><font color="white">Login </h2>
      <h5>Don't have an account? <b><a href="signup.php"> Sign up here. </a></b></h5>
    </font></div>

    <fieldset>
      <section class="container" >
        <div class="login" >
          <form method="post" action="index.html">
            <p><input id="username" type="text" name="username" value="" placeholder="Username or Email" required></p>
            <p><input id="password" type="password" name="password" value="" placeholder="Password" required></p>
        
            <p class="submit"><input id="login" type="button" name="commit" value="Login"></p>
          </form>
        </div>

        <div class="login-help">
          <p><font color="white">Forgot your password? <a href="index.php">Click here to reset it</a>.</p>
        </div>
      </section>
    </form>
    <script src='../dan/Post.js'></script>
    <script>
      function myFunction() {
          document.getElementById("myForm").submit();
      }

      $('#login').click(function() {
          var PostReq = new Post('../dan/authentication.php');
          PostReq.addParamsById('username', 'password');
          PostReq.set_callback( function() {
            parent.window.location.reload();
          });
          PostReq.send();     
      });
    </script>

  	<!--Resouces-->
  	<?php include '../components/scripts.php'; ?>

  </body>
</html>
