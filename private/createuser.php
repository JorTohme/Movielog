<?php
include('db.php');

$email = $_POST['email'];
$name = $_POST['name'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

if (!$password === $password2) {
    header("./public/register.php");
}

$request = "INSERT INTO users (email, pass, username) VALUES ('$email', '$password', '$name');";
try {
    $response = mysqli_query($db, $request);
} catch (Exception $e){
    mysqli_close($db);
    header("location:../sign-in.php?register&emailerror");
}

mysqli_close($db);
header("location:../sign-in.php?register&success");

?>