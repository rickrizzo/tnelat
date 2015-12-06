<?php
  session_start();
  if (!empty($_SESSION['session_id']))
    header('Location: /tnelat');
?>

<!DOCTYPE html>
<html>
  <head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/tnelat/components/page_resources.php"; ?>
  </head>

  <body>

    <?php include $_SERVER['DOCUMENT_ROOT'] . "/tnelat/components/nav.php"; ?>
    
    <!--Login HTML Form-->
    <section id="login" class="pagewidth">
      <h2 class='small_header'>Login</h2>
      <h4 class='small_header'>Don't have an account?&nbsp;&nbsp;<a href="/tnelat/signup" class='bold'><span>Sign up here</span></a></h4>
      <fieldset>
          <input id="username" type="text" name="username" value="" placeholder="Username or Email">
          <input id="password" type="password" name="password" value="" placeholder="Password">
          <span class="btn" id="loginsubmit" value="Login">Submit</span>
        <!--<p><font color="white">Forgot your password? <a href="#">Click here to reset it</a>.</p>-->
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
  </body>
</html>
