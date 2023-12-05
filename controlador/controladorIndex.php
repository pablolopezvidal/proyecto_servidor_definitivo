<?php
require_once("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\conexion\conecction.php");
require("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\modelo\modeloIndex.php");

$results = selectPublications($pdo);
// Cerrar la conexion
$results2 = selectTrabajadores($pdo);

require("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\\vista\\index.php");

$pdo = null;
?>