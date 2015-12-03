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
      $conn->exec("CREATE DATABASE IF NOT EXISTS tnelat CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
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
      $reviews = "CREATE TABLE IF NOT EXISTS reviews(" .
        "RID INT AUTO_INCREMENT, " .
        "username varchar(100), " .
        "skills varchar(191) NOT NULL, " .
        "emoji varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL, " .
        "review varchar(1000) NOT NULL, " .
        "FOREIGN KEY(username) REFERENCES users(username), " .
        "PRIMARY KEY (RID));";
      $conn->exec($reviews);

      //Sample Data
      $conn->exec("INSERT IGNORE INTO users (firstname, lastname, username, pass, email, mobile, salt) VALUE ('dick', 'plotka', 'dickp', 'password', 'plotka@gmail.com', '2034554422', 'test');");
      $conn->exec("INSERT IGNORE INTO reviews (username, skills, emoji, review) VALUE ('dickp', 'karate', '0', 'p good');");

    } catch(PDOException $e) {     
      echo $e->getMessage();
    }
  }
?>