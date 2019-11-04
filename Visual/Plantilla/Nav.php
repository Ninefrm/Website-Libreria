<aside>
    <ul id="slide-out" class="sidenav">
        <li><div class="user-view">
                <div class="background">
                    <img src="Img/Veterinaria.png">
                </div>
                <i class="large material-icons">account_circle</i>
                <a href="Perfil.php"><span class="black-text name"> Nombre: </span><?php print_r($_SESSION['nombre']) ?></a>

                <a href="Perfil.php"><span class="black-text name"> Correo: </span><?php print_r($_SESSION['correo_electronico']) ?></a>

            </div></li>
        <li><a href="index.php" title="VeterinariaOnline"><i class="material-icons">cloud</i>Inicio</a></li>
        <li><a href="Mascotas.php" title="Catalogo de Mascotas"><i class="material-icons">pets</i>Mascotas</a></li>
        <li><a href="Tienda.php" title="Ver la tienda"><i class="material-icons">shop</i>Tienda</a></li>
        <li><?php if ($_SESSION['tipo'] == 'Cajero' || $_SESSION['tipo'] == 'Veterinario' || $_SESSION['tipo'] == 'Administrador'){ ?>
                <a href="AdministrarPerfiles.php" title="Administrar perfiles"><i class="material-icons">account_box</i>Admininistrar Perfiles</a>
            <?php } ?>
        </li>
    </ul>


    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>


</aside>
