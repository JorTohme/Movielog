<?php
include('./private/db.php');
function error404() {
    echo "
    <!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='./public/css/404.css'>
        <title>404</title>
    </head>
    <body>
        <div class='error-message'>
            <h1>Oops, este lugar no existe ¿?</h1>
            <p>ERROR: 404</p>
            <p>Página no encontrada</p>
        </div>
    </body>
    </html> ";
}

// Checks if there's a $_GET movie variable.
if (!isset($_GET['movie'])) { error404(); } 

// Saves the movie's title.
$movie = $_GET['movie'];
// Searchs for that movie's merch.
$request = "SELECT * FROM merch WHERE movie IN ('$movie')";
$result = mysqli_query($db, $request);
// If there's a response, open the merch view, if there's not, 
// send an error message.
if (mysqli_num_rows($result)) {
    mysqli_close($db);
    include('./public/merchview.php');
} else {
    error404();
}