<?php
require_once("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\conexion\conecction.php");
require("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\modelo\modeloCarrito.php");
session_start();

$results = selectCarrito($pdo);
// Cerrar la conexion

require("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\\vista\\vistaCarrito.php");

$pdo = null;
?>