<?php
  require '../components/connector.php';
  session_start();
  // Connect to the database
  try {
    $dbname = 'tnelat';
    $dbconn = new PDO('mysql:host=localhost;dbname='.$dbname, $user, $password);
  }
  catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }

  // Check login
  if (isset($_POST['commit']) && $_POST['commit'] == 'login') {

  // If the input was a username
    if (strpos($_POST['username'], '@') == FALSE)
    {
      // get the salt from the db
      $salt_stmt = $dbconn->prepare('SELECT salt FROM Users WHERE username=:username'); 
      $salt_stmt->execute(array(':username' => $_POST['username']));

      $res = $salt_stmt->fetch();
      $salt = ($res) ? $res['salt'] : '';

      // salt the password inputted
      $salted = hash('sha256', $salt . $_POST['password']);

      // if the inputted password is correct, we can successfully select from the db
      $login_stmt = $dbconn->prepare('SELECT username FROM Users WHERE username=:username AND pass=:pass');
      $login_stmt->execute(array(':username' => $_POST['username'], ':pass' => $salted));
    }
    else if (strpos($_POST['username'], '@') == TRUE) // if the input was an email
    {
      // get the salt from the db using the email
      $salt_stmt = $dbconn->prepare('SELECT salt FROM Users WHERE email=:email');
      $salt_stmt->execute(array(':email' => $_POST['username']));
        $res = $salt_stmt->fetch();
      $salt = ($res) ? $res['salt'] : '';

      // salt the password inputted
      $salted = hash('sha256', $salt . $_POST['password']);

      // select from the db using the inputted email and salted inputted password
      $login_stmt = $dbconn->prepare('SELECT username FROM Users WHERE email=:email AND pass=:pass');
      $login_stmt->execute(array(':email' => $_POST['username'], ':pass' => $salted));
    }

    // check if we are able to fetch with the salted inputted password
    if ($user = $login_stmt->fetch()) 
    {
      $_SESSION['username'] = $user['username'];
      $err = 'SUCCESS';
    }
    else 
    {
      $err = 'Incorrect username or password.';
    }
  echo $err;
  }
?>
<!DOCTYPE html>
<html >
<head>
	<meta charset="utf-8">
	<?php include 'components/css.php'; ?>
</head>
<body id="lpage">
	<!--Navigation Bar-->
	<?php include 'components/navigation.php'; ?>

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
	<?php include 'components/scripts.php'; ?>

</body>
</html>
