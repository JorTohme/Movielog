<?php
// Creates a connection with a mySQL database.
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'movielog';

$db = mysqli_connect($host, $user, $password, $database);

if (isset($_POST['email']) && isset($_POST['name']) && isset($_POST['password']) && isset($_POST['password2'])) {
    createUser($db);
} else if (isset($_POST['email']) && isset($_POST['password'])) {
    validateLogIn($db);
} 


// Selects all the movies from the database.
function getMovies($db)
{
    $request = "SELECT * FROM movies";
    return mysqli_query($db, $request);
}

function validateLogIn($db)
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $request = "SELECT * FROM users WHERE email='$email' AND pass='$password'";
    $response = mysqli_query($db, $request);

    if (mysqli_num_rows($response)) {
        mysqli_close($db);
        session_start();
        $_SESSION['user'] = mysqli_fetch_assoc($response)['username'];
        header("location:../index.php");
    } else {
        mysqli_close($db);
        header("location:../sign-in.php?sign-into-account&error");
    }
}

function createUser($db)
{
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
    } catch (Exception $e) {
        mysqli_close($db);
        header("location:../sign-in.php?register&emailerror");
    }

    // If there's no errors, closes the database connection and
    // redirects to a succes page.
    mysqli_close($db);
    header("location:../sign-in.php?register&success");
}