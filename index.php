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
    <header>
        <nav>
            <div id="logo">
                <img src="./public/assets/logo.svg" alt="" id="logo">
                <h1> Movielog </h1>
            </div>
            <div id="menu">
                <?php 
                if (isset($_SESSION['user'])) {
                    $name = $_SESSION['user'];
                    echo "<a> Hola $name </a>";
                    echo "<a href='./private/sign-out.php'> Salir <a>";
                } else {
                    echo "<a href='./sign-in.php?sign-into-account'>Iniciar Sesión</a>";
                    echo "<a href='./sign-in.php?register'>Crear Cuenta</a>";
                }
                ?>
                <a href="./index.php">Catálogo</a>
                <a>Nosotros</a>
                <input type="text" placeholder="Search">
            </div>
        </nav>
    </header>

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

<div class="shopping-cart">
    <img src="./public/assets/shoppingcart.svg" alt="">
    <p>(0)</p>
</div>

</html>