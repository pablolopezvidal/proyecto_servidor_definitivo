<?php


require_once("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\conexion\conecction.php");
require("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\modelo\usuarios.php");
session_start();

function registroUser($pdo) {
    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $direccion = isset($_POST["description"]) ? $_POST["description"] : "";

    $arrayErrores = array();

    if (empty($username)) {
        $arrayErrores["username"] = "El nombre de usuario no puede ser vacío";
    }

    if (empty($email)) {
        $arrayErrores["email"] = "El correo electrónico no puede ser vacío";
    }

    if (empty($password)) {
        $arrayErrores["password"] = "La contraseña no puede ser vacía";
    }

    if (empty($direccion)) {
        $arrayErrores["direccion"] = "La descripción no puede ser vacía";
    }

    $statement2 = $pdo->prepare("SELECT * FROM usuarios WHERE nombre = :username");
    $statement2->bindParam(':username', $username);
    $statement2->execute();
    $usuariosRegistrados = $statement2->fetchAll();

    if (count($usuariosRegistrados) > 0) {
        $arrayErrores["username"] = "Este nombre de usuario ya ha sido registrado";
    }

    if (empty($arrayErrores)) {
        try {
            // Inicia la transacción
            $pdo->beginTransaction();

            $passSegura = password_hash($password, PASSWORD_BCRYPT, ["cost" => 4]);

            $statement3 = $pdo->prepare("INSERT INTO usuarios (usuarioId, nombre, contraseña, direccion) VALUES (0, :username, :password, :direccion)");
            $statement3->bindParam(':username', $username);
            $statement3->bindParam(':password', $passSegura);
            $statement3->bindParam(':direccion', $direccion);
            $statement3->execute();

            if ($statement3) {
                // Confirma la transacción si todo va bien
                $pdo->commit();

                $_SESSION["completado"] = "Registro completado";
                header("Location: ../vista/loginView.php");
                exit; // Importante agregar exit después de la redirección
            } else {
                // Cancela la transacción en caso de fallo
                $pdo->rollBack();

                $_SESSION["errores"]["general"] = "Fallo en el registro";
                header("Location: ../errors/error_login.php");
                exit; // Importante agregar exit después de la redirección
            }
        } catch (PDOException $e) {
            // En caso de excepción, cancela la transacción
            $pdo->rollBack();

            echo "Error en la inserción: " . $e->getMessage();
        }
    } else {
        $_SESSION["errores"] = $arrayErrores;
        header("Location: ../errors/error_login1.php");
        exit; // Importante agregar exit después de la redirección
    }
}





/*
require_once("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\conexion\conecction.php");
require("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\modelo\usuarios.php");
session_start();

function registroUser($pdo) {
    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $direccion = isset($_POST["description"]) ? $_POST["description"] : "";

    $arrayErrores = array();

    if (empty($username)) {
        $usernameValidado = false;
        $arrayErrores["username"] = "El nombre de usuario no puede ser vacío";
    }

    if (empty($email)) {
        $mailValidado = false;
        $arrayErrores["email"] = "El correo electrónico no puede ser vacío";
    }

    if (empty($password)) {
        $passValidado = false;
        $arrayErrores["password"] = "La contraseña no puede ser vacía";
    }

    if (empty($direccion)) {
        echo "fallo4";
        $direccionValidado = false;
        $arrayErrores["direccion"] = "La descripción no puede ser vacía";
    }

    $statement2 = $pdo->prepare("SELECT * FROM usuarios WHERE nombre = :username");
    $statement2->bindParam(':username', $username);
    $statement2->execute();
    $usuariosRegistrados = $statement2->fetchAll();

    if (count($usuariosRegistrados) > 0) {
        $usernameValidado = false;
        $arrayErrores["username"] = "Este nombre de usuario ya ha sido registrado";
    }

    $guardarUsuario = false;

    if (empty($arrayErrores)) {
        $guardarUsuario = true;

        $passSegura = password_hash($password, PASSWORD_BCRYPT, ["cost" => 4]);

        try {
            $statement3 = $pdo->prepare("INSERT INTO usuarios (usuarioId, nombre, contraseña, direccion) VALUES (0, :username, :password, :direccion)");
            $statement3->bindParam(':username', $username);
            $statement3->bindParam(':password', $passSegura);
            $statement3->bindParam(':direccion', $direccion);
            $statement3->execute();

            if ($statement3) {
                $_SESSION["completado"] = "Registro completado";
                header("Location: ../vista/index.php");
                exit; // Importante agregar exit después de la redirección
            } else {
                $_SESSION["errores"]["general"] = "Fallo en el registro";
                header("Location: ../errors/error_login.php");
                exit; // Importante agregar exit después de la redirección
            }
        } catch (PDOException $e) {
            echo "Error en la inserción: " . $e->getMessage();
        }
    } else {
        $_SESSION["errores"] = $arrayErrores;
        header("Location: ../errors/error_login1.php");
        exit; // Importante agregar exit después de la redirección
    }
}
*/
?>




