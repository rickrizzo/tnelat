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
  	<!--Navigation Bar-->
  	<?php include $_SERVER['DOCUMENT_ROOT'] . "/tnelat/components/nav.php"; ?>

  	<!--Form-->
  	 <fieldset id="signup" class="pagewidth" >
        <h2>Sign Up</h2>
        <h4>Already a user?&nbsp;&nbsp;<a href="/tnelat/pages/login.php">Login here</a></h4>

        <p id="response"> </p>

        <input type="text" id="first_name" name="first_name" value="" placeholder="First Name*">
        <input type="text" id="last_name" name="last_name" value="" placeholder="Last Name*">
        <input type="text" id="username" name="username" value="" placeholder="Username*">
        <input type="password" id="password" name="password" value="" placeholder="Password*">
        <input type="password" id="password_confirm" name="password_confirm" value="" placeholder="Re-Type Password*">
        <input type="text" id="email" name="email" value="" placeholder="Email Address*">
        <input type="text" id="phone" name="phone" value="" placeholder="Phone Number">
        <span class="btn" id="submit" value="Login">Submit</span>

        <h5 class="float-right">* fields required</h5>
    </fieldset>
   
   <script src='dan/Post.js'></script>
   <script>
      $('#submit').click(function() {
        console.log("click");
        var PostReq = new Post('dan/create_account.php');
        PostReq.addParamsById('username', 'password', 'password_confirm', 'first_name', 'last_name', 'email', 'phone');
        PostReq.set_callback( function(val) {
          $('#response').html(val);
          parent.window.location.reload();
        });
        PostReq.send();     
      });
   </script>

  </body>
</html>
