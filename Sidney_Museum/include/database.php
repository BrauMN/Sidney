<?php

$server = 'nemonico.com.mx';
$username = 'sepherot_daniela';
$password = '4sp54mHXgk';
$database = 'sepherot_danielaBD';

$conexion = mysqli_connect($server,$username,$password,$database);

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?>