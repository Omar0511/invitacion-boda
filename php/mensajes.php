<?php
// Configuración de la base de datos
$host = 'localhost'; // Cambia esto según tu configuración en Hostinger
$db = 'invitacion';
$user = 'root';
$pass = 'root'; // Asegúrate de que esta sea la contraseña correcta

// Conectar a la base de datos
$conn = mysqli_connect($host, $user, $pass, $db);

// Verificar la conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Realizar una consulta SELECT usando el nombre
$sql = "SELECT * FROM deseos"; // Cambia 'invitados' y 'nombre' por los nombres correctos
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirmados</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link rel="stylesheet" href="/css/styles.css">
  <link rel="stylesheet" href="/css/normalize.css">
</head>

<body>
  <main class="contenedor sombra contenedor-tabla">
    <table class="tabla">
      <thead>
        <th>Nombre</th>
        <th>Mensaje</th>
      </thead>

      <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) {
                ?>
        <tr>
          <td> <?php echo $row['nombre']; ?> </td>
          <td> <?php echo $row['mensaje']; ?> </td>
        </tr>
        <?php
                }
                ?>
      </tbody>
    </table>
  </main>
</body>

</html>
<?php
}
    // Cerrar la conexión
    mysqli_close($conn);
?>