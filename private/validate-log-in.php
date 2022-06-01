<?php
include('db.php');

$email = $_POST['email'];
$password = $_POST['password'];

$request = "SELECT * FROM users WHERE email='$email' AND pass='$password'";
$response = mysqli_query($db, $request);


if (mysqli_num_rows($response)) {
    mysqli_close($db);
    session_start();


    if (mysqli_fetch_assoc($response)['admin'] == 1)
    {
        $_SESSION['admin'] = true;
    } else {
        $_SESSION['user'] = mysqli_fetch_assoc($response)['username'];
    }

    header("location:../index.php");
} else {
    mysqli_close($db);
    header("location:../sign-in.php?sign-into-account&error");
}
?>