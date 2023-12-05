<?php
require_once("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\conexion\conecction.php");
require_once("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\modelo\carritos.php");

session_start();

$productosEnCarrito = array();

try {
    $pdo->beginTransaction();

    // Insertar un nuevo carrito
    $statement3 = $pdo->prepare("INSERT INTO carritos (usuario, fecha) VALUES (:usuarioD, NOW())");
    $statement3->bindParam(':usuarioD', $_SESSION["usuario"]["usuarioId"]);
    $statement3->execute();

    // Recuperar el carrito
    $statement4 = $pdo->prepare("SELECT * FROM carritos WHERE usuario = :usuarioD order by carritoID DESC");
    $statement4->bindParam(':usuarioD', $_SESSION["usuario"]["usuarioId"]);
    $statement4->execute();
    $carritoData = $statement4->fetch(PDO::FETCH_ASSOC);

    // Crear un objeto carrito
    $carrito = new carrito($carritoData["carritoID"], $carritoData["usuario"], $carritoData["fecha"]);

    // Procesar cookies
    foreach ($_COOKIE as $nombre => $valor) {
        if (is_numeric($nombre)) {
            $datosProducto = unserialize($valor);

            // Insertar en productos_carrito
            if ($datosProducto["tipo"] == 0) {
                $statement5 = $pdo->prepare("INSERT INTO productos_carrito (ID_ProductoCarrito, ID_Carrito, ID_Producto, ID_Servicio, Cantidad) VALUES (0, :carritoid, :productoid, null, 1)");
                $statement5->bindParam(':productoid', $datosProducto['idobjeto']);
            } else {
                $statement5 = $pdo->prepare("INSERT INTO productos_carrito (ID_ProductoCarrito, ID_Carrito, ID_Producto, ID_Servicio, Cantidad) VALUES (0, :carritoid, null, :servicioid, 1)");
                $statement5->bindParam(':servicioid', $datosProducto['idobjeto']);
            }

            $statement5->bindParam(':carritoid', $carrito->carritosId);

            $statement5->execute();

            // Limpiar la cookie
            setcookie($nombre, "", time() - 3600, "/");
            header("Location: ..\controlador\controladorIndex.php");

        }
    }

    $pdo->commit();
} catch (Exception $excepcion) {
    $pdo->rollBack();
    echo "Error: " . $excepcion->getMessage();
}

?>
