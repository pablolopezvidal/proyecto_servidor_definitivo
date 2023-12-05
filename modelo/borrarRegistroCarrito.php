<?php
require("C:/Users/pc/Desktop/2º DAW/Entorno Servidor/proyecto_servidor_primer_trimestre/conexion/conecction.php");

if (isset($_GET['idProducto']) && isset($_GET['tipo'])) {
    $idProducto = $_GET['idProducto'];
    $tipoProducto = $_GET['tipo'];
    

    try {
        foreach ($_COOKIE as $nombre => $valor) {
            // Verifica si el nombre de la cookie tiene un key numérico
            if (is_numeric($nombre)) {
                $datosProducto = unserialize($valor);
                var_dump($datosProducto);
                var_dump("---------------");
                var_dump($nombre);
                if($idProducto==$datosProducto['idobjeto'] && $tipoProducto==$datosProducto['tipo']){
                     // Elimina el valor de la cookie
                     unset($_COOKIE[$nombre]);

                     // Establece la cookie con el mismo nombre, pero con un tiempo de expiración en el pasado
                     setcookie($nombre, '', time() - 3600, '/');
 
                     header("Location: ..\controlador\controladorCarrito.php");
                     exit;  // Asegúrate de salir después de redirigir
                }     
            }
        }
    } catch (Exception $excepcion) {
        echo "Error: " . $excepcion->getMessage();
    }



}
?>