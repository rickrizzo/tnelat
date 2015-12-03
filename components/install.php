<?php
  require_once "connector.php";

  function install() {
    //Variables
    global $host, $user, $password;

    //Installation
    try {
      //Connection
      $conn = new PDO("mysql:host=$host;", $user, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      //Create Database
      $conn->exec("CREATE DATABASE IF NOT EXISTS tnelat CHARACTER SET utf8mb4 COLLATE utf8mb4_bin");
      $conn->exec("USE tnelat");

      //Create User Table
      $users = "CREATE TABLE IF NOT EXISTS users(" .
        "UID INT AUTO_INCREMENT, " .
        "firstname varchar(100) NOT NULL, " .
        "lastname varchar(100) NOT NULL, " .
        "username varchar(100) NOT NULL UNIQUE, " . 
        "pass varchar(100) NOT NULL, " . 
        "email varchar(100) NOT NULL, " .
        "mobile int(25), " .
        "salt varchar(100) NOT NULL, ". 
        "PRIMARY KEY (UID));";
      $conn->exec($users);

      //Create Review Table
      /* Add foreing key for users */
      $reviews = "CREATE TABLE IF NOT EXISTS reviews(" .
        "id INT AUTO_INCREMENT, " .
        "username varchar(200) NOT NULL, " .
        "skills varchar(200) NOT NULL, " .
        "emoji varchar(25) NOT NULL, " .
        "review varchar(1000) NOT NULL, " .
        "PRIMARY KEY (id));";
      $conn->exec($reviews);

    } catch(PDOException $e) {     
      echo $e->getMessage();
    }
  }
?>