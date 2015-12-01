<?php
  require_once "vendor/autoload.php";

  $app = new \Slim\Slim();

  /* Routes */
  //Home Page
  $app->get('/', function () {
    include "pages/home.php";
  });

  //New Review
  $app->get('/review', function() {
    include "pages/writeReview.php";
  });

  //View Reviews
  $app->get('/reviews', function() {
    include "pages/reviews.php";
  });

  //Sign Up
  $app->get('/signup', function() {
    include "pages/signup.php";
  });

  //Run Application
  $app->run();
?>