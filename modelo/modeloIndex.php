<?php
require("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\modelo\servecios.php");
require("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\modelo\usuarios.php");

session_start();

function selectPublications($pdo) {
    try {
        $statement = $pdo->prepare("SELECT * FROM servicios");
        $statement->execute();

        $results = [];

        foreach ($statement->fetchAll() as $p) {
            
            $image = $p["fotos"];
            $image2 = productImage($image);
            $servicio = new Servicio($p["servicioID"], $p["nombre"], $p["descripcion"],$p["precio"],$image2,1); 
            array_push($results,$servicio);
        }

        return $results;
        
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
}

function selectTrabajadores($pdo) {
    try {
        $statement = $pdo->prepare("SELECT * FROM trabajadores");
        $statement->execute();

        $results = [];

        foreach ($statement->fetchAll() as $p) {
            array_push($results,$p);
        }

        return $results;
        
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
}


function productImage($foto){
  $base64Image = base64_encode($foto);
  return $base64Image;
}

?>