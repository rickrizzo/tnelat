<?php
  if (!empty($_SESSION['session_id']))
    header('Location: /tnelat');
?>

  	<!--Navigation Bar-->
  	<?php include $_SERVER['DOCUMENT_ROOT'] . "/tnelat/components/nav.php"; ?>

  	<!--Form-->
  	 <fieldset id="signup" class="pagewidth" >
        <h2>Sign Up</h2>
        <h4>Already a user?&nbsp;&nbsp;<a href="/tnelat/pages/login.php">Login here</a></h4>

        <p id="response"> </p>

        <input type="text" id="first_name" name="first_name" value="" placeholder="First Name*" required>
        <input type="text" id="last_name" name="last_name" value="" placeholder="Last Name*" required>
        <input type="text" id="username" name="username" value="" placeholder="Username*" required>
        <input type="password" id="password" name="password" value="" placeholder="Password*" required>
        <input type="password" id="password_confirm" name="password_confirm" value="" placeholder="Re-Type Password*" required>
        <input type="text" id="email" name="email" value="" placeholder="Email Address*" required>
        <input type="text" id="phone" name="phone" value="" placeholder="Phone Number" required>
        <span class="btn" id="submit" value="Login">Submit</span>

        <h5 class="float-right">* fields required</h5>
    </fieldset>
   
   <script>
      $('#submit').click(function() {
        var PostReq = new Post('/tnelat/dan/create_account.php');
        PostReq.addParamsById('username', 'password', 'password_confirm', 'first_name', 'last_name', 'email', 'phone');
        PostReq.set_callback( function(val) {
          $('#response').html(val);
          if(val.indexOf("successful") != -1) {
            parent.window.location.reload();
          }
        });
        PostReq.send();     
      });
   </script>
