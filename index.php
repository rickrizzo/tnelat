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
    include "/tnelat/pages/findPeople.php";
  });

  //User Profile
  $app->get('/user/:name', function($name) {
    include "/tnelat/pages/profile.php";
    profile($name);
  });

  //Login
  $app->get('/login', function() {
    include "/pages/login.php";
  });

  //Sign Up
  $app->get('/signup', function() {
    include "/pages/signup.php";
  });

  //Run Application
  $app->run();
?>