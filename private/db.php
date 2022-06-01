<?php
// Creates a connection with a mySQL database.
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'movielog'; 

$db = mysqli_connect($host, $user, $password, $database);
?>