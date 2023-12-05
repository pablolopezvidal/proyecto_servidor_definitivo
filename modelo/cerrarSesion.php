<?php


// Inicia la sesión
session_start();

// Destruye la sesión
session_destroy();

// Redirige a la página de inicio de sesión o a donde lo desees después de cerrar sesión
header("Location: ../controlador/controladorIndex.php");
exit();


?>