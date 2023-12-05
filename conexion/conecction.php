<?php 

function connection($host, $user, $pass, $bd) {
    return new PDO("mysql: host=$host;dbname=$bd", $user, $pass);
}

try {
    $host = "localhost:3306";
    $user = "root";
    $pass = "root";
    $bd = "tienda_lpcomponents";

   $pdo = connection($host, $user, $pass, $bd);
}  catch (PDOException $e) {
    var_dump($e);
    #header("Location: ../errors/errors.php");
}

?>
