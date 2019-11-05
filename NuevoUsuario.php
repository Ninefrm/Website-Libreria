<?php
//Servidor
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
//POST
$nombre_cliente = $_POST['nombre_cliente'];
$apellido_p = $_POST['apellido_p'];
$apellido_m = $_POST['apellido_m'];
$correo_electronico  = $_POST['correo_electronico'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$password = md5($password);
$calle = $_POST['calle'];
$numero = $_POST['numero'];
$colonia = $_POST['colonia'];
$codigo_postal = $_POST['codigo_postal'];
$numero_de_telefono = $_POST['numero_de_telefono'];
$metodo_de_pago = $_POST['metodo_de_pago'];
    //EXISTE?
$sql_cliente = "SELECT * FROM cliente WHERE correo_electronico = :correo_electronico";

$existe = $conn -> prepare($sql_cliente);
$existe ->execute(array(':correo_electronico'=> $correo_electronico));
$resultado = $existe->fetch();

if($resultado){
    echo '<script language="javascript">';
    echo 'alert("El correo ya existe en el sistema.")';
    echo '</script>';
    $existente = 1;
}else{
    $my_Insert_Statement = $conn->prepare(
        "INSERT INTO cliente VALUES
(null,:nombre_cliente,:apellido_p, :apellido_m, :correo_electronico,:usuario,:password,:calle,:numero,:colonia,:codigo_postal,
:numero_de_telefono,:metodo_de_pago,DEFAULT,'1')");

    $my_Insert_Statement ->execute(array(
        ':nombre_cliente'=> $nombre_cliente,
        ':apellido_p'=> $apellido_p,
        ':apellido_m'=> $apellido_m,
        ':correo_electronico'=> $correo_electronico,
        ':usuario'=> $usuario,
        ':password'=> $password,
        ':calle'=> $calle,
        ':numero'=> $numero,
        ':colonia'=> $colonia,
        ':codigo_postal'=> $codigo_postal,
        ':numero_de_telefono'=> $numero_de_telefono,
        ':metodo_de_pago'=> $metodo_de_pago
    ));
    $existente = 0;
}
if(!$existe){
    ECHO "
    <script>
    alert(\"REGISTRADO.\")
    window.location.replace(\"Login.php\");
</script>
    ";
}else{
    ECHO "<script>
    window.location.replace(\"RegistroCliente.php\");
</script>
    ";
}
?>


