<?php
// use the following variables to setup connection to mysql server
$servername = "localhost";
$username = "";
$password = "";

// create connection to mysql
$conn = new mysqli($servername, $username, $password);

// check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected to mysql successfully </br>";

// connect to specific database
$conn->select_db("phpRegLoginExp");

if ( $conn->select_db("phpRegLoginExp") === FALSE) {
  // sql to create database
  $sql = "CREATE DATABASE phpRegLoginExp";
  if ($conn->query($sql) === TRUE) {
      echo "Database created successfully </br>";
      $conn->select_db("phpRegLoginExp");
      echo "Connected to database successfully </br>";
  } else {
      echo "Error creating database: " . $conn->error . "</br>";
  }
} else {
  echo "Connected to database successfully </br>";
}

// check if table exists
$sql = "SHOW TABLES LIKE 'users'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
  echo "Table users exists </br>";
} else {
  echo "Table users does not exist </br>";
  // sql to create table
  $sql = "CREATE TABLE users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(50),
  password VARCHAR(255),
  UNIQUE (email)
  )";

  if ($conn->query($sql) === TRUE) {
      echo "Table users created successfully </br>";
  } else {
      echo "Error creating table: " . $conn->error . "</br>";
  }
}

?>
