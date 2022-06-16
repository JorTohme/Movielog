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
    <script src="./public/js/pages.js" defer></script>
    <title>Movielog</title>
    <?php include('./private/db.php') ; session_start(); ?>
</head>

<body>
    <?php include_once('./public/header.php'); ?>
    <h2> Últimas películas </h2>
    <div id="maincontent">
        <div class="container movies-container">
            <div class="row justify-content-around">
                <?php
                    if (isset($_GET['search'])) {
                        $movies = searchMovies($db, $_GET['search']);
                    } else  {
                        $movies = getMovies($db);
                    }
                    $moviesArray = [];
                    while ($row = mysqli_fetch_row($movies)) {
                        $moviesArray[] = "
                            <div class='col-lg-4 movie'>
                                <a href='./merch.php?movie=$row[0]'>
                                    <img class='movieposter' src='./public/assets/posters/$row[1]' alt=''>
                                    <p class='movie-title'>$row[0]</p>
                                    <p>Catálogo</p>
                                </a>
                            </div> "; 
                    }
                    if (!isset($_GET['page'])) {
                        for ($i=0; $i < 6; $i++) {echo $moviesArray[$i];}
                    } else {
                        for ($i= 6 * ($_GET['page']-1); $i <  6 * ($_GET['page']); $i++) {
                            if ($moviesArray[$i] ?? null) {
                                echo $moviesArray[$i];
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="button-container">
        <div class="page-button">
            <button id="backward"><</button>
                <p class="page-number" id="page"><?php if(isset($_GET['page'])) {echo ($_GET['page']);} else {echo "1";} ?>
            <button id="forward">></button>
        </div>
    </div>
</body>

<footer>
    <div class="info">
        <p id="name">By <span>Jorge L. Tohmé</span></p>
        <p> <a href="https://github.com/JorTohme">Github</a> </p>
    </div>
</footer>

</html>