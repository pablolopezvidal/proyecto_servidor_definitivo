<?php
require("C:/Users/pc/Desktop/2º DAW/Entorno Servidor/proyecto_servidor_primer_trimestre/conexion/conecction.php");

if (isset($_GET['idProducto']) && isset($_GET['tipoProducto'])) {
    $idProducto = $_GET['idProducto'];
    $tipoProducto = $_GET['tipoProducto'];
    
    
    $contadorProductos = isset($_COOKIE['contadorProductos']) ? intval($_COOKIE['contadorProductos']) : 0;
    $contadorProductos++;

    $datosProducto = array(
        'idobjeto' => $idProducto,
        'tipo' =>  $tipoProducto
    );

    $datosSerializados = serialize($datosProducto);

    setcookie($contadorProductos, $datosSerializados, time() + 2 * 24 * 60 * 60, '/');

    setcookie('contadorProductos', $contadorProductos, time() + 2 * 24 * 60 * 60, '/');

    header("Location: ..\controlador\controladorpagina.php");
}

?>

