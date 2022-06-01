<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./public/assets/logo.svg" rel="icon">
    <link href="./public/css/style.css" rel="stylesheet">
    <link href="./public/css/style2.css" rel="stylesheet">
    <link href="./public/css/bootstrap-grid.min.css" rel="stylesheet">
    <title>Movielog</title>
    <?php include('./private/movies.php'); session_start(); ?>
</head>

<body>
    <?php include_once('./public/header.php'); ?>
    <h2> Últimas películas </h2>
    <div id="maincontent">
        <div class="container movies-container">
            <div class="row justify-content-around">
            <?php
                while ($row = mysqli_fetch_row($result)) {
                   echo "
                        <div class='col-lg-3 movie'>
                            <a href='./merch.php?movie=$row[0]'>
                                <img class='movieposter' src='./public/assets/posters/$row[1]' alt=''>
                                <p class='movie-title'>$row[0]</p>
                                <p>Catálogo</p>
                            </a>
                        </div> "; 
                }
            ?>
            </div>
        </div>
    </div>
</body>

<footer>
    <div class="info">
        <p id="name">By <span>Jorge L. Tohmé</span></p>
        <p> <a href="https://github.com/JorTohme">Github</a> </p>
    </div>
</footer>

<a href="./shoppingcart.php">
    <div class="shopping-cart">
        <img src="./public/assets/shoppingcart.svg" alt="">
        <p>(0)</p>
    </div>
</a>

</html>