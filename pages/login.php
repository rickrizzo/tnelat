<?php
  //include 'connector.php';
  //echo "Let's start!";
?>

<!DOCTYPE html>
<html >
<head>
	<meta charset="utf-8">
	<?php include '../components/css.php'; ?>
</head>
<body id="lpage">
	<!--Navigation Bar-->
	<?php include '../components/navigation.php'; ?>

	<!--About-->
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
  </script>
</head>
<body>
 
<form class= "log" style= " margin-left: auto; margin-right: auto; margin-top: 150px; border: double; width: 380px">
  <div class="container">
    <h2><font color="white">Login </h2>
    <h5>Don't have an account? <b><a href="signup.php"> Sign up here. </a></b></h5>
  </font></div>
  <fieldset>
  <section class="container" >
    <div class="login" >
      <form method="post" action="index.html">
        <p><input type="text" name="username" value="" placeholder="Username or Email"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
    
        <p class="submit"><input type="submit" name="commit" value="login"></p>
      </form>
    </div>

    <div class="login-help">
      <p><font color="white">Forgot your password? <a href="index.php">Click here to reset it</a>.</p>
    </div>
  </section>

	<!--Form-->
	<div class="container">
		
			
	</div>	

</form>

<script>
function myFunction() {
    document.getElementById("myForm").submit();
}
</script>

	<!--Resouces-->
	<?php include '../components/scripts.php'; ?>

</body>
</html>
