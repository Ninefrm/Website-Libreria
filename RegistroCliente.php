<?php include 'Visual/Plantilla/Header.php'; ?>
<div class="container">

    <div class="col s12 m6">
        <div class="card blue-grey darken-1">
            <div class="card-content white-text blue">
                <span class="card-title" align='center'>NUEVO CLIENTE</span>
            </div>
        </div>
    </div>
    <form action="NuevoUsuario.php" method="post" name="NuevoUsuario" enctype="multipart/form-data">
        <table width="500" border="0" cellpadding="5" cellspacing="5">
            <tr>
                <th>Nombre del cliente:</th>
                <td><input name="nombre_cliente" type="text"></td>
            </tr>
            <tr>
                <th>Apellido paterno:</th>
                <td><input name="apellido_p" type="text"></td>
            </tr>
            <tr>
                <th>Apellido materno:</th>
                <td><input name="apellido_m" type="text"></td>
            </tr>
            <tr>
                <th>Correo electronico:</th>
                <td><input name="correo_electronico" type="text"></td>
            </tr>
            <tr>
                <th>Usuario:</th>
                <td><input name="usuario" type="text"></td>
            </tr>
            <tr>
                <th>Contraseña:</th>
                <td><input name="password" type="password"></td>
            </tr>
            <tr>
                <th>Calle:</th>
                <td><input name="calle" type="text"></td>
            </tr>
            <tr>
                <th>#:</th>
                <td><input name="numero" type="text"></td>
            </tr>
            <tr>
                <th>Colonia:</th>
                <td><input name="colonia" type="text"></td>
            </tr>
            <tr>
                <th>Codigo postal:</th>
                <td><input name="codigo_postal" type="text"></td>
            </tr>
            <tr>
                <th>Número de teléfono:</th>
                <td><input name="numero_de_telefono" type="text"></td>
            </tr>
            <tr>
                <th>Metodo de pago:</th>
                <td><input name="metodo_de_pago" type="text"></td>
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
