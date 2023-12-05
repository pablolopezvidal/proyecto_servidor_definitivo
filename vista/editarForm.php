<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/estilos.css">
  <title>Título de la página</title>
</head>
<body>
<form action="..\controlador\controladorEditarUsuario.php" method="post">
  <label for="nombre">Nuevo nombre de usuario: </label>
  <input type="text" id="nombre" name="nombre" required>
  <input type="submit" value="Enviar">
</form>
</body>
</html>