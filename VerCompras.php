<?php include 'Visual/Plantilla/Header.php'; ?>
<?php
$servername = "localhost";
$username = "ninefrmx_root";
$password = "Samuel20";
$mydb = "ninefrmx_libreria";
$total = 0;

try{
    $conn = new PDO("mysql:host=$servername;dbname=$mydb", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Connected successfully";
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
$id_usr = $_SESSION['id'];
$tipo = $_SESSION['tipo'];
//echo $_SESSION['tipo'];
if($tipo == "Cliente"){
    $venta = $conn -> prepare("
	SELECT * FROM venta WHERE activo = '1' AND id_cliente = $id_usr");
}
if($tipo == "Administrador"){
    $venta = $conn -> prepare("
	SELECT * FROM venta WHERE activo = '1' ");
}

//Libro
$venta ->execute();
$venta = $venta ->fetchAll();

?>


<div class="container">

    <div class="col s12 m6">
        <div class="card blue-grey darken-1">
            <div class="card-content white-text green">
                <span class="card-title" align='center'>PRODUCTOS COMPRADOS</span>
            </div>
        </div>
    </div>
    <table class="responsive-table">
        <thead>
        <tr>
            <th>NOMBRE DEL LIBRO</th>
            <th>ISBN</th>
            <?php if($tipo=="Administrador"){
                ECHO "<th>CLIENTE</th>";
            }
            ?>
            <th>GUIA DE ENVIO</th>
            <th>PRECIO</th>
            <th colspan="1">ACCIONES</th>

        </tr>
        </thead>
        <?php foreach ($venta as $Sql): ?>
            <?php
//        echo
            $id_libro = $Sql['id_libro'];
            $id_cliente = $Sql['id_cliente'];
            $libros = $conn -> prepare("
	SELECT * FROM libro WHERE activo = '1' AND id = $id_libro");
//Libro
            $libros ->execute();
            $libros = $libros ->fetchAll();
//            echo $Total = count($libros);
            foreach ($libros as $SqlLibro):
                ?>
                <tr>
                    <?php $str = strtoupper($SqlLibro['nombre_libro']); echo "<td>". $str ."</td>"; ?>
                    <?php echo "<td>". $SqlLibro['ISBN'] ."</td>"; ?>
                    <?php if($tipo=="Administrador"){
                       ECHO "<td> $id_cliente </td>";
                    }
                    ?>
                    <?php echo "<td>". $Sql['guia_de_envio'] ."</td>"; ?>
                    <?php echo "<td> $". $SqlLibro['costo'] ."</td>"; ?>
                    <?php $total = $total + $SqlLibro['costo'];?>
                    <?php echo "<td class='centrar'>"."<a href='VerLibro.php?id=".$SqlLibro['id']."' class='large material-icons'>visibility</a>". "</td>"; ?>
                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </table>
    <br>
    <br>

</div>




<?php include 'Visual/Plantilla/PieDePagina.php'; ?>

</body>

</html>

