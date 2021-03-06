<?php

  // This page installs the database on the server if it is not already installed.

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
        "first_name varchar(100) NOT NULL, " .
        "last_name varchar(100) NOT NULL, " .
        "username varchar(100) NOT NULL UNIQUE, " . 
        "password varchar(100) NOT NULL, " . 
        "email varchar(100) NOT NULL, " .
        "phone int(25), " .
        "salt varchar(100) NOT NULL, ".
        "admin int(1) NOT NULL, " .
        "PRIMARY KEY (UID));";
      $conn->exec($users);

      //Create Review Table
      $reviews = "CREATE TABLE IF NOT EXISTS reviews(" .
        "RID INT AUTO_INCREMENT, " .
        "authorUID int, " .
        "accountUID int, " .
        "emoji varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL, " .
        "body varchar(2000) NOT NULL, " .
        "rating int NOT NULL," .
        "category varchar(100) NOT NULL, " .
        "PRIMARY KEY (RID));";
      $conn->exec($reviews);

      //Sample Data
     // $conn->exec("INSERT IGNORE INTO users (first_name, last_name, username, password, email, phone, salt) VALUE ('richard', 'plotka', 'dickp', 'password', 'plotka@gmail.com', '2034554422', 'test');");
      //$conn->exec("INSERT IGNORE INTO reviews (authorUID, accountUID, emoji, review) VALUE ('2', '1', '0', 'p good');");

    } catch(PDOException $e) {     
      echo $e->getMessage();
    }
  }
?>