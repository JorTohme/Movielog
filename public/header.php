<header>
    <nav>
        <div id="logo">
            <img src="./public/assets/logo.svg" alt="" id="logo">
            <h1> Movielog </h1>
        </div>
        <div id="menu">
            <?php 
                if (isset($_SESSION['user']) && $_SESSION['user'] === 'ADMIN') {
                    echo "<a href='./admin.php'>Espacio del administrador</a>";
                    echo "<a href='./private/sign-out.php'> Salir <a>";
                } else if (isset($_SESSION['user'])) {
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
            <div id="search-container">
                <input type="text" placeholder="Search" id="search-bar">
                <img src="./public/assets/searchicon.svg" alt="" id="search-button">
            </div>
        </div>
    </nav>
    <script src="./public/js/searchbutton.js"></script>
</header>