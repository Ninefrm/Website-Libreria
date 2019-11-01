<?php
$errores ='';
try{
    $conexion = new PDO('mysql:host=ninefrmxlibreria.canjn2ui3buc.us-east-1.rds.amazonaws.com;dbname=libreria','ninefrmx_root','Samuel20');
}catch(PDOException $e){
    echo "Error: ". $e->getMessage();
}

$sql = "SHOW TABLES";

$statement = $conexion -> prepare($sql);
//$statement ->execute(array(':correo'=> $Correo,':password'=> $password));
$resultado = $statement->fetch();

?>
<html>
<body>

<?php include 'Visual/Plantilla/Header.php'; ?>
<section class="main">
   <p>Hola.</p>
</section>

</body>
<?php include 'Visual/Plantilla/PieDePagina.php'; ?>
</html>

