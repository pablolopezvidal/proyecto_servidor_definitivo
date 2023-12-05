<?php

require("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\modelo\productos.php");
require("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\modelo\usuarios.php");

function selectCarrito($pdo) {
    $productosEnCarrito = array();

    try {
        foreach ($_COOKIE as $nombre => $valor) {
            // Verifica si el nombre de la cookie tiene un key numérico
            if (is_numeric($nombre)) {
                $datosProducto = unserialize($valor);
    
                if ($datosProducto['tipo'] == 0) {
                    $statement = $pdo->prepare("SELECT * FROM productos WHERE productoID = :idobjeto");
                } else {
                    $statement = $pdo->prepare("SELECT * FROM servicios WHERE servicioID = :idobjeto");
                }

                $statement->bindParam(':idobjeto', $datosProducto['idobjeto']);
            
                // Ejecuta la consulta
                $statement->execute();

                // Fetch the result as an associative array
                $result = $statement->fetch(PDO::FETCH_ASSOC);

                $image = $result["fotos"];
                $image2 = productImage($image);

                if ($datosProducto['tipo'] == 0) {
                    $producto = array(
                        'fotos' => $image2,
                        'idProducto' => $result["productoID"],
                        'nombre' => $result["nombre"],
                        'precio' => $result["precio"],
                        'tipo' => $datosProducto['tipo']


                    );
                } else {
                    $producto = array(
                        'fotos' => $image2,
                        'idProducto' => $result["servicioID"],
                        'nombre' => $result["nombre"],
                        'precio' => $result["precio"],
                        'tipo' => $datosProducto['tipo']

                    );
                }
                // Agrega el producto al array de productos en el carrito
                array_push($productosEnCarrito, $producto);
            }
        }
        return $productosEnCarrito;
    } catch (Exception $excepcion) {
        // Manejar la excepción aquí si es necesario
        // Puedes imprimir un mensaje de error o realizar alguna acción específica
        echo "Error: " . $excepcion->getMessage();
    }
}
function productImage($foto){
    $base64Image = base64_encode($foto);
    return $base64Image;
}






















































































/*
require("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\modelo\productos.php");
require("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\modelo\usuarios.php");

function selectCarrito() {
    $productosEnCarrito = array();

    try {
        foreach ($_COOKIE as $nombre => $valor) {
            // Verifica si el nombre de la cookie tiene un key numérico
            if (is_numeric($nombre)) {
                $datosProducto = unserialize($valor);
    
                if($datosProducto['tipo']==0){

                    $statement = $pdo->prepare("SELECT * FROM productos where productoId= :idobjeto");

                    $statement->bindParam(':idobjeto',$datosProducto['idobjeto']);
            
                    // Ejecuta la consulta
                    $statement->execute();

                    $producto = array(
                        'idProducto' => $statement["productoID"],
                        'nombre' =>  $statement["nombre"],
                        'precio' =>  $statement["precio"]
                    );
        
                    // Agrega el producto al array de productos en el carrito
                    $productosEnCarrito.array_push($producto)

                }else{
                    $statement = $pdo->prepare("SELECT * FROM servicios where servicioID= :idobjeto");

                    $statement->bindParam(':idobjeto',$datosProducto['idobjeto']);
            
                    // Ejecuta la consulta
                    $statement->execute();

                    $producto = array(
                        'idProducto' => $statement["productoID"],
                        'nombre' =>  $statement["nombre"],
                        'precio' =>  $statement["precio"]
                    );
        
                    // Agrega el producto al array de productos en el carrito
                    $productosEnCarrito.array_push($producto)
                }
            }

            }
   
        }
    
        return $productosEnCarrito;
    } catch (Exception $excepcion) {
        // Manejar la excepción aquí si es necesario
        // Puedes imprimir un mensaje de error o realizar alguna acción específica
        echo "Error: " . $excepcion->getMessage();
    }
}
*/
?>


