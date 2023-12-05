<?php
require("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\modelo\productos.php");
require("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\modelo\usuarios.php");

session_start();

function selectPublications($pdo) {
    try {
        $statement = $pdo->prepare("SELECT * FROM productos");
        $statement->execute();

        $results = [];

        foreach ($statement->fetchAll() as $p) {
            
            $image = $p["fotos"];
            $image2 = productImage($image);
            $productos = new Producto($p["productoID"], $p["nombre"], $p["descripcion"],$p["precio"],$p["categoria"],$image2,0); 
            array_push($results,$productos);
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

function selectPublicationsForPiceASC($pdo) {
    try {
        $statement = $pdo->prepare("SELECT * FROM productos order by precio asc");
        $statement->execute();

        $results = [];

        foreach ($statement->fetchAll() as $p) {
            
            $image = $p["fotos"];
            $image2 = productImage($image);
            $productos = new Producto($p["productoID"], $p["nombre"], $p["descripcion"],$p["precio"],$p["categoria"],$image2,0); 
            array_push($results,$productos);
        }

        return $results;
        
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
}


function selectPublicationsForPiceDESC($pdo) {
    try {
        $statement = $pdo->prepare("SELECT * FROM productos order by precio desc");
        $statement->execute();

        $results = [];

        foreach ($statement->fetchAll() as $p) {
            
            $image = $p["fotos"];
            $image2 = productImage($image);
            $productos = new Producto($p["productoID"], $p["nombre"], $p["descripcion"],$p["precio"],$p["categoria"],$image2,0); 
            array_push($results,$productos);
        }

        return $results;
        
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
}


function selectPublicationsForNombreASC($pdo) {
    try {
        $statement = $pdo->prepare("SELECT * FROM productos order by nombre asc");
        $statement->execute();

        $results = [];

        foreach ($statement->fetchAll() as $p) {
            
            $image = $p["fotos"];
            $image2 = productImage($image);
            $productos = new Producto($p["productoID"], $p["nombre"], $p["descripcion"],$p["precio"],$p["categoria"],$image2,0); 
            array_push($results,$productos);
        }

        return $results;
        
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
}


function selectPublicationsForNombreDESC($pdo) {
    try {
        $statement = $pdo->prepare("SELECT * FROM productos order by nombre DESC");
        $statement->execute();

        $results = [];

        foreach ($statement->fetchAll() as $p) {
            
            $image = $p["fotos"];
            $image2 = productImage($image);
            $productos = new Producto($p["productoID"], $p["nombre"], $p["descripcion"],$p["precio"],$p["categoria"],$image2,0); 
            array_push($results,$productos);
        }

        return $results;
        
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
}





?>