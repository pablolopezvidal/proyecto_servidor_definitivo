<?php
require_once("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\conexion\conecction.php");
require("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\modelo\modeloComponentes.php");

if (isset($_GET['orden'])) {
    // Recupera el valor del parámetro 'orden'
    $orden = $_GET['orden'];

    // Ahora puedes utilizar $orden en tu lógica
    switch ($orden) {
        case 1:
            $results = selectPerifericosNombreDESC($pdo);
            break;
        case 2:
            $results = selectPerifericosNombreASC($pdo);
            break;
        case 3:
            $results = selectPerifericosPrecioDESC($pdo);
            break;
        case 4:
            $results = selectPerifericosPrecioASC($pdo);
            break;
        case 5:
            $results = selectPerifericos($pdo);
            break;
        default:
            // Código para manejar cualquier otro valor
            break;
    }
} else{
    $results = selectPerifericos($pdo);
}

require("C:\Users\pc\Desktop/2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre/vista/vistapagina.php");

$pdo = null;
?>