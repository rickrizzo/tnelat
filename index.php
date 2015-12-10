<?php
  require_once "components/install.php";
  require_once "components/SQL_Operation.php";
  require_once "components/formatting.php";
  
  //Installation
  install();

  //Session
  if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
  }
?>
<!--HTML Header-->
<!DOCTYPE html>
<html lang="en">
<head>
  <!--Meta-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--CSS-->
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="/tnelat/css/stylesheet.css">

  <!--JQuery-->

  <!--Title-->
  <title>Tnelat</title>
</head>
<body>
  <script src="js/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="js/post.js"></script>
<?php
  //Navigation
  include "components/nav.php";

  //Routing
  if(!isset($_GET["src"])) {
    include "pages/home.php";  
  }
  if(isset($_GET["src"]) && $_GET["src"] == "search") {
    include "pages/search.php";
  }
  if(isset($_GET["src"]) && $_GET["src"] == "login") {
    include "pages/login.php";
  }
  if(isset($_GET["src"]) && $_GET["src"] == "signup") {
    include "pages/signup.php";
  }
  if(isset($_GET["src"]) && $_GET["src"] == "profile") {
    include "pages/profile.php";
  }
  if(isset($_GET["src"]) && $_GET["src"] == "review") {
    include "pages/writeReview.php";
  }
?>
  <!--Scripts-->
  <script type="text/javascript" src="js/login.js"></script>
  <script type="text/javascript" src="js/frontpage.js"></script>
  <script type="text/javascript" src="js/review.js"></script>
</body>
</html>