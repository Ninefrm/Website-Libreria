<?php
//Servidor
$servername = "localhost";
$username = "ninefrmx_root";
$password = "Samuel20";
$mydb = "ninefrmx_libreria";

$sql = "mysql:host=$servername;dbname=$mydb;";
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
//
session_start();
//POST
$id_libro = $_POST['id_libro'];

    echo $id_libro;
    try {
        $my_Db_Connection = new PDO($sql, $username, $password, $dsn_Options);
        echo "Connected successfully";
    } catch (PDOException $error) {
        echo 'Connection error: ' . $error->getMessage();
    }
    //
    $id_usr = $_SESSION['id'];
    $my_Insert_Statement = $my_Db_Connection->prepare(
        "INSERT INTO carro VALUES
(null,$id_usr,:id_libro,'1')");

            $my_Insert_Statement ->execute(array(
                ':id_libro'=> $id_libro
            ));

?>
<script>
        window.location.replace("Pago.php");
</script>