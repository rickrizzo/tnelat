<?php
  require_once "components/connector.php";
  require_once "components/install.php";
  
  //Installation
  install();

  include "pages/home.php";
?>