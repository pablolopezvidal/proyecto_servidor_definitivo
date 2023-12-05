<?php
require_once("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\conexion\conecction.php");
require("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\modelo\modeloPerfil.php");

$results = verPerfil($pdo);
$results2 = obtenerInformacionCarritos($pdo,$_SESSION['usuario']['usuarioId']);
// Cerrar la conexion

require("C:\Users\pc\Desktop/2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre/vista/perfilView.php");

$pdo = null;
?>