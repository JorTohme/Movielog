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
            background-color: rgb(48, 47, 62);;
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
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Direccion de e-mail</label>
        </div>
        <div class="form-floating">
            <input type="name" name="name" class="form-control" id="floatingInput" placeholder="John Doe">
            <label for="floatingInput">Nombre</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" placeholder="Password" id="pass1"
                onkeyup="Compare()">
            <label for="floatingPassword">Contraseña</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password2" class="form-control" placeholder="Repetir Contraseña" id="pass2"
                onkeyup="Compare()">
            <label for="floatingPassword">Repetir Contraseña</label>
        </div>
        <script type="text/javascript">
        function Compare() {
            let pass1 = document.getElementById('pass1');
            let pass2 = document.getElementById('pass2');
            let alert = document.getElementById('password-alert');
            if (pass1.value != pass2.value) {
                alert.style.visibility = 'inherit';
            } else {
                alert.style.visibility = 'hidden';
            }
        }
        </script>
        <p id="password-alert"
            style="visibility: hidden; font-size: small; font-weight: bold; color: rgb(177, 27, 27);">Las contraseñas no
            coinciden</p>
        <?php
                if (isset($_GET['emailerror'])) {
                    echo "<p id='error' style='color: red; font-weight: 500;'> Ese email ya está registrado, <a href='./sign-in.php?sign-into-account'>¿Quieres iniciar sesión?</a> </p>";
                }
            ?>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Ingresar</button>
        <p> ¿Ya tienes cuenta? <a href='./sign-in.php?sign-into-account'>Iniciar sesión</a></p>
        </form>
        <?php
            if (isset($_GET['success'])) {
                echo "<div class='success' style='display: inherit;'>";  
            } else {
                echo "<div class='success' style='display: none;'>";         
            }
        ?>
        <p style="  color: #ffffff;
                    text-decoration: underline;
                    text-decoration-color: #b5561c;
                    font-size: 40px;
                    font-weight:bold;
                    position: relative;
                    right: 150px;
                    bottom: 200px;
                    width: 600px">
            ¡Cuenta creada! Ahora podrás iniciar sesión
        </p>
        <h2 style=" color: #b5561c;
                    text-decoration: underline;"> 
            <a href="../index.php" style=" text-decoration: none;
                                           color: #b5561c;
                                           font-weight:bold;
                                           position: relative;
                                           top: 20px;
                                           "> 
            Página Principal
            </a>
        </h2>
        </div>
    </main>
</body>

</html>