<?php
// Uses a database connection.
include('db.php');

$email = $_POST['email'];
$name = $_POST['name'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

// Inserts the new account into the database.
$request = "INSERT INTO users (email, pass, username) VALUES ('$email', '$password', '$name');";

// Checks if the email was not already registered, 
// if so, sends an error message and reloads the page.
try {
    $response = mysqli_query($db, $request);
} catch (Exception $e){
    mysqli_close($db);
    header("location:../sign-in.php?register&emailerror");
}

// If there's no errors, closes the database connection and
// redirects to a succes page.
mysqli_close($db);
header("location:../sign-in.php?register&success");
?>