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
  <?php
    // Obtiene la URL actual
    $urlActual = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    // Extrae la información del path
    $pathInfo = pathinfo(parse_url($urlActual, PHP_URL_PATH));

    // Obtiene el nombre del archivo (sin extensión)
    $nombreArchivo = $pathInfo['filename'] . '.' . $pathInfo['extension'];
  ?>
  <div id="caja2">
    <div id="filtros">
      <div id="cajaFiltros">
          <h3>filtros</h3>
          <a href="<?php echo $nombreArchivo; ?>?orden=1">NAME DESC</a>
          <a href="<?php echo $nombreArchivo; ?>?orden=2">NAME ASC</a>
          <a href="<?php echo $nombreArchivo; ?>?orden=3">PRICE DESC</a>
          <a href="<?php echo $nombreArchivo; ?>?orden=4">PRICE ASC</a>
          <a href="<?php echo $nombreArchivo; ?>?orden=5">RESTART</a>
      </div>
    </div>
    <div id="servicios_cats3">
      <div id="productos_cats">
        <div class="producto_categoria_cajon"><a href="controladorComponentes.php">COMPONENTS</a></div>
        <div class="producto_categoria_cajon"><a href="controladorperifericos.php">PERIPHERALS</a></div>
        <div class="producto_categoria_cajon"><a href="controladorKeycaps.php">KEYCAPS</a></div>
      </div>
      <?php foreach ($results as $producto):
        $_SESSION["categoria"]=$producto->categoria;
        $idProducto=$producto->productoID;
          $tipoProducto=$producto->tipo;?>
          <div class="caja">
            <img src="data:image/jpeg;base64,<?=$producto->fotos; ?>" alt="image">
            <h3><?= $producto->nombre;?></h3>
            <p><?= $producto->descripcion;?></p>
            <h3><?= $producto->precio;?></h3>
            <a href="../modelo/añadircarrito.php?idProducto=<?=$idProducto ?>&tipoProducto=<?=$tipoProducto ?>">ADD TO CART</a>
          </div>  
      <?php endforeach;?>
    </div>
  </div>        
</body>
</html>