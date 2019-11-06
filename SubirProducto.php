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
$nombre_libro = $_POST['nombre_libro'];
$autor = $_POST['autor'];
$sinopsis = $_POST['sinopsis'];
$costo = $_POST['costo'];
$ano_de_publicacion = $_POST['ano_de_publicacion'];
$pais_de_publicacion = $_POST['pais_de_publicacion'];
$editorial = $_POST['editorial'];
$numero_de_edicion = $_POST['numero_de_edicion'];
$ano_de_edicion = $_POST['ano_de_edicion'];
$numero_de_paginas = $_POST['numero_de_paginas'];
$genero = $_POST['genero'];
$cantidad = $_POST['cantidad'];
$calificacion = $_POST['calificacion'];
$ISBN = $_POST['ISBN'];
$vendidos = $_POST['vendidos'];

/* GET File Variables */
$tmpName = $_FILES['attachment']['tmp_name'];
$fileType = $_FILES['attachment']['type'];
$fileName = $_FILES['attachment']['name'];
$target_dir = "Upload/Libros/";
$target_file = $target_dir . $fileName;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (file($tmpName)) {
    //EXISTE?
    if (file_exists($target_file)) {
        echo '<script language="javascript">';
        echo 'alert(Sorry, file already exists.")';
        echo '</script>';
        $uploadOk = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo '<script language="javascript">';
        echo 'alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")';
        echo '</script>';
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo '<script language="javascript">';
        echo 'alert("Sorry, your file was not uploaded.")';
        echo '</script>';
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES['attachment']['tmp_name'], $target_file)) {

            echo '<script language="javascript">';
            echo 'alert("The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.")';
            echo '</script>';
            //Conexión
            try {
                $my_Db_Connection = new PDO($sql, $username, $password, $dsn_Options);
                echo "Connected successfully";
            } catch (PDOException $error) {
                echo 'Connection error: ' . $error->getMessage();
            }
            //
                $my_Insert_Statement = $my_Db_Connection->prepare(
                "INSERT INTO libro VALUES
(null,:nombre_libro,:autor, :sinopsis, :costo,:ano_de_publicacion,:pais_de_publicacion,:editorial,:numero_de_edicion,:ano_de_edicion,:numero_de_paginas,:genero,:cantidad,:calificacion,
                :ISBN,:vendidos,:imagen,'1')");

            $my_Insert_Statement ->execute(array(
                ':nombre_libro'=> $nombre_libro,
                ':autor'=> $autor,
                ':sinopsis'=> $sinopsis,
                ':costo'=> $costo,
                ':ano_de_publicacion'=> $ano_de_publicacion,
                ':pais_de_publicacion'=> $pais_de_publicacion,
                ':editorial'=> $editorial,
                ':numero_de_edicion'=> $numero_de_edicion,
                ':ano_de_edicion'=> $ano_de_edicion,
                ':numero_de_paginas'=> $numero_de_paginas,
                ':genero'=> $genero,
                ':cantidad'=> $cantidad,
                ':calificacion'=> $calificacion,
                ':ISBN'=> $ISBN,
                ':vendidos'=> $vendidos,
                ':imagen'=>$fileName
            ));

        } else {
            echo '<script language="javascript">';
            echo 'alert("Sorry, there was an error uploading your file.")';
            echo '</script>';
        }
    }

}

?>
<script>
    window.location.replace("Index.php");
</script>
