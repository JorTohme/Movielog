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
    <?php
    session_start();
    ?>
</head>

<body>
    <?php
    include_once('./public/header.php')
    ?>

    <h2> Últimas películas </h2>
    <div id="maincontent">
        <div class="container movies-container">
            <div class="row justify-content-around">
                <div class="col-lg-3 movie">
                    <a href="">
                        <img class="movieposter" src="./public/assets/posters/spidermanposter.jpg" alt="">
                        <p class="movie-title">Spider-Man No Way Home</p>
                        <p>Catálogo</p>
                    </a>
                </div>
                <div class="col-lg-3 movie">
                    <a href="">
                        <img class="movieposter" src="./public/assets/posters/batmanposter.jpg" alt="">
                        <p class="movie-title">The Batman (2022)</p>
                        <p>Catálogo</p>
                    </a>
                </div>
                <div class="col-lg-3 movie">
                    <a href="">
                        <img class="movieposter" src="./public/assets/posters/fantasticbeastaposter.jpg" alt="">
                        <p class="movie-title">Fantastic Beasts</p>
                        <p>Catálogo</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="./public/js/bootstrap.min.js"></script>
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