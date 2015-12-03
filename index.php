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
  $app->get('/writereview/:id', function($id) {
    include "pages/writeReview.php";
  });

  //View Reviews
  $app->get('/user', function() {
    include "pages/findPeople.php";
  });

  //User Profile
  $app->get('/user/:name', function($name) {
    include "pages/profile.php";
    profile($name);
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
      //$sql= "INSERT INTO reviews (username, skills, emoji, review) VALUES ('test', 'test', '😍', 'test');";
      $conn->exec($sql);
    } catch(PDOException $e) {     
      echo $e->getMessage();
    }
  });

  //Run Application
  $app->run();
?>