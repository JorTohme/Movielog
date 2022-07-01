<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/heading.css">
    <link rel="stylesheet" href="./public/css/merch.css">
    <link rel="stylesheet" href="./public/css/bootstrap-grid.min.css">
    <link href="./public/assets/logo.svg" rel="icon">
    <title>Tienda</title>
</head>

<body>
    <?php include_once('./public/header.php'); ?>
    <?php 
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $request = "SELECT * FROM favs WHERE user='$user'";
        $likes = mysqli_query($db, $request);
        while ($row = mysqli_fetch_row($likes)) {
            $likedproducts[] = $row[1];
        }
    }
    mysqli_close($db);
    ?>
    <main>
        <div class="row justify-content-center">
            <?php
            while ($row = mysqli_fetch_row($result)) {
                    echo "
                    <div class='col-lg-3 item'>
                        <div class='item-container'>
                            <img class='movieposter' src='./public/assets/merch/$row[3]' height='300px' alt=''>
                            <p class='price'>$ $row[2]</p>
                            <p class='name'>$row[1]</p>
                            <button>Ir a comprar</button>";
                            if (isset($_SESSION['user'])) {
                                    if(in_array($row[1], $likedproducts)) {
                                        echo "
                                        <div class='fav-container'> 
                                            <a href='./public/addfav.php?f=".$row[1]."'><div class='faved'> </div></a>
                                        </div>";
                                    } else  {
                                        echo "
                                        <div class='fav-container'> 
                                            <a href='./public/addfav.php?f=".$row[1]."'><div class='fav'> </div></a>
                                        </div>";
                                    }
                            }
                    echo "</div> </div> ";             
             }
            ?>
        </div>
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