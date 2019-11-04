<?php include 'Visual/Plantilla/Header.php'; ?>
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
$id_usr = $_SESSION['id'];
$carrito = $conn -> prepare("
	SELECT * FROM carro WHERE activo = 1 AND id_cliente = $id_usr");
//Libro
$carrito ->execute();
$carrito = $carrito ->fetchAll();

?>


<div class="container">

    <div class="col s12 m6">
        <div class="card blue-grey darken-1">
            <div class="card-content white-text green">
                <span class="card-title" align='center'>PRODUCTOS EN EL CARRITO</span>
            </div>
        </div>
    </div>
    <table class="responsive-table">
        <thead>
        <tr>
            <th>NOMBRE DEL LIBRO</th>
            <th>ISBN</th>
            <th>PRECIO</th>
            <th colspan="3">ACCIONES</th>

        </tr>
        </thead>
        <?php foreach ($carrito as $Sql): ?>
            <?php
            $id_libro = $Sql['id_libro'];
            $libros = $conn -> prepare("
	        SELECT * FROM libro WHERE activo = 1 AND id = $id_libro");
//Libro
            $libros ->execute();
            $libros = $libros ->fetchAll();
            foreach ($libros as $SqlLibro):
            ?>
            <tr>
                <?php $str = strtoupper($SqlLibro['nombre_libro']); echo "<td>". $str ."</td>"; ?>
                <?php echo "<td>". $SqlLibro['ISBN'] ."</td>"; ?>
                <?php echo "<td> $". $SqlLibro['costo'] ."</td>"; ?>
                <?php echo "<td class='centrar'>"."<a href='VerLibro.php?id=".$SqlLibro['id']."' class='large material-icons'>visibility</a>". "</td>"; ?>
                <?php echo "<td class='centrar'>"."<a href='EliminarAdministrador.php?id=".$SqlLibro['id']."' class='large material-icons'>delete_forever</a>". "</td>"; ?>
            </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </table>
    <br>
    <br>

    <?php
    $id_usr = $_SESSION['id'];
    $cliente = $conn -> prepare("
	SELECT * FROM cliente WHERE activo = 1 AND id = $id_usr");
    //Libro
    $cliente ->execute();
    $cliente = $cliente ->fetchAll();

    foreach ($cliente as $Sql):

    $nombre = $Sql['nombre'];
    $apellido_p = $Sql['apellido_p'];

    $apellido_m = $Sql['apellido_m'];
    $calle = $Sql['calle'];
    $colonia = $Sql['colonia'];
    $codigo_postal = $Sql['codigo_postal'];

    $telefono = $Sql['numero_de_telefono'];
    $pago = $Sql['metodo_de_pago'];

    ?>

    <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Placeholder" id="first_name" type="text" class="validate" disabled value="<?php echo  $Sql['nombre']; ?>">
                    <label for="first_name">Nombre:</label>
                </div>
                <div class="input-field col s3">
                    <input id="apellido_p" type="text" class="validate" disabled value="<?php echo  $Sql['apellido_p']; ?>">
                    <label for="apellido_p">Apellido Paterno:</label>
                </div>
                <div class="input-field col s3">
                    <input id="apellido_m" type="text" class="validate" disabled value="<?php echo  $Sql['apellido_m']; ?>">
                    <label for="apellido_m">Apellido Materno:</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Placeholder" id="calle" type="text" class="validate" disabled value="<?php echo  $Sql['calle']; ?>">
                    <label for="calle">Calle:</label>
                </div>
                <div class="input-field col s3">
                    <input id="colonia" type="text" class="validate" disabled value="<?php echo  $Sql['colonia']; ?>">
                    <label for="colonia">Colonia:</label>
                </div>
                <div class="input-field col s1">
                    <input id="codigo_postal" type="text" class="validate" disabled value="<?php echo  $codigo_postal; ?>">
                    <label for="codigo_postal">Codigo Postal:</label>
                </div>
                <div class="input-field col s1">
                    <input id="apellido_m" type="text" class="validate" disabled value="<?php echo  $telefono; ?>">
                    <label for="apellido_m">Teléfono:</label>
                </div>
            </div>
        </form>
    </div>
    <?php endforeach; ?>
    <form action="Pagar.php" method="post" id="mainform">
        <td><input type="hidden" name="id_libro" value="<?php echo  $id_usr; ?>" type="text"></td>
        <button class="waves-effect waves-light btn-small green" type="submit" form="mainform" value="Submit"><i class="material-icons left">payment</i>Pagar</button>
    </form>

</div>




<?php include 'Visual/Plantilla/PieDePagina.php'; ?>

</body>

</html>

