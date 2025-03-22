<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Productos
<meta name="description" content="">
<meta name="Cristian Mendez" content="">

<!-- Favicons
    ================================================== -->
<!--<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">-->
<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

<!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css"  href="css/style.css">
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Rochester" rel="stylesheet">
<style>
    #menu {
        background-color: white !important;
    }
    .navbar-nav > li > a {
        color: #333 !important;
    }
    
    .section-title{
        margin-top: 100px;
        margin-bottom: 10px;
    }
    .title-page {
        text-align: center;
    }
    .card {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        margin: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 300px;
    }
    .card img {
        width: 100%;
        height: auto;
        border-radius: 8px;
    }
    .card h4, .card p {
        margin: 10px 0;
    }
    .btn {
        display: inline-block;
        background-color: #28a745;
        color: white;
        padding: 10px 15px;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
    }
    .btn:hover {
        background-color: #218838;
    }
    .card-container {
        display: flex;
        flex-wrap: wrap;
        padding: 0 80px;
    }
</style>
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<!-- Navigation
    ==========================================-->
<nav id="menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="/lista-productos" class="page-scroll">Prodcutos</a></li>        
        <li><a href="/#team" class="page-scroll">Nuestra Historia</a></li>
        <li><a href="/#contact" class="page-scroll">Contacto</a></li>
        <li><a href="form/contratos.php" class="page-scroll">Catering</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
</nav>

<div class="section-title">
    <h2 class="title-page"> Productos </h2>
    <br>
    <?php 
        $consulta = "SELECT categorias.categoria, productos.descripcion, productos.codigo, productos.imagen, productos.precio_venta  
                     FROM productos 
                     INNER JOIN categorias 
                     WHERE productos.id_categoria = categorias.id";
        $extraer = mysqli_query($conn, $consulta);
        if (mysqli_num_rows($extraer) > 0) {
    ?>
    </div>
    <div class="row">
        <div class="card-container">
        <?php
                while ($nuevo = mysqli_fetch_array($extraer)) {
                    $nombre_producto = urlencode($nuevo["descripcion"]);
                    $codigo_producto = urlencode($nuevo["codigo"]);
                    $precio_producto = urlencode($nuevo["precio_venta"]);
                    $whatsapp_url = "https://wa.me/573043005451?text=Hola,%20quiero%20comprar%20el%20producto%20*$nombre_producto*%20con%20el%20código%20*$codigo_producto*";
            ?>
            <div class="card">
                <img src="<?php echo $nuevo["imagen"]; ?>" alt="Imagen de <?php echo $nuevo["descripcion"]; ?>">
                <h4><?php echo $nuevo["descripcion"]; ?></h4>
                <p>Categoría: <?php echo $nuevo["categoria"]; ?></p>
                <p>Código: <?php echo $nuevo["codigo"]; ?></p>
                <p><strong>Precio: $<?php echo $precio_producto; ?></strong></p>
                <a href="<?php echo $whatsapp_url; ?>" class="btn" target="_blank">
                    <i class="fa fa-whatsapp"></i>
                    Comprar
                </a>
            </div>
        <?php 
            }
        ?>
        </div>
    <?php 
        } else {
            echo '<h3 style="color:#FF0000">Aun no hay productos disponibles</h3>';
        }
    ?>
</div>
