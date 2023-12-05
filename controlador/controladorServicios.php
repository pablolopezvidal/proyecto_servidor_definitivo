<?php
require_once("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\conexion\conecction.php");
require("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\modelo\modeloServicio.php");

$results = selectPublications($pdo);
// Cerrar la conexion

require("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\\vista\\vistaServicio.php");

$pdo = null;
?>