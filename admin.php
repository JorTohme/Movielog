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
    <link rel="stylesheet" href="./public/css/admin.css">
</head>

<body>
    <?php include './public/header.php'?>
    <h2>AÑADIR PELÍCULA</h2>
    <main>
        <form action="" method="POST">
            <h3 class="h3">Título</h3>
            <div class="title-container">
                <input name="movietitle" id="titleInput" required>
            </div>
            <div class="container">
                <div class="container-element-1">
                    <h3 class="h3">Subir poster</h3>
                    <input type="file" name="poster" required>
                </div>
                <div class="container-element-2">
                    <h3 class="h3">Productos</h3>
                    <div class="product">
                        <p>Foto del producto 1</p>
                        <input type="file" name="merch1-picture" required>
                        <p>Nombre del producto 1</p>
                        <input name="merch1-name" width="20px" required>
                    </div>
                    <div class="product">
                        <p>Foto del producto 2</p>
                        <input type="file" name="merch2" required>
                        <p>Nombre del producto 1</p>
                        <input name="merch1-name" width="20px" required></td>
                    </div>
                    <div class="product">
                        <p>Foto del producto 3</p>
                        <input type="file" name="merch3" required>
                        <p>Nombre del producto 1</p>
                        <input name="merch1-name" width="20px" required></td>
                    </div>
                </div>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" id="submit-button">SUBIR</button>
        </form>
    </main>
</body>

</html>