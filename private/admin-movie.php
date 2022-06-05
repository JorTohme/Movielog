<?php
// Uses a database connection.
include 'db.php';

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

$tmpPoster = $_FILES['posterImage']['tmp_name'];
uploadImage($tmpPoster, $posterTitle, 'posters');

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
    }
    $aux = $aux + 2;
}

$tmpMerch1 = $_FILES['merch1-picture']['tmp_name'];
uploadImage($tmpMerch1, cleanName($merch[0]) , 'merch');

$tmpMerch2 = $_FILES['merch2-picture']['tmp_name'];
uploadImage($tmpMerch2, cleanName($merch[2]) , 'merch');

$tmpMerch3 = $_FILES['merch3-picture']['tmp_name'];
uploadImage($tmpMerch3, cleanName($merch[4]) , 'merch');


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
header("location:../index.php?");
