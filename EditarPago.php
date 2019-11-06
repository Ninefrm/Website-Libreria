<?php include 'Visual/Plantilla/Header.php'; ?>
<?php
$servername = "localhost";
$username = "ninefrmx_root";
$password = "Samuel20";
$mydb = "ninefrmx_libreria";
$total = 0;
$id_venta = $_POST['id'];
echo $_POST['id'];

try{
    $conn = new PDO("mysql:host=$servername;dbname=$mydb", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Connected successfully";
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
$venta = $conn -> prepare("
	SELECT * FROM venta WHERE id = '$id_venta'");
//Libro
$venta ->execute();
$venta = $venta ->fetchAll();

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
        <?php
            foreach ($venta as $venta2):
        ?>
            <?php
            $id_usr = $venta2['id_cliente'];
            $id_libro = $venta2['id_libro'];
            $libro = $conn -> prepare("
	        SELECT * FROM libro WHERE activo = 1 AND id = '$id_libro'");
//Libro
            $libro ->execute();
            $libro = $libro ->fetchAll();
            foreach ($libro as $libros):
            ?>
            <tr>
                    <?php $str = strtoupper($libros['nombre_libro']); echo "<td>". $str ."</td>"; ?>
                    <?php echo "<td>". $libros['ISBN'] ."</td>"; ?>
                    <?php echo "<td> $". $libros['costo'] ."</td>"; ?>
                    <?php $total = $total + $libros['costo'];?>
                    <?php echo "<td class='centrar'>"."<a href='VerLibro.php?id=".$libros['id']."' class='large material-icons'>visibility</a>". "</td>"; ?>
                    <?php echo "<td class='centrar'>"."<a href='NoComprar.php?id=".$libros['id']."' class='large material-icons'>delete_forever</a>". "</td>"; ?>
                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </table>
    <br>
    <br>

    <?php
    $cliente = $conn -> prepare("
	SELECT * FROM cliente WHERE activo = 1 AND id = '$id_usr'");
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
        <p>
            TOTAL: $
            <?php echo $total?>
        </p>
        <div class="row">
            <form action="EditarPagar.php" method="post" id="Act">
                <td><input type="hidden" name="id_venta" value="<?php echo  $id_venta; ?>" type="text"></td>
                <td><input type="hidden" name="cantidad" value="<?php echo  $venta2['costo']; ?>" type="text"></td>
                <div class="row">
                    <div class="input-field col s6">
                        <input name="first_name" id="icon_email" type="text" class="validate" disabled value="<?php echo  $Sql['nombre']; ?>">
                        <label for="first_name">Nombre:</label>
                    </div>
                    <div class="input-field col s3">
                        <input name="apellido_p" id="icon_email" type="text" class="validate" disabled value="<?php echo  $Sql['apellido_p']; ?>">
                        <label for="apellido_p">Apellido Paterno:</label>
                    </div>
                    <div class="input-field col s3">
                        <input name="apellido_m" id="icon_email" type="text" class="validate" disabled value="<?php echo  $Sql['apellido_m']; ?>">
                        <label for="apellido_m">Apellido Materno:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <td><input name="calle" disabled value="<?php echo  $Sql['calle']; ?>" type="text"></td>
                        <!--                    <input name="calle" type="text" class="validate" disabled value="--><?php //echo  $Sql['calle']; ?><!--">-->
                        <label for="calle">Calle:</label>
                    </div>
                    <div class="input-field col s1">
                        <td><input name="numero" disabled value="<?php echo  $Sql['numero']; ?>" type="text"></td>
                        <!--                    <input name="calle" type="text" class="validate" disabled value="--><?php //echo  $Sql['calle']; ?><!--">-->
                        <label for="numero">Numero:</label>
                    </div>
                    <div class="input-field col s3">
                        <input name="colonia" id="icon_email" type="text" class="validate" disabled value="<?php echo  $Sql['colonia']; ?>">
                        <label for="colonia">Colonia:</label>
                    </div>
                    <div class="input-field col s1">
                        <input name="codigo_postal" id="icon_email" type="text" class="validate" disabled value="<?php echo  $codigo_postal; ?>">
                        <label for="codigo_postal">Codigo Postal:</label>
                    </div>
                    <div class="input-field col s1">
                        <input name="telefono" id="icon_email" type="text" class="validate" disabled value="<?php echo  $telefono; ?>">
                        <label for="telefono">Teléfono:</label>
                    </div>
                </div>
                <div class="input-field col s6">
                    <select name="pago">
                        <option disabled selected value="<?php $str = strtoupper($venta2['metodo_de_pago']); echo  $str; ?>"><?php $str = strtoupper($venta2['metodo_de_pago']); echo  $str; ?></option>
                    </select>
                    <label>Metodo de Pago</label>
                </div>
                <div class="input-field col s6">
                    <select name="envio">
                        <option value="<?php $str = strtoupper($venta2['metodo_de_envio']); echo  $str; ?>" disabled selected><?php $str = strtoupper($venta2['metodo_de_envio']); echo  $str; ?></option>
                    </select>
                    <label>Metodo de Envio</label>
                </div>
                <div class="input-field col s6">
                    <select name="activo">
                        <option value="<?php $str = strtoupper($venta2['activo']); echo  $str; ?>" disabled selected><?php $str = strtoupper($venta2['activo']); echo  $str; ?></option>
                        <option value="1">PENDIENTE</option>
                        <option value="2">ENVIADO</option>
                        <option value="3">FINALIZADO</option>
                    </select>
                    <label>Metodo de Envio</label>
                </div>

                <script>
                    print(instance.getSelectedValues());
                </script>

                <form action="EditarPagar.php" method="post" id="Act">
                    <td><input type="hidden" name="id_cliente" value="<?php echo  $id_usr; ?>" type="text"></td>
                    <button class="waves-effect waves-light btn-small green" type="submit" form="Act" value="Submit"><i class="material-icons left">autorenew</i>Actualizar</button>
                </form>


                <?php  if(!empty($errores)): ?>
                    <ul>
                        <?php echo $errores; ?>
                    </ul>
                <?php  endif; ?>

            </form>
        </div>
    <?php endforeach; ?>

</div>




<?php include 'Visual/Plantilla/PieDePagina.php'; ?>

</body>

</html>

