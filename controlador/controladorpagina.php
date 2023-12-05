<?php
require_once("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\conexion\conecction.php");
require("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\modelo\modelopagina.php");


if (isset($_GET['orden'])) {
    // Recupera el valor del parámetro 'orden'
    $orden = $_GET['orden'];

    // Ahora puedes utilizar $orden en tu lógica
    switch ($orden) {
        case 1:
            $results = selectPublicationsForNombreDESC($pdo);
            break;
        case 2:
            $results = selectPublicationsForNombreASC($pdo);
            break;
        case 3:
            $results = selectPublicationsForPiceDESC($pdo);
            break;
        case 4:
            $results = selectPublicationsForPiceASC($pdo);
            break;
        case 5:
            $results = selectPublications($pdo);
            break;
        default:
            // Código para manejar cualquier otro valor
            break;
    }
} else{
    $results = selectPublications($pdo);
}
// Cerrar la conexion

require("C:\Users\pc\Desktop/2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre/vista/vistapagina.php");

$pdo = null;
?>