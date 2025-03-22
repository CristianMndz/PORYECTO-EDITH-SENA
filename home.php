<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Capital</title>
    <meta name="Proyecto ↓" content="">
    <meta name="Cristian Mendez" content="">

    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

    <!-- Stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rochester" rel="stylesheet">
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <?php
    // Conexión a la base de datos
    require_once 'mail/conexion.php';

    if (!$conn) {
        die("Error: No se pudo conectar a la base de datos.");
    }
    ?>

    <!-- Navegacion -->
    <nav id="menu" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="/lista-productos" class="page-scroll">Productos</a></li>
                    <li><a href="#team" class="page-scroll">Nuestra historia</a></li>
                    <li><a href="#contact" class="page-scroll">Contacto</a></li>
                    <li><a href="form/contratos.php" class="page-scroll">Catering</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Encabezado -->
    <header id="header">
        <div class="intro">
            <div class="overlay">
                <div class="container">
                    <div class="row">
                        <div class="intro-text">
                            <h1>La Capital</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Seccion de caracteristicas -->
    <div id="features" class="text-center">
        <div class="container">
            <div class="section-title">
                <h2>Pide en Casa</h2>
            </div>
            <div class="row">
                <?php
                $mostrarPlatillos = "SELECT productos.codigo, productos.descripcion, productos.imagen, productos.precio_venta FROM productos INNER JOIN categorias WHERE productos.id_categoria = categorias.id";
                $datosPlatillos = mysqli_query($conn, $mostrarPlatillos);
                $contarCategoria = "SELECT * FROM categorias";
                $datosCategoria = mysqli_query($conn, $contarCategoria);
                if (mysqli_num_rows($datosCategoria) > 0) {
                    while ($rowPlatillos = mysqli_fetch_array($datosPlatillos)) {
                ?>
                <div class="col-xs-12 col-sm-4">
                    <div class="features-item">
                        <h3><?php echo $rowPlatillos["descripcion"]; ?></h3>
                        <?php
                        $ruta = "proyecto2/vistas/img/productos/" . $rowPlatillos["codigo"];
                        if (is_dir($ruta)) {
                            $gestor = opendir($ruta);
                            while (($archivo = readdir($gestor)) != false) {
                                if (is_file($ruta . "/" . $archivo)) {
                                    echo "<img src='" . $ruta . "/" . $archivo . "' class='img-responsive' alt=''>";
                                }
                            }
                            closedir($gestor);
                        } else {
                            echo "No es una ruta de directorio valida <br>";
                        }
                        ?>
                        <p>Precio $<?php echo $rowPlatillos["precio_venta"]; ?></p>
                    </div>
                </div>
                <?php
                    }
                } else {
                    echo '<h3 style="color:#FF0000">¡Ups nuestros Chef aún no terminan de preparar!</h3>';
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Seccion del Menú -->
    <section id="team" class="text-center">
        <div class="container">
            <div class="section-title">
                <h2>¡Que se te haga agua la boca!</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="menu-item">
                        <img src="img/6.jpg" class="img-responsive" alt="Hamburguesa Sencilla">
                        <div class="menu-description">
                            <h3>Hamburguesa Sencilla con queso</h3>
                            <p>Con queso cheddar, cebolla y carne 100% fresca, cocinada al punto justo para conservar su sabor y jugosidad. Disfruta de una combinación perfecta de ingredientes seleccionados cuidadosamente para brindarte el auténtico sabor de una hamburguesa gourmet, ideal para los amantes de la buena comida.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="menu-item">
                        <img src="img/3.jpg" class="img-responsive" alt="Papas Fritas">
                        <div class="menu-description">
                            <h3>Papas Francesas con Salsa de La Casa</h3>
                            <p>Papas fritas crujientes acompañadas de una deliciosa salsa especial de la casa, elaborada con ingredientes frescos.</p>
                        </div>
                    </div>
                </div>      
            </div>
            <div class="col-md-6">
                    <div class="menu-item">
                        <img src="img\1.jpg" class="img-responsive" alt="Hamburgeusa Doble">
                        <div class="menu-description">
                            <h3>Hamburgues doble con queso y Tocineta</h3>
                            <p>Hamburguesa doble con queso y tocineta: Una irresistible fusión de dos jugosas carnes, queso derretido a la perfección y crujiente tocineta, diseñada para deleitar tu paladar.</p>
                        </div>
                   </div>
              </div>
              <div class="col-md-6">
                    <div class="menu-item">
                        <img src="img\7.png" class="img-responsive" alt="Combo de Hamburguesa">
                        <div class="menu-description">
                            <h3>Combo de Hamburguesas Carne y Pollo  </h3>
                            <p>Sánduche de pollo: Un sánduche ligero y delicioso, con pollo frito aderezado de forma especial para ofrecer una experiencia única en cada bocado.</p>
                        </div>

        </div>
    </section>

    <!-- Sección Nuestros Inicios -->
    <div id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="about-text">
                        <h2>Nuestros Inicios</h2>
                        <p>Todo comenzó en 2020, cuando la pandemia nos dejó sin empleo. En medio de la adversidad, decidimos transformar nuestra pasión por la cocina en una oportunidad. Comenzamos preparando comidas desde casa, ofreciendo platos caseros a nuestros vecinos y amigos.</p>
                        <p>El negocio creció rápidamente gracias al boca a boca y la calidad de nuestros productos. Hoy, La Capital se ha convertido en un restaurante establecido, ofreciendo una fusión única de comidas rápidas gourmet con ese toque casero que nos caracteriza desde el primer día.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-img">
                        <img src="img/14588.jpg" alt="Nuestros Inicios" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección de Contacto -->
    <section id="contact" class="text-center">
        <div class="container">
            <div class="row" style="margin: 10px 0;">
                <div class="col-md-4">
                    <h3 style="margin: 5px 0;">Cotizaciones al</h3>
                    <p style="margin: 5px 0;">(304) 300-5451</p>
                </div>
                <div class="col-md-4">
                    <h3 style="margin: 3px 0;">Estamos ubicados en</h3>
                    <p style="margin: 5px 0;">Bogotá.Dc, Colombia</p>
                </div>
                <div class="col-md-4">
                    <h3 style="margin: 5px 0;">Horario de apertura</h3>
                    <p style="margin: 5px 0;">Lunes-Viernes: 10:00 AM - 11:00 PM</p>
                    <p style="margin: 5px 0;">Sábado-Domingo: 11:00 AM - 09:00 PM</p>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-3 text-center">
                <div class="section-title">
                    <h3>¿Quieres recibir nuestras promociones?</h3>
                </div>
                <div class="text-center">
                    <a href="form/contratos.php" class="btn btn-primary btn-lg" style="background-color:hsl(0, 100.00%, 50.00%); border: none;">Suscribirse</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Pie de Pagina -->
    <footer id="footer">
        <div class="container text-center">
            <p>Proyecto SENA - Hecho en Colombia con ♥.</p>
            <div class="social">
                <ul style="list-style: none;">
                    <li><a href="https://wa.me/573043005451" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                    <li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                </ul>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/SmoothScroll.js"></script>
    <script type="text/javascript" src="js/jqBootstrapValidation.js"></script>
    <script type="text/javascript" src="js/contact_me.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>