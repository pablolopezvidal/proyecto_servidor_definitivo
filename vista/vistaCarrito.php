<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/estilos.css">
  <title>Título de la página</title>
</head>
<body>
  <h1>CART</h1>
  <div id="contenido_carrito">
    <?php foreach ($results as $producto):?>
        <div class="cajon_productos_carro">
            <img src="data:image/jpeg;base64,<?=$producto['fotos'];?>" alt="image">
            <h3><?= $producto['idProducto'];?></h3>
            <h3><?= $producto['nombre'];?></h3>
            <h3><?= $producto['precio'];?></h3>
            <a href="../modelo/borrarRegistroCarrito.php?idProducto=<?= $producto['idProducto']; ?>&tipo=<?= $producto['tipo']; ?>">DELETE</a>
        </div>      
    <?php endforeach;?>
    <?php
      if(!isset($_SESSION["usuario"])):?>
          <a>YOU NEED TO LOGIN TO FINISH THE BUY</a>
        <?php else:?>
          <a href="../modelo/finalizarCompra.php">BUY</a>
    <?php endif ?> 
  </div>
</body>
</html>