<!--Create new user account-->
<?php
  if (!empty($_SESSION['session_id']))
    header('Location: /tnelat');
?>

<!--Form-->
 <fieldset id="signup" class="pagewidth" >
  <h2>Sign Up</h2>
  <h4>Already a user?&nbsp;&nbsp;<a href="/tnelat?src=login">Login here</a></h4>

  <p id="response"> </p>
  <!--User Full Name-->
  <input type="text" id="first_name" name="first_name" value="" placeholder="First Name*" required>
  <input type="text" id="last_name" name="last_name" value="" placeholder="Last Name*" required>
  <!--Username and Password-->
  <input type="text" id="username" name="username" value="" placeholder="Username*" required>
  <input type="password" id="password" name="password" value="" placeholder="Password*" required>
  <input type="password" id="password_confirm" name="password_confirm" value="" placeholder="Re-Type Password*" required>

  <!--Email, Phone-->
  <input type="text" id="email" name="email" value="" placeholder="Email Address*" required>
  <input type="text" id="phone" name="phone" value="" placeholder="Phone Number" required>

  <!--Submit-->
  <span class="btn" id="submitUser" value="Login">Submit</span>

  <!--Denote Required-->
  <h5 class="float-right">* fields required</h5>
</fieldset>

<!--Post Form-->
<script src="js/signup.js"></script>
