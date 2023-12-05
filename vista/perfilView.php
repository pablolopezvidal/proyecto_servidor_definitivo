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
  <div id="info_perfil">
    <?php foreach ($results as $usuario):?>
          <h3>USERNAME: <?= $usuario->nombre;?></h3>
          <p>ADRESS: <?= $usuario->direccion;?></p>
          <a href="..\vista\editarForm.php">EDIT MY USER NAME ||</a>
          <a href="..\vista\editarForm2.php"> EDIT MY ADRESS</a>
    <?php endforeach;?>
  </div>
  <div id="contenido_carros">
  <?php foreach ($results2 as $carrito): ?>
        <div class="carrito">
            <h3>Carrito ID: <?= $carrito['carritoID']; ?></h3>
            <p>Usuario: <?= $carrito['usuario']; ?></p>
            <p>Fecha: <?= $carrito['fecha']; ?></p>

            <?php if (!empty($carrito['productos'])): ?>
                <ul>
                    <?php foreach ($carrito['productos'] as $producto): ?>
                        <li>
                            Producto ID: <?= $producto['ID_Producto']; ?>,
                            Servicio ID: <?= $producto['ID_Servicio']; ?>,
                            Cantidad: <?= $producto['Cantidad']; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No hay productos en este carrito.</p>
            <?php endif; ?>

        </div>
    <?php endforeach; ?>
  </div>
</body>
</html>