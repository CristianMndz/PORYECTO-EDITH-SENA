<header class="main-header">
	<!-- Logo -->
    <a href="#" class="logo">
        <!-- Mini logo para la barra lateral -->
        <span class="logo-mini">
            <img src="img\Otros\Logo.jpg" class="img-responsive" alt="Logo Mini" style="padding: 10px;">
        </span>
        <!-- Logo para dispositivos móviles y estado normal -->
        <span class="logo-lg">
            <img src="img\Otros\Logo.jpg" class="img-responsive" alt="Logo Principal" style="padding: 10px;">
        </span>
    </a>

    <!--=====================================
    BARRA DE NAVEGACIÓN
    ======================================-->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Botón de navegación -->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <!-- Perfil de usuario -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php
                        // Mostrar la foto del usuario o una imagen por defecto
                        $fotoUsuario = !empty($_SESSION["foto"]) ? $_SESSION["foto"] : "vistas/img/usuarios/default/anonymous.png";
                        echo '<img src="' . htmlspecialchars($fotoUsuario) . '" class="user-image" alt="Foto de perfil">';
                        ?>
                        <span class="hidden-xs"><?php echo htmlspecialchars($_SESSION["nombre"]); ?></span>
                    </a>

                    <!-- Menú desplegable -->
                    <ul class="dropdown-menu">
                        <li class="user-body">
                            <div class="pull-right">
                                <a href="salir" class="btn btn-default btn-flat">Cerrar Sesión</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>