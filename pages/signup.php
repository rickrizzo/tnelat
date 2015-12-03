<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <?php include 'components/css.php'; ?>
</head>
<body id="spage">
	<!--Navigation Bar-->
	<?php include 'components/navigation.php'; ?>

	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>
</body>
 

	<!--Form-->
	 <section id="signup" class="pagewidth" >
   <form class= "log"  method="POST" action="signup.php" >
      <div class="container">

        <font color="white"> <h2>Sign Up </h2><p> Already a user? <a href="login.php"><b>Login here</b></a></p>
        <p><input type="text" id="first_name" name="first_name" value="" placeholder="First Name">  Enter your first name*</input></p> 
        <p><input type="text" id="last_name" name="last_name" value="" placeholder="Last Name">  Enter your last name*</input></p>
        <p><input type="text" id="username" name="username" value="" placeholder="Username">  Create a username*</input></p>
        <p><input type="password" id="password" name="password" value="" placeholder="Password">  Create a password*</input></p>
        <p><input type="password" id="password_confirm" name="password_confirm" value="" placeholder="Re-Type Password">Re-type your password*</input></p>
        <p><input type="text" id="email" name="email" value="" placeholder="Email Address">  Enter your email address*</input></p>
        <p><input type="text" id="phone" name="phone" value="" placeholder="Phone Number">  Enter a reachable phone number</input></p>
        <p class="submit"><input type="button" id="submit" name="submit" value="Create Account"><i> * items required</i></input></p>

        <p id="error"> </p>
      </div>
    </form>
  </section>
 
 <script src='dan/Post.js'></script>
 <script>
    $('#submit').click(function() {
      var PostReq = new Post('dan/create_account.php');
      PostReq.addParamsById('username', 'password', 'password_confirm', 'first_name', 'last_name', 'email', 'phone');
      PostReq.set_callback( function (ret) {
        $('#error').html(ret);
      });
      /*PostReq.set_callback( function(val) {
        parent.window.location.reload();
      });*/
      PostReq.send();     
    });
 </script>

	<!--Resouces-->
	<?php include 'components/scripts.php'; ?>

</body>
</html>
