<?php include "Visual/Plantilla/Header.php" ?>

<?php
//Servidor
$servername = "localhost";
$username = "ninefrmx_root";
$password = "Samuel20";
$mydb = "ninefrmx_libreria";

$sql = "mysql:host=$servername;dbname=$mydb;";
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
//

//POST
if(!empty($_POST['busqueda'])){
    $busqueda = $_POST['busqueda'];
}else{
    $busqueda = '';
}

try {
    $my_Db_Connection = new PDO($sql, $username, $password, $dsn_Options);
//    echo "Connected successfully";
} catch (PDOException $error) {
    echo 'Connection error: ' . $error->getMessage();
}
//
$my_Insert_Statement = $my_Db_Connection->prepare(
    "SELECT * FROM libro WHERE activo = '1'");

$my_Insert_Statement ->execute();

//echo $busqueda;
?>

<?php
Echo "<form action=\"Buscar.php\" method=\"post\" id=\"mainform\">
<div class=\"input-field inline\">
    <input name=\"busqueda\" id=\"busqueda\" type=\"text\" class=\"validate\" value=\"$busqueda\">
    <label for=\"busqueda\">Buscar</label>
    </div> 
    <form action=\"Buscar . php\" method=\"post\" id=\"mainform\">
        <button class=\"btn - floating btn - large waves - effect waves - light blue\" type=\"submit\" form=\"mainform\"><i class=\"material - icons\">search</i></button>
    </form>
    </form>";
?>
<table class="responsive-table">
    <thead>
    <tr>
        <th>NOMBRE DEL LIBRO</th>
        <th>ISBN</th>
        <th>PRECIO</th>
        <th colspan="3">ACCIONES</th>

    </tr>
    </thead>
        <?php
        $libros = $conn -> prepare("
	        SELECT * FROM libro WHERE activo = '1' AND MATCH (nombre_libro, sinopsis, ISBN) AGAINST ('$busqueda')");
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
</table>

</body>
<?php include 'Visual/Plantilla/PieDePagina.php'; ?>
</html>