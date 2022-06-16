<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./public/css/bootstrap.min.css" rel="stylesheet">
    <link href="./public/assets/logo.svg" rel="icon">
    <link href="./public/css/signin.css" rel="stylesheet">
    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    @media (max-width: 1000px) {
        body {
            background-color: rgb(48, 47, 62);
            ;
        }
    }
    </style>
    <title>Signin Movielog</title>
</head>

<body class="text-center">
    <main class="form-signin">
        <?php
            if (isset($_GET['success'])) {
                echo "<form action='./private/db.php' method='POST' id='form' style='display: none;'>";   
            } else {
                echo "<form action='./private/db.php' method='POST' id='form' style='display: inherit;'>";      
            }
        ?>
        <a href="./index.php"><img class="mb-4" src="./public/assets/logo.svg" alt="" width="122,4" height="96,9"></a>
        <h1 class="h3 mb-3">Registrarse</h1>
        <div class="form-floating">
            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
            <label for="floatingInput">Direccion de e-mail</label>
        </div>
        <div class="form-floating">
            <input type="name" name="name" class="form-control" id="name" placeholder="John Doe" required>
            <label for="floatingInput">Nombre</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" placeholder="Password" id="pass1" required>
            <label for="floatingPassword">Contraseña</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password2" class="form-control" placeholder="Repetir Contraseña" id="pass2" required>
            <label for="floatingPassword">Repetir Contraseña</label>
        </div>
        <p id="password-alert">Las contraseñas no coinciden o son muy cortas</p>
        <?php
                if (isset($_GET['emailerror'])) {
                    echo "<p id='error' style='color: red; font-weight: 500;'> Ese email ya está registrado, <a href='./sign-in.php?sign-into-account'>¿Quieres iniciar sesión?</a> </p>";
                }
            ?>
        <button class="w-100 btn btn-lg btn-primary" type="submit" id='sign-in-button'>Ingresar</button>
        <p> ¿Ya tienes cuenta? <a href='./sign-in.php?sign-into-account'>Iniciar sesión</a></p>
        </form>
    </main>
    <script src="./public/js/sign-in.js"></script>
</body>

</html>