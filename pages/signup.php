<?php
  //include 'connector.php';
  //echo "Let's start!";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php include '../components/css.php'; ?>
</head>
<body id="spage">
	<!--Navigation Bar-->
	<?php include '../components/navigation.php'; ?>

	<!--About-->
	<div class="container">
		
	</div>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
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
    width: 250px;
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
  </script>
</head>
</body>
 

	<!--Form-->

	 <section class="container" >
   <form class= "log" style= " margin-left: auto; margin-right: auto; margin-top: 100px; border: double; width: 600px">
  <div class="container">
        <font color="white"> <h2>Sign Up </h2><p> Already a user? <a href="login.php"><b>Login here</b></a></p></font>
        <p><input  type="text" name="fname" value="" placeholder="First Name"> <b>Enter your first name</b></p> 
        <p><input type="text" name="lname" value="" placeholder="Last Name"> <b>Enter your last name</b></p>
         <p><input type="text" name="username" value="" placeholder="Username"> <b>Create a username</b></p>
          <p><input type="text" name="password" value="" placeholder="Password"> <b>Create a password</b></p>
           <p><input type="text" name="password" value="" placeholder="Re-Type Password"> <b>Re-type your password</b></p>
            <p><input type="text" name="email" value="" placeholder="Email Address"> <b>Enter your email address</b></p>
             <p><input type="text" name="mobile" value="" placeholder="Phone Number"> Enter a reachable phone number</p>
        <p class="submit"><input type="submit" name="commit" value="Create Account"><i> * items in bold are required</i></p>
      </form>
    </div>
	</div>	
  </section>
 

	<!--Resouces-->
	<?php include '../components/scripts.php'; ?>

</body>
</html>
