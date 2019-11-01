<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Email Attachment Without Upload - Excellent Web World</title>
    <style>
        body{ font-family:Arial, Helvetica, sans-serif; font-size:13px;}
        th{ background:#999999; text-align:right; vertical-align:top;}
        input{ width:181px;}
    </style>
</head>
<body>
<form action="SubirProducto.php" method="post" name="mainform" enctype="multipart/form-data">
    <table width="500" border="0" cellpadding="5" cellspacing="5">
        <tr>
            <th>Your Name</th>
            <td><input name="nombre" type="text"></td>
        </tr>
        <tr>
        <tr>
            <th>Your Email</th>
            <td><input name="nombre_libro" type="text"></td>
        </tr>
        <tr>
            <th>To Email</th>
            <td><input name="autor" type="text"></td>
        </tr>

        <tr>
            <th>Subject</th>
            <td><input name="ano_de_publicacion" type="text"></td>
        </tr>
        <tr>
            <th>Your Name</th>
            <td><input name="pais_de_publicacion" type="text"></td>
        </tr>
        <tr>
            <th>Your Name</th>
            <td><input name="editorial" type="text"></td>
        </tr>
        <tr>
            <th>Your Name</th>
            <td><input name="numero_de_edicion" type="text"></td>
        </tr>
        <tr>
            <th>Your Name</th>
            <td><input name="ano_de_edicion" type="text"></td>
        </tr>
        <tr>
            <th>Your Name</th>
            <td><input name="numero_de_paginas" type="text"></td>
        </tr>
        <tr>
            <th>Your Name</th>
            <td><input name="genero" type="text"></td>
        </tr>
        <tr>
            <th>Your Name</th>
            <td><input name="cantidad" type="text"></td>
        </tr>
        <tr>
            <th>Your Name</th>
            <td><input name="calificacion" type="text"></td>
        </tr>
        <tr>
            <th>Your Name</th>
            <td><input name="ISBN" type="text"></td>
        </tr>
        <tr>
            <th>Your Name</th>
            <td><input name="vendidos" type="text"></td>
        </tr>
        <tr>
            <th>Attach Your File</th>
            <td><input name="attachment" type="file"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;"><input type="submit" name="Submit" value="Send"><input type="reset" name="Reset" value="Reset"></td>
        </tr>
    </table>
</form>