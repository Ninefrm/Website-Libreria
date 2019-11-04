<?php
//Servidor
$servername = "198.91.81.7";
$username = "ninefrmx_root";
$password = "Samuel20";
$mydb = "ninefrmx_libreria";

$sql = "mysql:host=$servername;dbname=$mydb;";
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
//

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
    $my_Insert_Statement = $my_Db_Connection->prepare(
        "INSERT INTO carro VALUES
(DEFAULT,:id_libro,DEFAULT)");

            $my_Insert_Statement ->execute(array(
                ':id_libro'=> $id_libro
            ));

?>
<script>
        window.history.back();
</script>