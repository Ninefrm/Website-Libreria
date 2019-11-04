<html>
<body>
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

$id_libro = $_GET['id'];

$libro = $conn -> prepare("
	SELECT * FROM libro WHERE id = $id_libro AND activo = 1");
//Libro
$libro ->execute();
$libro = $libro ->fetchAll();

if(!$libro){
    $mensaje .= 'Libro inexistente';
}

?>
<?php include 'Visual/Plantilla/Header.php'; ?>

<section class="main">
    <div class="container">
        <?php foreach ($libro as $Sql): ?>
        <div class="parallax-container">
            <?php
            $imagen = $Sql['imagen'];
            Echo "<div class=\"parallax\">
                    <img class=\"materialboxed\" src=\"Upload/Libros/$imagen \">
                    </div>";
            ?>
        </div>
            <div class="col s6 right">
                <form action="AgregarCompra.php" method="post" id="mainform">
                    <td><input type="hidden" name="id_libro" value="<?php echo  $Sql['id']; ?>" type="text"></td>
                    <button class="waves-effect waves-light btn-small green" type="submit" form="mainform" value="Submit"><i class="material-icons left">add_shopping_cart</i>Agregar al carrito</button>
                </form>

<!--                <form class="waves-effect waves-light btn-small red" action="foo.php" method="post""><i class="material-icons left">add_shopping_cart</i>Agregar al carrito</form>-->
            </div>
            <div class="row">
                <div class="col s6"><h2 class="mayusculas"><?php
                        $str = strtoupper($Sql['nombre_libro']);
                        echo "<td>". $str. "</td>"; ?>.</h2></div>
            </div>
        <table class="striped">
            <tr>
                <th>Autor:</th>
                <th><?php echo "<td>". $Sql['autor']. "</td>"; ?></th>
            </tr>
            <tr>
                <th>Editorial:</th>
                <th><?php echo "<td>". $Sql['editorial']. "</td>"; ?></th>
            </tr>
            <tr>
                <th>Sinopsis:</th>
                <th><?php echo "<td>". $Sql['sinopsis']. "</td>"; ?></th>
            </tr>
        </table>
        <div class="row">
            <div class="col s1 m1 l2">
                <div class="center promo promo-example">
                    <i class="material-icons">attach_money</i>
                    <p class="promo-caption">Costo:</p>
                    <p class="light center">$<?php echo "<td>". $Sql['costo']. "</td>"; ?></p>
                </div>
            </div>
            <div class="col s12 m4 l2">
                <div class="center promo promo-example">
                    <i class="material-icons">date_range</i>
                    <p class="promo-caption">Año publicacion:</p>
                    <p class="light center"><?php echo "<td>". $Sql['ano_de_publicacion']. "</td>"; ?></p>
                </div>
            </div>
            <div class="col s12 m4 l2">
                <div class="center promo promo-example">
                    <i class="material-icons">location_searching</i>
                    <p class="promo-caption">Publicado en:</p>
                    <p class="light center"><?php echo "<td>". $Sql['pais_de_publicacion']. "</td>"; ?></p>
                </div>
            </div>
            <div class="col s12 m4 l2">
                <div class="center promo promo-example">
                    <i class="material-icons">mode_edit</i>
                    <p class="promo-caption">Edición</p>
                    <p class="light center"><?php echo "<td> #". $Sql['numero_de_edicion']. "</td>"; ?></p>
                </div>
            </div>
            <div class="col s12 m4 l2">
                <div class="center promo promo-example">
                    <i class="material-icons">date_range</i>
                    <p class="promo-caption">Editado en:</p>
                    <p class="light center"><?php echo "<td>". $Sql['ano_de_edicion']. "</td>"; ?></p>
                </div>
            </div>
            <div class="col s12 m4 l2">
                <div class="center promo promo-example">
                    <i class="material-icons">filter_none</i>
                    <p class="promo-caption">Paginas:</p>
                    <p class="light center"><?php echo "<td>". $Sql['numero_de_paginas']. "</td>"; ?></p>
                </div>
            </div>
            <div class="col s12 m4 l2">
                <div class="center promo promo-example">
                    <i class="material-icons">settings</i>
                    <p class="promo-caption">Genero:</p>
                    <p class="light center"><?php echo "<td>". $Sql['genero']. "</td>"; ?></p>
                </div>
            </div>
            <div class="col s12 m4 l2">
                <div class="center promo promo-example">
                    <i class="material-icons">add_circle_outline</i>
                    <p class="promo-caption">Cantidad:</p>
                    <p class="light center"><?php echo "<td>". $Sql['cantidad']. "</td>"; ?></p>
                </div>
            </div>
            <div class="col s12 m4 l2">
                <div class="center promo promo-example">
                    <i class="material-icons">grade</i>
                    <p class="promo-caption">Calificación:</p>
                    <p class="light center"><?php echo "<td>". $Sql['calificacion']. "</td>"; ?></p>
                </div>
            </div>
            <div class="col s12 m4 l2">
                <div class="center promo promo-example">
                    <i class="material-icons">code</i>
                    <p class="promo-caption">ISBN:</p>
                    <p class="light center"><?php echo "<td>". $Sql['ISBN']. "</td>"; ?></p>
                </div>
            </div>
        </div>
            <?php endforeach; ?>

    </div>
    <a class='waves-effect waves-light btn-large' onclick="goBack()"><i class="material-icons">arrow_back</i></a>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</section>
<?php include 'Visual/Plantilla/PieDePagina.php'; ?>
</body>
</html>
