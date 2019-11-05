
<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $id_cliente = $_POST['id_cliente'];
    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $colonia = $_POST['colonia'];
    $codigo_postal = $_POST['codigo_postal'];
    $costo = $_POST['total'];
    $metodo_de_envio = $_POST['envio'];


    $telefono = $_POST['telefono'];
    $pago = $_POST['pago'];
    // $contraseña = hash('sha512', $contraseña);
    $errores ='';

    $servername = "localhost";
    $username = "ninefrmx_root";
    $passwordb = "Samuel20";
    $mydb = "ninefrmx_libreria";

    try{
        $conn = new PDO("mysql:host=$servername;dbname=$mydb", $username, $passwordb);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Connected successfully";
    }catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }


    $carrito = $conn -> prepare(
        "SELECT * FROM carro WHERE activo = 1 AND id_cliente = $id_cliente");
    //CARRITO
    $carrito ->execute();
    $carrito = $carrito ->fetchAll();
    //Administrador
    $cliente = $conn -> prepare(
        "SELECT * FROM cliente WHERE id = $id_cliente AND activo= '1'");
    $cliente ->execute();
    $cliente = $cliente ->fetchAll();
    $cantidad = count($carrito);

    foreach ($carrito as $SQLCarrito):
        $id_libro = $SQLCarrito['id_libro'];


    $guia_de_envio = $metodo_de_envio . $id_cliente . $id_libro;

    $my_Insert_Statement = $conn->prepare(
        "INSERT INTO venta VALUES
(null,:id_cliente,:id_libro, :cantidad, :costo,:calle,:numero,:colonia,:codigo_postal,:metodo_de_envio,:guia_de_envio,:metodo_de_pago,'1')");

    $my_Insert_Statement ->execute(array(
        ':id_cliente'=> $id_cliente,
        ':id_libro'=> $id_libro,
        ':cantidad'=> $cantidad,
        ':costo'=> $costo,
        ':calle'=> $calle,
        ':numero'=> $numero,
        ':colonia'=> $colonia,
        ':codigo_postal'=> $codigo_postal,
        ':metodo_de_envio'=> $metodo_de_envio,
        ':guia_de_envio'=> $guia_de_envio,
        ':metodo_de_pago'=>$pago
    ));
    endforeach;
    $update = $conn->prepare("UPDATE carro SET activo = '0' WHERE id_cliente = $id_cliente");
    $update->execute();

    $updateL = $conn->prepare("UPDATE libro SET vendidos = vendidos+1, cantidad=cantidad-1 WHERE id = $id_libro");
    $updateL->execute();



//    if($resultado !==false) {
//        $_SESSION['correo'] = $correo;
//        $_SESSION['password'] = $password;
//        $_SESSION['nombre'] = $nombre;
//        $_SESSION['tipo'] = $tipo;
//        header('Location: index.php');
//    }

}
require 'Index.php';
?>
