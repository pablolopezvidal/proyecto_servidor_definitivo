<?php
require("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\modelo\productos.php");
require("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\modelo\usuarios.php");
require("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\modelo\carritos.php");


session_start();

function verPerfil($pdo) {


    try {
        // Prepara la consulta SQL para seleccionar el producto por su ID
        $statement = $pdo->prepare("SELECT * FROM usuarios where usuarioId= :usuarioId1");

        // Bindea el valor del ID del producto en la consulta
        $statement->bindParam(':usuarioId1',$_SESSION["usuario"] ["usuarioId"]);

        // Ejecuta la consulta
        $statement->execute();

        $results = [];

        foreach ($statement->fetchAll() as $p) {
            
          $usuaio = new User($p["usuarioId"], $p["nombre"], $p["contraseña"], $p["direccion"]);
          array_push($results,$usuaio);

        }

        return $results;
        
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }

    
}




function obtenerInformacionCarritos($pdo, $usuarioId) {
    try {
        // Consulta SQL para obtener información de carritos y productos
        $sql = "SELECT * FROM productos_carrito 
                JOIN carritos ON productos_carrito.ID_Carrito = carritos.carritoID 
                WHERE carritos.usuario = :usuarioId";

        $statement = $pdo->prepare($sql);
        $statement->bindParam(':usuarioId', $usuarioId, PDO::PARAM_INT);
        $statement->execute();

        $carritos = [];

        while ($fila = $statement->fetch(PDO::FETCH_ASSOC)) {
            $carritoID = $fila['carritoID'];

            // Si el carrito no está en el array, agrégalo
            if (!isset($carritos[$carritoID])) {
                $carritos[$carritoID] = [
                    'carritoID' => $fila['carritoID'],
                    'usuario' => $fila['usuario'],
                    'fecha' => $fila['fecha'],
                    'productos' => [],
                ];
            }

            // Añade el producto al array del carrito
            $producto = [
                'ID_ProductoCarrito' => $fila['ID_ProductoCarrito'],
                'ID_Carrito' => $fila['ID_Carrito'],
                'ID_Producto' => $fila['ID_Producto'],
                'ID_Servicio' => $fila['ID_Servicio'],
                'Cantidad' => $fila['Cantidad'],
            ];

            $carritos[$carritoID]['productos'][] = $producto;
        }

        return $carritos;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];
    }
}

// Ejemplo de uso:
// $pdo = new PDO("mysql:host=tu_host;dbname=tienda_lpcomponents", "tu_usuario", "tu_contraseña");
// $usuarioId = 1; // Cambia esto al ID del usuario que estás consultando
// $resultado = obtenerInformacionCarritos($pdo, $usuarioId);
// print_r($resultado);

?>





























$producto = array(
        'fotos' => $image2,
        'idProducto' => $result["productoID"],
        'nombre' => $result["nombre"],
        'precio' => $result["precio"],
        'tipo' => $datosProducto['tipo']
    );
 