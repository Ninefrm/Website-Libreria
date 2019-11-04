<?php include 'Visual/Plantilla/Header.php'; ?>
<div class="container">

    <div class="col s12 m6">
        <div class="card blue-grey darken-1">
            <div class="card-content white-text blue">
                <span class="card-title" align='center'>AGREGAR LIBRO A LA LIBRERIA</span>
            </div>
        </div>
    </div>
    <form action="SubirProducto.php" method="post" name="mainform" enctype="multipart/form-data">
        <table width="500" border="0" cellpadding="5" cellspacing="5">
            <tr>
                <th>Nombre del libro:</th>
                <td><input name="nombre_libro" type="text"></td>
            </tr>
            <tr>
                <th>Autor Del libro:</th>
                <td><input name="autor" type="text"></td>
            </tr>
            <tr>
                <th>Sinopsis del libro:</th>
                <td><input name="sinopsis" type="text"></td>
            </tr>
            <tr>
                <th>Costo del libro:</th>
                <td><input name="costo" type="number"></td>
            </tr>
            <tr>
                <th>Año de publicación:</th>
                <td><input name="ano_de_publicacion" type="text"></td>
            </tr>
            <tr>
                <th>Pais de publicación:</th>
                <td><input name="pais_de_publicacion" type="text"></td>
            </tr>
            <tr>
                <th>Nombre de la editorial:</th>
                <td><input name="editorial" type="text"></td>
            </tr>
            <tr>
                <th>Número de edición:</th>
                <td><input name="numero_de_edicion" type="text"></td>
            </tr>
            <tr>
                <th>Año de edición:</th>
                <td><input name="ano_de_edicion" type="text"></td>
            </tr>
            <tr>
                <th>Número de páginas:</th>
                <td><input name="numero_de_paginas" type="text"></td>
            </tr>
            <tr>
                <th>Genero:</th>
                <td><input name="genero" type="text"></td>
            </tr>
            <tr>
                <th>Cantidad:</th>
                <td><input name="cantidad" type="text"></td>
            </tr>
            <tr>
                <th>Calificación:</th>
                <td><input name="calificacion" type="text"></td>
            </tr>
            <tr>
                <th>ISBN:</th>
                <td><input name="ISBN" type="text"></td>
            </tr>
            <tr>
                <th>Vendidos:</th>
                <td><input name="vendidos" type="text"></td>
            </tr>
            <tr>
                <th>Portada del libro:</th>
                <td><input name="attachment" type="file"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;"><input type="submit" name="Submit" value="Send"><input type="reset" name="Reset" value="Reset"></td>
            </tr>
        </table>
    </form>

</div>
<?php include 'Visual/Plantilla/PieDePagina.php'; ?>
</body>
</html>