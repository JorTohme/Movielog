<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./public/assets/logo.svg" rel="icon">
    <link rel="stylesheet" href="./public/css/heading.css">
    <link rel="stylesheet" href="./public/css/merch.css">
    <link rel="stylesheet" href="./public/css/bootstrap-grid.min.css">
    <title>Movielog</title>
</head>

<body>
    <?php include_once('./public/header.php'); include('./private/db.php')?>
    <?php 
        if (!isset($_SESSION['user'])) {
            header('Location: ./index.php');
            die();
        }
    ?>
    <main>
        <div class="row justify-content-center">
        <?php
            $username = $_SESSION['user'];
            // Searchs for that movie's merch.
            $request = "SELECT * FROM favs WHERE user='$username'";
            $result = mysqli_query($db, $request);

            $user = $_SESSION['user'];
            $request = "SELECT * FROM favs WHERE user='$user'";
            $likes = mysqli_query($db, $request);
            while ($row = mysqli_fetch_row($likes)) {
                $likedproducts[] = $row[1];
            }

            while ($row = mysqli_fetch_row($result)) {
                $request = "SELECT * FROM merch WHERE name='$row[1]'";
                $product = mysqli_query($db, $request);

                while ($row2 = mysqli_fetch_row($product)) {
                    echo "
                    <div class='col-lg-3 item'>
                        <div class='item-container'>
                            <img class='movieposter' src='./public/assets/merch/$row2[3]' height='300px' alt=''>
                            <p class='price'>$ $row2[2]</p>
                            <p class='name'>$row2[1]</p>
                            <button>Ir a comprar</button>";
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
                    echo "
                    </div> 
                        </div>";
                }
            }
        ?>
        </div>
    </main>
</body>

</html>