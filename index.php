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
  else {
    include "pages/" . $_GET[array_keys($_GET)[0]] . ".php";
  }
?>
  <!--Scripts-->
  <script type="text/javascript" src="js/login.js"></script>
  <script type="text/javascript" src="js/frontpage.js"></script>
  <script type="text/javascript" src="js/review.js"></script>

</body>
</html>