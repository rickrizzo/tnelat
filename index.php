<?php
  require_once "vendor/autoload.php";
  require_once "components/connector.php";
  require_once "components/install.php";
  
  //Installation
  install();

  //Slim App
  $app = new \Slim\Slim();

  /* Routes */
  //Home Page
  $app->get('/', function () {
    include "pages/home.php";
  });

  //New Review
  $app->get('/writereview', function() {
    include "pages/writeReview.php";
  });

  //View Reviews
  $app->get('/reviews', function() {
    include "pages/reviews.php";
  });

  //Login
  $app->get('/login', function() {
    include "pages/login.php";
  });

  //Sign Up
  $app->get('/signup', function() {
    include "pages/signup.php";
  });

  /* API */
  //Variables
  $app->post('/api/review', function() use ($app) {
    //Variables
    global $user, $password;

    //Create Request
    $request = $app->request(); 
    try {
      $conn = new PDO("mysql:host=localhost;dbname=tnelat;", $user, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql= "INSERT INTO reviews (name, skills, emoji, review) VALUES ('test', 'test', '😍', 'test');";
      $conn->exec($sql);
    } catch(PDOException $e) {     
      echo $e->getMessage();
    }
  });

  //Run Application
  $app->run();
?>