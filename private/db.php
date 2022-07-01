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

function searchMovies($db, $search)
{
    $request = "SELECT * FROM movies WHERE title like '%".$search."%'";
    return mysqli_query($db, $request);
}

function getProducts($db) {
    $request = "SELECT * FROM merch";
    return mysqli_query($db, $request);
}

function getMovieProducts($db, $movie) {
    $request = "SELECT * FROM merch WHERE movie='$movie'";   
    return mysqli_query($db, $request);
}

function validateLogIn($db)
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $request = "SELECT * FROM users WHERE email='$email'";
    $response = mysqli_query($db, $request);

    if (mysqli_num_rows($response)) {
        $response = mysqli_fetch_assoc($response);
        if (password_verify($password, $response['pass'])) {
            mysqli_close($db);
            session_start();
            if (isset($_POST['remember-me']) && $_POST['remember-me'] == "remember-me") {
                setcookie("remember-user", $response['username'] , time() + (86400 * 30), "/");
            }
            $_SESSION['user'] = $response['username'];
            header("location:../index.php");
        } else  {
            mysqli_close($db);
            header("location:../sign-in.php?sign-into-account&error");
        }   
    } else {
        mysqli_close($db);
        header("location:../sign-in.php?sign-into-account&error");
    }
    
}

function validateLogIn2($db, $email, $password)
{
    $request = "SELECT * FROM users WHERE email='$email'";
    $response = mysqli_query($db, $request);

    if (mysqli_num_rows($response)) {
        $response = mysqli_fetch_assoc($response);
        if (password_verify($password, $response['pass'])) {
            mysqli_close($db);
            session_start();
            $_SESSION['user'] = $response['username'];
            header("location:../index.php");
        } else  {
            mysqli_close($db);
            header("location:../sign-in.php?sign-into-account&error");
        }
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

    if (!($password === $password2)) {
        header("location:../sign-in.php?register&emailerror");
    } 

    if ($name === 'ADMIN') {
        header("location:../sign-in.php?register&emailerror");
    }
    // Inserts the new account into the database.
    $password_hash= password_hash($password, PASSWORD_DEFAULT, array("cost"=>12));
    $request = "INSERT INTO users (email, pass, username) VALUES ('$email', '$password_hash', '$name');";

    // Checks if the email was not already registered,
    // if so, sends an error message and reloads the page.
    try {
        $response = mysqli_query($db, $request);
    } catch (Exception $e) {
        mysqli_close($db);
        header("location:../sign-in.php?register&emailerror");
    }

    // If there's no errors, closes the database connection.
    validateLogIn2($db, $email, $password);
}

function DeletePhotos($fileToDelete, $from) {
    unlink('../public/assets/'.$from.'/'.$fileToDelete);
}

function DeletePhotosMerch($fileToDelete) {
    unlink('../public/assets/merch/'.$fileToDelete.'.jpg');
}

function checkRememberme() {
    if(isset($_COOKIE['remember-user'])) {
        $_SESSION['user'] = $_COOKIE['remember-user'];
    }
}