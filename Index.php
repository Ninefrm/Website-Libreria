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

<table>
    <thead>
    <tr>
        <th class="card blue-grey darken-1">TOP #</th>
    </tr>
    </thead>
    <tbody>
    <div class="container">
        <td>
            <div class="carousel">
                <a class="carousel-item" href="#one!"><img src="https://lorempixel.com/250/250/nature/1"></a>
                <a class="carousel-item" href="#two!"><img src="https://lorempixel.com/250/250/nature/2"></a>
                <a class="carousel-item" href="#three!"><img src="https://lorempixel.com/250/250/nature/3"></a>
                <a class="carousel-item" href="#four!"><img src="https://lorempixel.com/250/250/nature/4"></a>
                <a class="carousel-item" href="#five!"><img src="https://lorempixel.com/250/250/nature/5"></a>
            </div>
        </td>

    </div>
    </tbody>
</table>

<table>
    <thead>
    <tr>
        <th class="card blue-grey darken-1">TOP #</th>
    </tr>
    </thead>
    <tbody>
    <td>
        <div class="container">
            <div class="carousel">
                <a class="carousel-item" href="#one!"><img src="https://lorempixel.com/250/250/nature/1"></a>
                <a class="carousel-item" href="#two!"><img src="https://lorempixel.com/250/250/nature/2"></a>
                <a class="carousel-item" href="#three!"><img src="https://lorempixel.com/250/250/nature/3"></a>
                <a class="carousel-item" href="#four!"><img src="https://lorempixel.com/250/250/nature/4"></a>
                <a class="carousel-item" href="#five!"><img src="https://lorempixel.com/250/250/nature/5"></a>
            </div>
        </div>
    </td>
    </tbody>
</table>


</body>
<?php include 'Visual/Plantilla/PieDePagina.php'; ?>
</html>

