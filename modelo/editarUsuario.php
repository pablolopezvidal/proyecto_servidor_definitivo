<?php

require("C:/Users/pc/Desktop/2º DAW/Entorno Servidor/proyecto_servidor_primer_trimestre/modelo/usuarios.php");
session_start();

function editarUSer($pdo, $nombre) {
    try {
        // Comienza la transacción
        $pdo->beginTransaction();

        // Supongamos que tienes una tabla llamada 'usuarios'
        $query = "UPDATE usuarios SET nombre = :nombre WHERE usuarioId = :id";

        $stmt = $pdo->prepare($query);

        $idUsuario = $_SESSION["usuario"]["usuarioId"];

        // Utiliza bindValue para evitar problemas de pasaje por referencia
        $stmt->bindValue(':nombre', $nombre);

        $stmt->bindValue(':id', $idUsuario);

        $stmt->execute();

        $_SESSION["usuario"]["nombre"]=$nombre;
        

        // Confirma la transacción
        $pdo->commit();

        header("Location: ../controlador/controladorPerfil.php");
        exit();  // Añade exit después de la redirección para evitar ejecución adicional
    } catch (Exception $e) {
        // Si hay algún error, revierte la transacción
        $pdo->rollBack();
        // Log del error o muestra un mensaje genérico en un entorno de producción
        echo $e;
        // Log del error: error_log($e->getMessage());
    }
}
?>
