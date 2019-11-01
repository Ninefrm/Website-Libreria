<?php

$to = $_POST['toEmail'];
$fromEmail = $_POST['fieldFormEmail'];
$fromName = $_POST['fieldFormName'];
$subject = $_POST['fieldSubject'];
$message = $_POST['fieldDescription'];

/* GET File Variables */
$tmpName = $_FILES['attachment']['tmp_name'];
$fileType = $_FILES['attachment']['type'];
$fileName = $_FILES['attachment']['name'];
$target_dir = "Upload/Libros/";
$target_file = $target_dir . $fileName;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

/* Start of headers */
$headers = "From: $fromName";

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

        } else {
            echo '<script language="javascript">';
            echo 'alert("Sorry, there was an error uploading your file.")';
            echo '</script>';
        }
    }

}

?>
