
<?php

if($_SERVER['REQUEST_METHOD']=='POST') {
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
    $imagen = $_POST['imagen'];
    $id_Libro = $_POST['id_libro'];

    /* GET File Variables */
    $tmpName = $_FILES['attachment']['tmp_name'];
    $fileType = $_FILES['attachment']['type'];
    $fileName = $_FILES['attachment']['name'];
    $target_dir = "Upload/Libros/";
    $target_file = $target_dir . $fileName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // $contraseña = hash('sha512', $contraseña);

    $servername = "localhost";
    $username = "ninefrmx_root";
    $passwordb = "Samuel20";
    $mydb = "ninefrmx_libreria";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$mydb", $username, $passwordb);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Connected successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    if (empty($tmpName)) {
        $update = $conn->prepare("UPDATE libro SET nombre_libro = '$nombre_libro',
autor = '$autor', sinopsis = '$sinopsis', costo = '$costo', ano_de_publicacion = '$ano_de_publicacion',
pais_de_publicacion = '$pais_de_publicacion', editorial = '$editorial', numero_de_edicion = '$numero_de_edicion',
ano_de_edicion = '$ano_de_edicion', numero_de_paginas = '$numero_de_paginas', genero = '$genero', cantidad = '$cantidad',
calificacion = '$calificacion', ISBN = '$ISBN', vendidos = '$vendidos', imagen = '$imagen' WHERE id = '$id_Libro'");
        $update->execute();
    } else {
        if (file($tmpName)) {
            //EXISTE?
            if (file_exists($target_file)) {
                echo '<script language="javascript">';
                echo 'alert(Sorry, file already exists.")';
                echo '</script>';
                $uploadOk = 0;
            }
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
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
                    //
                    $update = $conn->prepare("UPDATE libro SET nombre_libro = '$nombre_libro',
autor = '$autor', sinopsis = '$sinopsis', costo = '$costo', ano_de_publicacion = '$ano_de_publicacion',
pais_de_publicacion = '$pais_de_publicacion', editorial = '$editorial', numero_de_edicion = '$numero_de_edicion',
ano_de_edicion = '$ano_de_edicion', numero_de_paginas = '$numero_de_paginas', genero = '$genero', cantidad = '$cantidad',
calificacion = '$calificacion', ISBN = '$ISBN', vendidos = '$vendidos', imagen = '$fileName' WHERE id = '$id_Libro'");
                    $update->execute();

                } else {
                    echo '<script language="javascript">';
                    echo 'alert("Sorry, there was an error uploading your file.")';
                    echo '</script>';
                }
            }
        }
    }
}

?>

<script>
    alert("ACTUALIZADO.");
    window.location.replace("Index.php");
</script>