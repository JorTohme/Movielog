<?php
include('./private/db.php');
// Selects all the movies from the database.
$request = "SELECT * FROM movies";
$result = mysqli_query($db, $request);
mysqli_close($db);
?>