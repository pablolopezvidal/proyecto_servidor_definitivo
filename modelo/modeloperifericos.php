<?php
require("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\modelo\productos.php");
require("C:\Users\pc\Desktop\\2º DAW\Entorno Servidor\proyecto_servidor_primer_trimestre\modelo\usuarios.php");

session_start();

function selectPerifericos($pdo) {
    try {
        $statement = $pdo->prepare("SELECT * FROM tienda_lpcomponents.productos where categoria=2");/*puedes mantar por het el nombre de la categoria*/
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


function selectPerifericosPrecioASC($pdo) {
    try {
        $statement = $pdo->prepare("SELECT * FROM tienda_lpcomponents.productos where categoria=2 order by precio asc");/*puedes mantar por het el nombre de la categoria*/
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


function selectPerifericosPrecioDESC($pdo) {
    try {
        $statement = $pdo->prepare("SELECT * FROM tienda_lpcomponents.productos where categoria=2 order by precio desc");/*puedes mantar por het el nombre de la categoria*/
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


function selectPerifericosNombreASC($pdo) {
    try {
        $statement = $pdo->prepare("SELECT * FROM tienda_lpcomponents.productos where categoria=2 order by nombre asc");/*puedes mantar por het el nombre de la categoria*/
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


function selectPerifericosNombreDESC($pdo) {
    try {
        $statement = $pdo->prepare("SELECT * FROM tienda_lpcomponents.productos where categoria=2 order by nombre desc");/*puedes mantar por het el nombre de la categoria*/
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