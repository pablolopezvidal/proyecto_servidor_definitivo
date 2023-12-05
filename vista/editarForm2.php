<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/estilos.css">
  <title>Título de la página</title>
</head>
<body>
<form action="..\controlador\controladorEditarDireccion.php" method="post">
  <label for="nombre">Nuevo direccion: </label>
  <input type="text" id="direccion" name="direccion" required>
  <input type="submit" value="Enviar">
</form>
</body>
</html>