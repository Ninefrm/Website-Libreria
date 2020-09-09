<?php include 'Visual/Plantilla/Header.php'; ?>
<?php
    $id_Libro = $_POST['id_libro'];
//Servidor
$servername = "localhost";
$username = "root";
$password = "";
$mydb = "ninefrmx_libreria";

$sql = "mysql:host=$servername;dbname=$mydb;";
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
//
try{
    $conn = new PDO("mysql:host=$servername;dbname=$mydb", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Connected successfully";
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
$Libro = $conn -> prepare("
	SELECT * FROM libro WHERE id = $id_Libro");
//Libro
$Libro ->execute();
$Libro = $Libro ->fetchAll();
?>
<div class="container">

    <div class="col s12 m6">
        <div class="card blue-grey darken-1">
            <div class="card-content white-text blue">
                <span class="card-title" align='center'>AGREGAR LIBRO A LA LIBRERIA</span>
            </div>
        </div>
    </div>
    <form action="EditarProducto.php" method="post" name="mainform" enctype="multipart/form-data">
        <?php
        foreach ($Libro as $VLibro):
        ?>
        <table width="500" border="0" cellpadding="5" cellspacing="5">
            <tr>
                <th>Nombre del libro:</th>
                <td><input name="nombre_libro" type="text" value="<?php echo $VLibro['nombre_libro']?>"></td>
            </tr>
            <tr>
                <th>Autor Del libro:</th>
                <td><input name="autor" type="text" value="<?php echo $VLibro['autor']?>"></td>
            </tr>
            <tr>
                <th>Sinopsis del libro:</th>
                <td><input name="sinopsis" type="text" value="<?php echo $VLibro['sinopsis']?>"></td>
            </tr>
            <tr>
                <th>Costo del libro:</th>
                <td><input name="costo" type="number" value="<?php echo $VLibro['costo']?>"></td>
            </tr>
            <tr>
                <th>Año de publicación:</th>
                <td><input name="ano_de_publicacion" type="text" value="<?php echo $VLibro['ano_de_publicacion']?>"></td>
            </tr>
            <tr>
                <th>Pais de publicación:</th>
                <td><input name="pais_de_publicacion" type="text" value="<?php echo $VLibro['pais_de_publicacion']?>"></td>
            </tr>
            <tr>
                <th>Nombre de la editorial:</th>
                <td><input name="editorial" type="text" value="<?php echo $VLibro['editorial']?>"></td>
            </tr>
            <tr>
                <th>Número de edición:</th>
                <td><input name="numero_de_edicion" type="text" value="<?php echo $VLibro['numero_de_edicion']?>"></td>
            </tr>
            <tr>
                <th>Año de edición:</th>
                <td><input name="ano_de_edicion" type="text" value="<?php echo $VLibro['ano_de_edicion']?>"></td>
            </tr>
            <tr>
                <th>Número de páginas:</th>
                <td><input name="numero_de_paginas" type="text" value="<?php echo $VLibro['numero_de_paginas']?>"></td>
            </tr>
            <tr>
                <th>Genero:</th>
                <td><input name="genero" type="text" value="<?php echo $VLibro['genero']?>"></td>
            </tr>
            <tr>
                <th>Cantidad:</th>
                <td><input name="cantidad" type="text" value="<?php echo $VLibro['cantidad']?>"></td>
            </tr>
            <tr>
                <th>Calificación:</th>
                <td><input name="calificacion" type="text" value="<?php echo $VLibro['calificacion']?>"></td>
            </tr>
            <tr>
                <th>ISBN:</th>
                <td><input name="ISBN" type="text" value="<?php echo $VLibro['ISBN']?>"></td>
            </tr>
            <tr>
                <th>Vendidos:</th>
                <td><input name="vendidos" type="text" value="<?php echo $VLibro['vendidos']?>"></td>
            </tr>
            <tr>
                <th>Portada del libro:</th>
                <td><input hidden name="imagen" type="text" value="<?php echo $VLibro['imagen']?>"></td>
                <td><input hidden name="id_libro" type="text" value="<?php echo $id_Libro?>"></td>
                <td><input name="attachment" type="file"></td>
            </tr>
            <tr>
                <?php endforeach; ?>
                <td colspan="2" style="text-align:center;"><input type="submit" name="Submit" value="Send"><input type="reset" name="Reset" value="Reset"></td>
            </tr>
        </table>
    </form>

</div>
<?php include 'Visual/Plantilla/PieDePagina.php'; ?>
</body>
</html>