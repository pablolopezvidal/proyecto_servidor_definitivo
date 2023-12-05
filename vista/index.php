
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
        <a href="../controlador/controladorpagina.php">PRODUCTS</a>                      
        <a href="../controlador/controladorServicios.php">SERVICES</a>
        <a href="#servicios_cats">ABOUT AS</a>
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
    <div class="carousel" id="carousel">
        <div class="slide">
            <img src="" alt="Imagen 1">
        </div>
        <div class="slide">
            <img src="" alt="Imagen 2">
        </div>
        <div class="slide">
            <img src="" alt="Imagen 3">
        </div>
        <!-- Agrega más slides según sea necesario -->
        <div class="progress-bar">
            <div class="progress-bar-inner"></div>
        </div>
    </div>
    <h1>PRODUCTS</h1>
    <div id="productos_cats2">
        <div class="pro_cats_1">
            <div class="producto_categoria_cajon2" id="componentes">
                <img src="../styles\imgs\Untitled-removebg-preview.png">
            </div>
            <a href="../controlador/controladorComponentes.php">COMPONENTS</a>
        </div>
        <div class="pro_cats_1">
            <div class="producto_categoria_cajon2" id="perifericos">
                <img src="../styles\imgs\mx-keys-s-keyboard-top-view-graphite-esp.png">
            </div>
            <a href="../controlador/controladorperifericos.php">PERIPHERAL</a>
        </div>
        <div class="pro_cats_1">
            <div class="producto_categoria_cajon2" id="keycaps">
                <img src="../styles\imgs\6528052_sd-removebg-preview.png">
            </div>
            <a href="../controlador/controladorKeycaps.php">KEYCAPS</a>
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
    <h1>ABOUT AS</h1>
    <div id="aboutas">
        <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. In cursus turpis massa tincidunt dui ut. Nulla facilisi nullam vehicula ipsum a arcu cursus vitae congue. Erat nam at lectus urna duis convallis convallis. Eget nunc lobortis mattis aliquam faucibus. Ac orci phasellus egestas tellus rutrum. Malesuada fames ac turpis egestas sed tempus urna et pharetra. A cras semper auctor neque. Felis eget nunc lobortis mattis aliquam. Elit sed vulputate mi sit amet mauris commodo quis imperdiet. Sit amet aliquam id diam maecenas ultricies mi eget mauris. Hendrerit gravida rutrum quisque non tellus orci ac auctor. Viverra adipiscing at in tellus integer. Ridiculus mus mauris vitae ultricies leo integer. Fermentum iaculis eu non diam phasellus vestibulum lorem. Cursus vitae congue mauris rhoncus aenean vel elit scelerisque. Libero justo laoreet sit amet cursus sit. Quam nulla porttitor massa id neque aliquam. Non consectetur a erat nam at lectus urna. Tincidunt id aliquet risus feugiat in ante metus dictum at.
        </p>
        <?php foreach ($results2 as $trabajadores):?>
            <div class="caja_trabajador">
                <h3>nombre: <?=$trabajadores["nombre"]?></h3>
                <h3>apellido: <?= $trabajadores["apellido"]?></h3>
                <h3>rol en la empresa: <?= $trabajadores["rol"]?></h3>
            </div>  
        <?php endforeach;?>
    </div>
    <form action="../modelo/enviar_correo.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required>

        <label for="mensaje">Mensaje:</label>
        <textarea id="mensaje" name="mensaje" rows="4" required></textarea>

        <button type="submit">Enviar</button>
    </form>
</body>



<script>
    let currentIndex = 0;
    const slides = document.querySelectorAll('.slide');
    const progressBar = document.querySelector('.progress-bar-inner');

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.style.display = (i === index) ? 'block' : 'none';
        });
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % slides.length;
        showSlide(currentIndex);
        resetProgressBar(); // Reinicia la barra de progreso al cambiar de imagen
    }

    function resetProgressBar() {
        progressBar.style.width = '100%'; // Restablece la barra de progreso al 100%
    }

    // Configuración del temporizador para cambiar automáticamente las imágenes cada 10 segundos
    setInterval(() => {
        nextSlide();
        startProgressBar(); // Inicia la barra de progreso al cambiar de imagen
    }, 10000);

    function startProgressBar() {
        let progress = 100;
        const interval = setInterval(() => {
            progress -= 1;
            progressBar.style.width = progress + '%';
            if (progress <= 0) {
                clearInterval(interval);
            }
        }, 100);
    }

    // Mostrar el primer slide al cargar la página
    showSlide(currentIndex);
</script>

</html>