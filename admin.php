<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <?php
    // Allows the page to be visualized only for admins.
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: ./index.php');
        die();
    } else if ($_SESSION['user'] !== 'ADMIN') {
        header('Location: ./index.php');
        die();
    }
    ?>
</head>

<body>
    <h1>SUBIR ARCHIVOS</h1>
</body>

</html>