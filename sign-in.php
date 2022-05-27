<!doctype html>
<html lang="en">

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
  </style>
  <title>Signin</title>
</head>

<body class="text-center">
  <main class="form-signin">
    <form action="" method="POST">
      <a href="./index.php"><img class="mb-4" src="./public/assets/logo.svg" alt="" width="122,4" height="96,9"></a>
      <h1 class="h3 mb-3">Inicio de sesión</h1>
      <div class="form-floating">
        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Direccion de e-mail</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <label for="floatingPassword">Contraseña</label>
      </div>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Recuerdame
        </label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Ingresar</button>
    </form>
  </main>
</body>

</html>