<?php include 'Visual/Plantilla/Header.php'; ?>
<?php
$servername = "localhost";
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
$libroV = $conn -> prepare("
	SELECT * FROM libro WHERE activo = 1 ORDER BY vendidos desc ");
//Libro
$libroV ->execute();
$libroV = $libroV ->fetchAll();

$libroY = $conn -> prepare("
	SELECT * FROM libro WHERE activo = 1 ORDER BY ano_de_publicacion");
//Libro
$libroY ->execute();
$libroY = $libroY ->fetchAll();

$libroG = $conn -> prepare("
	SELECT * FROM libro WHERE activo = 1 ORDER BY genero");
//Libro
$libroG ->execute();
$libroG = $libroG ->fetchAll();

if(empty($_SESSION['id'])){

}else{
    $libros = $conn -> prepare("
	SELECT * FROM venta WHERE id_cliente = $id_usr ORDER BY id desc");
    $id_usr = $_SESSION['id'];
    $libros ->execute();
    $ultimo_libro = $libros ->fetchColumn(2);
    $penultimo_libro = $libros ->fetchColumn(2);
//
//    echo "<p>Ultimo:</p>  $ultimo_libro.";
//    echo "<p>Penultimo:</p> $penultimo_libro.";

    $id_ult_libro = $conn -> prepare("
	SELECT genero FROM libro WHERE activo = 1 AND id = $ultimo_libro ");
//Libro
    $id_ult_libro ->execute();
    $id_ult_libro = $id_ult_libro ->fetch();
    $GeneroU1 = $id_ult_libro[0];

    $id_ult_libro2 = $conn -> prepare("
	SELECT genero FROM libro WHERE activo = 1 AND id = $penultimo_libro ");
//Libro
    $id_ult_libro2 ->execute();
    $id_ult_libro2 = $id_ult_libro2 ->fetch();
    $GeneroU2 = $id_ult_libro2[0];
//



    $libroR = $conn -> prepare("
	SELECT * FROM libro WHERE genero in ('$GeneroU1', '$GeneroU2')");
//Libro
    $libroR ->execute();
    $libroR = $libroR ->fetchAll();

}

?>

<div class="container">

    <style>
        div.part1 p {
            background-color: rgba(255,255,255,.8);
            display: block;
            position: absolute;
            bottom: -55%;
            left: 0;
            padding: 0px;
            width: 100%;
        }
    </style>

    <!--RECOMENDACIONES-->

    <?php

    if(empty($_SESSION['id'])){
        ECHO "
        ";
    }else{

        ECHO "
        <div class=\"col s12 m6\">
        <div class=\"card blue-grey darken-1\">
            <div class=\"card-content white-text\">
                <span class=\"card-title\" align='center'>RECOMENDACIONES PARA TI</span>
            </div>
        </div>
    </div>
    <article>
        <div class=\"carousel part1\">";
            foreach ($libroR as $Sql):
                $id = $Sql['id'];
                $image = $Sql['imagen'];
                $nombre = $Sql['nombre_libro'];
                $precio = $Sql['costo'];
                $genero = $Sql['genero'];
                ECHO "<a class='carousel-item' href='VerLibro.php?id=$id'><img src='Upload/Libros/$image'><p>$nombre<br>Precio: $precio
                <br>Género: $genero</p></a>";
            endforeach;
        ECHO "
        </div>
    </article> 
        ";
    }

    ?>


<!--VENDIDO-->
    <div class="col s12 m6">
        <div class="card blue-grey darken-1">
            <div class="card-content white-text">
                <span class="card-title" align='center'>Top más vendidos</span>
            </div>
        </div>
    </div>
    <article>
        <div class="carousel part1">
            <?php foreach ($libroV as $Sql): ?>
                <?php echo "<a class='carousel-item' href='VerLibro.php?id=".$Sql['id']."'><img src='Upload/Libros/".$Sql['imagen']."'><p>". $Sql['nombre_libro'] ."<br>Precio: $". $Sql['costo']."</p></a>"; ?>
            <?php endforeach; ?>
        </div>
    </article>


<!--NUEVO-->
    <div class="col s12 m6">
        <div class="card blue-grey darken-1">
            <div class="card-content white-text">
                <span class="card-title" align='center'>Top más nuevos</span>
            </div>
        </div>
    </div>
    <article>
        <div class="carousel part1">
            <?php foreach ($libroY as $Sql): ?>
                <?php echo "<a class='carousel-item' href='VerLibro.php?id=".$Sql['id']."'><img src='Upload/Libros/".$Sql['imagen']."'><p>". $Sql['nombre_libro'] ."<br>Precio: $". $Sql['costo']."</p></a>"; ?>
            <?php endforeach; ?>
        </div>
    </article>
<!--GENERO-->
    <div class="col s12 m6">
        <div class="card blue-grey darken-1">
            <div class="card-content white-text">
                <span class="card-title" align='center'>Por género</span>
            </div>
        </div>
    </div>
    <article>
        <div class="carousel part1">
            <?php foreach ($libroG as $Sql): ?>
                <?php echo "<a class='carousel-item' href='VerLibro.php?id=".$Sql['id']."'><img src='Upload/Libros/".$Sql['imagen']."'><p>". $Sql['nombre_libro'] ."<br>Precio: $". $Sql['costo']."<br>Género: ". $Sql['genero']."</p></a>"; ?>
            <?php endforeach; ?>
        </div>
    </article>
<!--RECOMENDACIONES-->
</div>




<?php include 'Visual/Plantilla/PieDePagina.php'; ?>

</body>

</html>

