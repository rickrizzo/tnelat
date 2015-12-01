<?php
  require_once "vendor/autoload.php";

  $app = new \Slim\Slim();

  //Routes
  $app->get('/', function () {
    include "pages/home.php";
  });
  $app->get('/review', function() {
    include "pages/writeReview.php";
  });

  //Run Application
  $app->run();
?>