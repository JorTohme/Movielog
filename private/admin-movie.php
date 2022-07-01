<?php
// Uses a database connection.
include 'db.php';

if (isset($_POST['merch1-name']) && isset($_POST['merch2-name'])
    && isset($_POST['merch3-name'])) {
    $merch = [];

    $title = $_POST['movietitle'];

    $merch[] = $_POST['merch1-name'];
    $merch[] = $_POST['merch1-price'];

    $merch[] = $_POST['merch2-name'];
    $merch[] = $_POST['merch2-price'];

    $merch[] = $_POST['merch3-name'];
    $merch[] = $_POST['merch3-price'];

    // Cleaning poster's filename
    $posterTitle = cleanName($title);

    $request = "INSERT INTO movies (title, poster) VALUES ('$title', '$posterTitle.jpg');";
    try {
        $response = mysqli_query($db, $request);
    } catch (Exception $e) {
        mysqli_close($db);
        echo $e;
    }

    // Upload merch
    $aux = 0;
    for ($i = 0; $i < 3; $i++) {
        $aux2 = $aux + 1;
        $merchPictureName = cleanName($merch[$aux]);
        $request = "INSERT INTO merch (movie, name, price, picture) VALUES ('$title', '$merch[$aux]', '$merch[$aux2]', '$merchPictureName.jpg');";

        try {
            $response = mysqli_query($db, $request);
        } catch (Exception $e) {
            mysqli_close($db);
            echo $e;
            header('location:../admin.php?e');
        }
        $aux = $aux + 2;
    }

    $tmpPoster = $_FILES['posterImage']['tmp_name'];
    uploadImage($tmpPoster, $posterTitle, 'posters');

    $tmpMerch1 = $_FILES['merch1-picture']['tmp_name'];
    uploadImage($tmpMerch1, cleanName($merch[0]), 'merch');

    $tmpMerch2 = $_FILES['merch2-picture']['tmp_name'];
    uploadImage($tmpMerch2, cleanName($merch[2]), 'merch');

    $tmpMerch3 = $_FILES['merch3-picture']['tmp_name'];
    uploadImage($tmpMerch3, cleanName($merch[4]), 'merch');

    header('location:../admin.php?m');
} else if (isset($_POST['movie-select']) && isset($_POST['merch-name'])) {
    $merch = [];

    $title = $_POST['movie-select'];

    $merch[] = $_POST['merch-name'];
    $merch[] = $_POST['merch-price'];

    $merchPictureName = cleanName($merch[0]);

    $tmpMerch = $_FILES['merch-picture']['tmp_name'];
    uploadImage($tmpMerch, $merchPictureName, 'merch');

    $request = "INSERT INTO merch (movie, name, price, picture) VALUES ('$title', '$merch[0]', '$merch[1]', '$merchPictureName.jpg');";

    try {
        $response = mysqli_query($db, $request);
    } catch (Exception $e) {
        mysqli_close($db);
        header('location:../admin.php?e');
    }

    header('location:../admin.php?m');
} else if (isset($_POST['movie-delete']) || isset($_POST['product-delete'])) {
    if (isset($_POST['movie-delete'])) {
        $movie = $_POST['movie-delete'];
        $request = "DELETE FROM movies WHERE title='$movie'";
        try {
            $response = mysqli_query($db, $request);
        } catch (Exception $e) {
            mysqli_close($db);
            echo $e;
            header('location:../admin.php?e');
        }

        $movieProducts = getMovieProducts($db, $movie);

        while ($row = mysqli_fetch_row($movieProducts)) {
            echo $row[1];
            DeletePhotos(cleanName($row[1]).'.jpg', 'merch');
        }
        DeletePhotos(cleanName($movie).'.jpg', 'posters');

        $request = "DELETE FROM merch WHERE movie='$movie'";
        try {
            $response = mysqli_query($db, $request);
        } catch (Exception $e) {
            mysqli_close($db);
            header('location:../admin.php?e');
        }

        header('location:../admin.php?m');
    } else if(isset($_POST['product-delete'])){
        $product = $_POST['product-delete'];
        $request = "DELETE FROM merch WHERE name='$product'";

        try {
            $response = mysqli_query($db, $request);
        } catch (Exception $e) {
            mysqli_close($db);
            header('location:../admin.php?e');
        }

        DeletePhotosMerch(cleanName($product));
        header('location:../admin.php?m');
    }

} else if (isset($_POST['product']) && isset($_POST['merch-newprice'])) {
    $newPrice = $_POST['merch-newprice'];
    $product = $_POST['product'];
    $request = "UPDATE merch SET price='$newPrice' WHERE name='$product'";
    try {
        $response = mysqli_query($db, $request);
    } catch (Exception $e) {
        mysqli_close($db);
        header('location:../admin.php?e');
    }
    header('location:../admin.php?m');
}

function cleanName($originalName)
{
    $search = " ";
    $replace = "";
    $cleanName1 = str_replace($search, $replace, $originalName);
    $search = ":";
    $replace = "";
    return str_replace($search, $replace, $cleanName1);
}

function uploadImage($tmpImage, $imageName, $location)
{
    $storageImage = "../public/assets/" . $location . "/" . $imageName . ".jpg";
    if (is_uploaded_file($tmpImage)) {
        copy($tmpImage, $storageImage);
    }
}

mysqli_close($db);
