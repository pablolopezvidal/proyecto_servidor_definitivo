<?php

require_once("C:/Users/pc/Desktop/2º DAW/Entorno Servidor/proyecto_servidor_primer_trimestre/conexion/conecction.php");
require("modelo\\editarUsuario.php");

    $nombre = $_POST['nombre'];

editarUSer($pdo, $nombre);

?>

