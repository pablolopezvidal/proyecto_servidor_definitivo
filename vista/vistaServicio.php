<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/estilos.css">
  <title>Título de la página</title>
</head>

<body>
<div id="cabecera">
     <img src="../styles/Group 2.png" alt="">
     <div id="cabecera2">
        <a href="controladorpagina.php">PRODUCTS</a>                      
        <a href="controladorServicios.php">SERVICES</a>
        <a href="../controlador/controladorCarrito.php">CART</a>  
        <?php
          if (isset($_SESSION["usuario"])) {
          ?>
               <a href="../modelo/cerrarSesion.php">LOG OUT</a>
              <div id="usuario"><a href="controladorPerfil.php">+</a></div>
          <?php
          } else {
          ?>
            <a href="../vista/loginView.php">LOGIN</a>
          <?php
          }
        ?>
     </div>
</div>
  <h1>SERVICES</h1>
  <div id="servicios_cats">
        <?php foreach ($results as $producto):
                $idProducto=$producto->servicioID;
                $tipoProducto=$producto->tipo;?>
            <div class="caja">
                <img src="data:image/jpeg;base64,<?=$producto->fotos; ?>" alt="image">
                <h3><?= $producto->nombre;?></h3>
                <h3><?= $producto->descripcion;?></h3>
                <h3><?= $producto->precio;?></h3>
                <a href="../modelo/añadircarrito.php?idProducto=<?=$idProducto ?>&tipoProducto=<?=$tipoProducto ?>">ADD TO CART</a>
            </div>  
        <?php endforeach;?>
    </div>
  </div>
</body>
</html>