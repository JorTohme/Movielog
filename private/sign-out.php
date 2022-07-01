<?php
// Destroys the user session.
session_start();
session_destroy();
if (isset($_COOKIE['remember-user'])) {
    unset($_COOKIE['remember-user']); 
    setcookie('remember-user', null, -1, '/'); 
}
header("location:../index.php");
?>