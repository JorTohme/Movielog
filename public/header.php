<header>
        <nav>
            <div id="logo">
                <img src="./public/assets/logo.svg" alt="" id="logo">
                <h1> Movielog </h1>
            </div>
            <div id="menu">
                <?php 
                if (isset($_SESSION['user'])) {
                    $name = $_SESSION['user'];
                    echo "<a> Hola $name </a>";
                    echo "<a href='./private/sign-out.php'> Salir <a>";
                } else {
                    echo "<a href='./sign-in.php?sign-into-account'>Iniciar Sesión</a>";
                    echo "<a href='./sign-in.php?register'>Crear Cuenta</a>";
                }
                ?>
                <a href="./index.php">Catálogo</a>
                <a>Nosotros</a>
                <input type="text" placeholder="Search">
            </div>
        </nav>
    </header>