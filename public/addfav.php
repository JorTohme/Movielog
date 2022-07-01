<?php
    include('../private/db.php');
    session_start();
    $product = $_GET['f'];
    $user = $_SESSION['user'];

    $request = "SELECT * FROM favs WHERE user='$user' AND merchname='$product'";
    $result = mysqli_query($db, $request);

    if (mysqli_num_rows($result)) {
        $request = "DELETE FROM favs WHERE user='$user' AND merchname='$product'";
        mysqli_query($db, $request); 
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else  {
        $request = "INSERT INTO favs (user, merchname) VALUES ('$user','$product')";
        mysqli_query($db, $request); 
        header('Location: ' . $_SERVER['HTTP_REFERER']); 
    }
?>