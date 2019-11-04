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
	SELECT * FROM libro WHERE activo = 1 ORDER BY vendidos");
//Libro
$libroV ->execute();
$libroV = $libroV ->fetchAll();

$libroY = $conn -> prepare("
	SELECT * FROM libro WHERE activo = 1 ORDER BY ano_de_publicacion");
//Libro
$libroY ->execute();
$libroY = $libroY ->fetchAll();
?>

<?php include 'Visual/Plantilla/Header.php'; ?>
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

</div>




<?php include 'Visual/Plantilla/PieDePagina.php'; ?>

</body>

</html>

