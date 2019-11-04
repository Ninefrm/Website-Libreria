<!DOCTYPE html>
<html lang="en">
<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<head>
    <meta charset="UTF-8">
    <title>Libreria</title>
    <link rel="stylesheet" href="CSS/materialize.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--    <link rel="stylesheet" href="CSS/Estilos.css">-->
    <link href="https://fonts.googleapis.com/css?family=Amaranth&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="Image/WebIcon.png">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!--Import materialize.css-->
    <script src="js/materialize.min.js"></script>
    <link type="text/CSS" rel="stylesheet" href="CSS/materialize.min.css"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<header>
    <!--		<div class="wrapp">-->
    <!--				<a href="index.php" title="VETERINARIA">VETERINARIA<a class="bordes" href="index.php" title="Nombre">Tequila</a></a>-->
    <!--						<div class="usuario">-->
    <!--                <a href="cerrar.php" title="Cerrar Sesion"> Cerrar Sesion</a>-->
    <!--            </div>-->
    <!--		</div>-->
    <ul id="dropdown1" class="dropdown-content">
                    <li class="divider"></li>
        <li><a href="Login.php" title="Iniciar Sesion" class="center-align"><i class="material-icons right">perm_identity</i> Iniciar Sesion </a></li>
        <li><a href="cerrar.php" title="Cerrar Sesion" class="center-align"><i class="material-icons right">power_settings_new</i> Cerrar Sesion </a></li>
    </ul>
    <nav>

        <nav class="nav-extended">
            <div class="nav-wrapper">
                <a href="Index.php" class="brand-logo">Libreria</a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="Busqueda.html"><i class="material-icons">search</i> </a></li>

                    <?php
                    $servername = "198.91.81.7";
                    $username = "ninefrmx_root";
                    $password = "Samuel20";
                    $mydb = "ninefrmx_libreria";

                    try{
                        $conn = new PDO("mysql:host=$servername;dbname=$mydb", $username, $password);
                        // set the PDO error mode to exception
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Connected successfully";
                    }catch(PDOException $e){
                        echo "Connection failed: " . $e->getMessage();
                    }
                    $carrito = $conn -> prepare("
	SELECT * FROM carro WHERE activo = 1");
                    //Libro
                    $carrito ->execute();
                    $carrito = $carrito ->fetchAll();
                    ?>

                        <?php
                        echo $suma = count($carrito) ;
                        Echo "<li><a href=\"Pago.html\"><i class=\"material-icons\">shopping_cart</i><span class=\"new badge green\" data-badge-caption=\"En carrito\">$suma</span></div></a></li>
                        ";
                        ?>

<!--                    <li><a href="Pago.html"><i class="material-icons">shopping_cart</i> <span class="new badge" data-badge-caption="En carrito">1</span></div></a></li>-->

                    <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons right">view_module</i></a></li>
                </ul>
            </div>
        </nav>

        <ul class="sidenav" id="mobile-demo">
            <li><a href="Busqueda.html"><i class="material-icons">search</i>Busqueda</a></li>
            <li><a href="Pago.html"><i class="material-icons">shopping_cart</i> <span class="new badge" data-badge-caption="En carrito">1</span></div></a></li>
            <li><a href="Login.php" title="Cerrar Sesion"><i class="material-icons">perm_identity</i> Iniciar Sesion </a></li>
            <li><a href="cerrar.php" title="Cerrar Sesion"><i class="material-icons">power_settings_new</i> Cerrar Sesion </a></li>
        </ul>

    </nav>
</header>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var instances = M.AutoInit();
    });
</script>
