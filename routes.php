<?php
$requestUri = $_SERVER['REQUEST_URI'];
$requestUri = parse_url($requestUri, PHP_URL_PATH);

$allowedRoutes = [
    "/inicio",
    "/usuarios",
    "/categorias",
    "/productos",
    "/clientes",
    "/ventas",
    "/crear-venta",
    "/editar-venta",
    "/nuevosContratos",
    "/nuevosSuscriptores",
    "/reportes",
    "/salir"
];


$publicRoutes = [
    "/lista-productos",
];

if (in_array($requestUri, $allowedRoutes)) {
    require('vistas/plantilla.php');
} else {
    if (in_array($requestUri, $publicRoutes)) {
        require("./vistas/modulos".$requestUri.".php");
        return;
    }

    require('home.php');
}
