<?php
    if(isset($_GET['sign-into-account'])) {
        include_once('./public/sign-into-account.php');
    } else if (isset($_GET['register'])) {
        include_once('./public/register.php');
    } else {
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
        </html>
";
            
    }
?>