<?php
require '../components/connector.php';
  try {
      $database= 'tnelat';
      // connect to the database and create Users table
      $dbconn = new PDO('mysql:host=localhost;',$user, $password);
      $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "CREATE DATABASE IF NOT EXISTS $database CHARSET utf8";
      $dbconn->exec($sql);
      $selecting = "USE `tnelat`;";
      $dbconn->exec($selecting);
      $sql = "CREATE TABLE IF NOT EXISTS Users(firstname varchar(100) NOT NULL, lastname varchar(100) NOT NULL, username varchar(100) NOT NULL,".
        "pass varchar(100) NOT NULL, email varchar(100) NOT NULL, mobile int(25), salt varchar(100) NOT NULL, PRIMARY KEY(username));";
      $dbconn->exec($sql);
  }
    catch (Exception $e) {
      echo "Error: " . $e->getMessage();
  }
    
  if (isset($_POST['commit']) && $_POST['commit'] == 'Create Account') {
    
    // Checking if the username is a duplicate
    $username = $_POST['username'];
    $user_check = $dbconn->prepare("SELECT * FROM Users WHERE username=:username;");
    $user_check->execute(array(':username' => $username));
    
    // Checking if the email is a duplicate
    $email = $_POST['email']; 
    $email_check = $dbconn->prepare("SELECT * FROM Users WHERE email=:email;");
    $email_check->execute(array(':email' => $email));

    // If a phone number is submitted, check if there's a duplicate
    if (isset($_POST['mobile']) && !empty($_POST['mobile'])){
          $mobile = $_POST['mobile'];
          $mobile_check = $dbconn->prepare("SELECT * FROM Users WHERE mobile=:mobile;");
          $mobile_check->execute(array(':mobile' => $mobile));
          $not_null = true;
    }
    else
    {
      $mobile = '';
      $not_null = false;
    }
    if (!isset($_POST['fname']) || !isset($_POST['lname']) || !isset($_POST['username']) || !isset($_POST['pass']) || !isset($_POST['passconf']) || !isset($_POST['email']) ||  empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['username']) || empty($_POST['pass']) || empty($_POST['passconf']) || empty($_POST['email'])) {
      $msg = "Please fill in all form fields.";
    }
    else if ($_POST['pass'] !== $_POST['passconf']) {
      $msg = "Passwords must match.";
    }
    else if ($user_check->rowCount() > 0)
    { 
      $msg = "Username already exists! Please try again."; 
    }
    else if (strpos($email, '@') == FALSE)
    {
      $msg = "Please enter a valid email address.";
    }
    else if ($email_check->rowCount() > 0)
    {
      $msg = "Email already exists! Please try again.";
    }
    else if ($not_null && $mobile_check->rowCount() > 0)
      $msg = "Phone number already exists! Please try again.";
    else {
      // Generate random salt
      $salt = hash('sha256', uniqid(mt_rand(), true));      

      // Apply salt before hashing
      $salted = hash('sha256', $salt . $_POST['pass']);
      
      // Store the salt with the password, so we can apply it again and check the result
      $stmt = $dbconn->prepare("INSERT INTO users(firstname, lastname, username, pass, email, mobile, salt) VALUES (:fname, :lname, :username, :pass, :email, :mobile, :salt)");
      $stmt->execute(array(':fname' => $_POST['fname'], ':lname' => $_POST['lname'],':username' => $username,':pass' => $salted, ':email' => $email, ':mobile' => $mobile, ':salt' => $salt));
      $msg = "Account created.";
    }
    echo $msg;
  } 
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

	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
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
   <form class= "log"  method="POST" action="signup.php" style= " margin-left: auto; margin-right: auto; margin-top: 100px; border: double; width: 600px">
      <div class="container">
        <font color="white"> <h2>Sign Up </h2><p> Already a user? <a href="login.php"><b>Login here</b></a></p></font>
        <p><input  type="text" name="fname" value="" placeholder="First Name"> <b>Enter your first name</b></p> 
        <p><input type="text" name="lname" value="" placeholder="Last Name"> <b>Enter your last name</b></p>
        <p><input type="text" name="username" value="" placeholder="Username"> <b>Create a username</b></p>
        <p><input type="password" name="pass" value="" placeholder="Password"> <b>Create a password</b></p>
        <p><input type="password" name="passconf" value="" placeholder="Re-Type Password"> <b>Re-type your password</b></p>
        <p><input type="text" name="email" value="" placeholder="Email Address"> <b>Enter your email address</b></p>
        <p><input type="text" name="mobile" value="" placeholder="Phone Number"> Enter a reachable phone number</p>
        <p class="submit"><input type="submit" name="commit" value="Create Account"><i> * items in bold are required</i></p>
      </div>
    </form>
  </section>
 

	<!--Resouces-->
	<?php include '../components/scripts.php'; ?>

</body>
</html>
