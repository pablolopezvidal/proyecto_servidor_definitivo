<?php

require_once("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\conexion\conecction.php");
require("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\modelo\usuarios.php");
session_start();

function loginUser($pdo) {
    try {
        $pdo->beginTransaction();

        if (isset($_POST["username"]) && isset($_POST["password"])) {
            $username = trim($_POST["username"]);
            $password = $_POST["password"];
        } else {
            header("Location: ../errors/error_login1.php");
            exit();  // Asegúrate de salir después de redirigir
        }

        $statement = $pdo->prepare("SELECT * FROM usuarios WHERE nombre = :username FOR UPDATE");
        $statement->bindParam(':username', $username);
        $statement->execute();
        
        $numFilas = $statement->rowCount();

        if ($statement && $numFilas == 1) {
            $usuario = $statement->fetch(PDO::FETCH_ASSOC);

            // Verifica la contraseña utilizando password_verify
            if (password_verify($password, $usuario["contraseña"])) {
                $_SESSION["usuario"] = $usuario;
                $_SESSION["ObjetoUsuario"] = new User($_SESSION['usuario']['usuarioId'], $_SESSION['usuario']['nombre'], $_SESSION['usuario']['contraseña'], $_SESSION['usuario']['direccion']);
                header("Location: controladorIndex.php");
            } else {
                $_SESSION["error_login"] = "Contraseña incorrecta";
                header("Location: controladorIndex.php");
                exit();  // Asegúrate de salir después de redirigir
            }
        } else {
            $_SESSION["error_login"] = "Usuario no encontrado";
            header("Location: ../errors/error_login.php");
            exit();  // Asegúrate de salir después de redirigir
        }

        $pdo->commit();
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo "No se ha podido logear";
    }
}


/*
require_once("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\conexion\conecction.php");
require("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\modelo\usuarios.php");
session_start();

function loginUser($pdo) {
    try {
        if (isset($_POST["username"]) && isset($_POST["password"])) {
            $username = trim($_POST["username"]);
            $password = $_POST["password"];
        } else {
            header("Location: ../errors/error_login1.php");
        }

        $statement = $pdo->prepare("SELECT * FROM usuarios WHERE nombre = :username");
        $statement->bindParam(':username', $username);
        $statement->execute();
        
        $numFilas = $statement->rowCount();

        if ($statement && $numFilas == 1) {
            $usuario = $statement->fetch(PDO::FETCH_ASSOC);

            // Verifica la contraseña utilizando password_verify
            if (password_verify($password, $usuario["contraseña"])) {
                $_SESSION["usuario"] = $usuario;
                $_SESSION["ObjetoUsuario"] = new User($_SESSION['usuario']['usuarioId'], $_SESSION['usuario']['nombre'], $_SESSION['usuario']['contraseña'], $_SESSION['usuario']['direccion']);
                header("Location: controladorIndex.php");
            } else {
                $_SESSION["error_login"] = "Contraseña incorrecta";
                header("Location: ../vista/index.php");
            }
        } else {
            $_SESSION["error_login"] = "Usuario no encontrado";
            header("Location: ../errors/error_login.php");
        }
    } catch (PDOException $e) {
        echo "No se ha podido logear";
    }
}
*/
?>


