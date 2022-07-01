<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./public/assets/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="./public/css/heading.css">
    <title>Admin</title>
    <link rel="stylesheet" href="./public/css/admin.css">
</head>

<body>
    <?php include_once './public/header.php'; include_once('./private/db.php');?>
    <?php
    // Allows the page to be visualized only for admins.
    if (!isset($_SESSION['user'])) {
        header('Location: ./index.php');
        die();
    } else if ($_SESSION['user'] !== 'ADMIN') {
        header('Location: ./index.php');
        die();
    }
    ?>
    <div class="buttons-container">
        <button class="button" id="new-movie-button">Añadir Película</button>
        <button class="button" id="add-merch-button">Añadir Merch</button>
        <button class="button" id="edit-movie-button">Eliminar Película</button>
        <button class="button" id="edit-merch-button">Editar Merch</button>
    </div>
    <h2 id="h2-title">AÑADIR PELÍCULA</h2>
    <?php if (isset($_GET['m'])) { echo "<p id='m' style='font-family: sans-serif;color:white; text-align:center'>Añadido correctamente</p>";}?>
    <?php if (isset($_GET['e'])) { echo "<p id='e' style='font-family: sans-serif;color:red; text-align:center'>Hubo un error</p>";}?>
    <main>
        <form id="new-movie" action="./private/admin-movie.php" method="POST" enctype="multipart/form-data">
            <h3 class="h3">Título</h3>
            <div class="title-container">
                <input name="movietitle" id="titleInput" required>
            </div>
            <div class="container">
                <div class="container-element-1">
                    <h3 class="h3">Subir poster</h3>
                    <input type="file" name="posterImage" required>
                </div>
                <div class="container-element-2">
                    <h3 class="h3">Productos</h3>
                    <div class="product">
                        <p>Foto del producto 1</p>
                        <input type="file" name="merch1-picture" required>
                        <div class="product-attributes-container">
                            <div class="product-attributes">
                                <label for="merch1-name">Nombre</label>
                                <input name="merch1-name" id="merch1-name" class="product-input" required>
                            </div>
                            <div class="product-attributes-number">
                                <label for="merch1-price">Precio</label>
                                <input name="merch1-price" id="merch1-price" class="product-input-number" type="number"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="product">
                        <p>Foto del producto 2</p>
                        <input type="file" name="merch2-picture" required>
                        <div class="product-attributes-container">
                            <div class="product-attributes">
                                <label for="merch2-name">Nombre</label>
                                <input name="merch2-name" id="merch2-name" class="product-input" required>
                            </div>
                            <div class="product-attributes-number">
                                <label for="merch2-price">Precio</label>
                                <input name="merch2-price" id="merch2-price" class="product-input-number" type="number"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="product">
                        <p>Foto del producto 3</p>
                        <input type="file" name="merch3-picture" required>
                        <div class="product-attributes-container">
                            <div class="product-attributes">
                                <label for="merch3-name">Nombre</label>
                                <input name="merch3-name" id="merch2-name" class="product-input" required>
                            </div>
                            <div class="product-attributes-number">
                                <label for="merch3-price">Precio</label>
                                <input name="merch3-price" id="merch2-price" class="product-input-number" type="number"
                                    required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" id="submit-button">SUBIR</button>
        </form>

        <form id="add-merch" action="./private/admin-movie.php" method="POST" enctype="multipart/form-data">
            <h3 class="h3">Añadir producto</h3>
            <div class="movie-selector">
                <label for="movie-select">Seleccionar película</label>
                <select name="movie-select" id="movie-select" required>
                    <?php
                        $movies = getMovies($db);
                        while ($row = mysqli_fetch_row($movies)) {
                        echo "<option value='$row[0]'>$row[0]</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="product-merch">
                <p>Foto del producto</p>
                <input type="file" name="merch-picture" required>
            </div>
            <div class="product-attributes-container">
                <div class="product-attributes">
                    <label for="merch-name">Nombre</label>
                    <input name="merch-name" id="merch-name" class="product-input" required>
                </div>
                <div class="product-attributes-number">
                    <label for="merch-price">Precio</label>
                    <input name="merch-price" id="merch-price" class="product-input-number" type="number" required>
                </div>
            </div>
            <div class="submit-button">
                <button type="submit" id="submit-button">SUBIR</button>
            </div>
        </form>

        <div id="edit-movie">
            <form action="./private/admin-movie.php" method="POST" enctype="multipart/form-data" class="form-no-decoration">
                <h3 class="h3">Eliminar película</h3>
                <select name="movie-delete" id="movie-select" required>
                    <?php
                        $movies = getMovies($db);
                        while ($row = mysqli_fetch_row($movies)) {
                            echo "<option value='$row[0]'>$row[0]</option>";
                        }
                    ?>
                </select>
                <button type="submit" id="submit-button-marginnone">Eliminar</button>
            </form>
            <form action="./private/admin-movie.php" method="POST" enctype="multipart/form-data" class="form-no-decoration">
                <h4 class="h3">O eliminar un producto:</h4>
                <select name="product-delete" id="movie-select" required>
                    <?php
                        $product = getProducts($db);
                        while ($row1 = mysqli_fetch_row($product)) {
                            echo "<option value='$row1[1]'>$row1[1]</option>";
                        }
                    ?>
                </select>
                <button type="submit" id="submit-button">Eliminar</button>
            </form>
        </div>

        <form id="edit-merch" action="./private/admin-movie.php" method="POST" enctype="multipart/form-data">
            <h3 class="h3">Editar Merch</h3>
            <div class="select-merch">
                <p>Editar precio de:</p>
                <select name="product" id="movie-select" required>
                    <option value='none'>Ninguno</option>
                    <?php
                        $product = getProducts($db);
                        while ($row1 = mysqli_fetch_row($product)) {
                            echo "<option value='$row1[1]'>$row1[1]</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="new-price">
                <label for="merch-name">Nuevo precio:</label>
                <input name="merch-newprice" id="merch-name" class="product-input-number" type="number" required>
            </div>
            <button type="submit" id="submit-button">Editar</button>
        </form>
    </main>
    <script src="./public/js/admin.js"></script>
</body>

</html>