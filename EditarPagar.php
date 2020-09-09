
<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $activo = $_POST['activo'];
    $idventa = $_POST['id_venta'];

    // $contraseña = hash('sha512', $contraseña);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $mydb = "ninefrmx_libreria";

    try{
        $conn = new PDO("mysql:host=$servername;dbname=$mydb", $username, $passwordb);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Connected successfully";
    }catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }


    $update = $conn->prepare("UPDATE venta SET activo = '$activo' WHERE id = $idventa");
    $update->execute();



//    if($resultado !==false) {
//        $_SESSION['correo'] = $correo;
//        $_SESSION['password'] = $password;
//        $_SESSION['nombre'] = $nombre;
//        $_SESSION['tipo'] = $tipo;
//        header('Location: index.php');
//    }

}
?>
<script>
    alert("ACTUALIZADO.")
    window.location.replace("VerCompras.php");
</script>