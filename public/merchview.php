<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/merch.css">
    <link rel="stylesheet" href="./public/css/merch2.css">
    <link rel="stylesheet" href="./public/css/bootstrap-grid.min.css">
    <link href="./public/assets/logo.svg" rel="icon">
    <title>Tienda</title>
    <?php session_start(); ?>
</head>

<body>
    <?php include_once('./public/header.php'); ?>
    <main>
        <div class="row justify-content-center">
            <?php
            while ($row = mysqli_fetch_row($result)) {
                    echo "
                    <div class='col-lg-4 item'>
                        <div class='item-container'>
                            <img class='movieposter' src='./public/assets/merch/$row[4]' height='300px' alt=''>
                            <p class='price'>$ $row[3]</p>
                            <p class='name'>$row[2]</p>
                            <button>Ir a comprar</button>
                        </div>
                    </div> ";
             }
            ?>
    </main>
    <script src="./public/js/bootstrap.min.js"></script>
</body>
<footer>
    <div class="info">
        <p id="name">By <span>Jorge L. Tohmé</span></p>
        <p> <a href="https://github.com/JorTohme">Github</a> </p>
    </div>
</footer>
</html>