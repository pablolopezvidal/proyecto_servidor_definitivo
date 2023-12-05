<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/estilos.css">
  <title>Título de la página</title>
</head>
<body>
    <h1>REGISTER</h1>
    <form action="../controlador/registroController.php" method="POST">

      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required />

      <label for="email">Email:</label>
      <input type="text" id="email" name="email" required />

      <label for="password">Password:</label>
      <input type="text" id="password" name="password" required />

      <label for="description">Description:</label>
      <input type="text" id="description" name="description" required />

      <input type="submit" value="Send" name="submit"/>
    </form>
</body>
</html>