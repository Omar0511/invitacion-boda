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
$sql = "SELECT * FROM invitados WHERE confirmado = 1"; // Cambia 'invitados' y 'nombre' por los nombres correctos
$result = mysqli_query($conn, $sql);

$sqlContar = "SELECT SUM(adultos) as adultos, SUM(ninos) as niños FROM invitados";
$resultContar = mysqli_query($conn, $sqlContar);

$sqlContarConfirmados = "SELECT SUM(adultos) as adultosConfirmados, SUM(ninos) as niñosConfirmados FROM invitados WHERE confirmado = 1";
$resultContarConfirmados = mysqli_query($conn, $sqlContarConfirmados);

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
        <th>Adultos</th>
        <th>Niños</th>
      </thead>

      <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['confirmado'] == 1) {
                ?>
        <tr>
          <td> <?php echo $row['nombre']; ?> </td>
          <td> <?php echo $row['adultos']; ?> </td>
          <td> <?php echo $row['ninos']; ?> </td>
        </tr>
        <?php
                    }
                }
                ?>
      </tbody>
    </table>

    <table class="tabla">
      <thead>
        <th>Adultos</th>
        <th>Niños</th>
        <th>Boletos Asignados</th>
        <th>Total Boletos</th>
        <th>Disponibles</th>
      </thead>

      <tbody>
        <?php while ($row = mysqli_fetch_assoc($resultContar)) {
                ?>
        <tr>
          <td> <?php echo $row['adultos']; ?> </td>
          <td> <?php echo $row['niños']; ?> </td>
          <td> <?php echo $row['adultos'] + $row['niños'] / 2 ; ?> </td>
          <td>200</td>
          <td> <?php echo ( 200 - ($row['adultos'] + $row['niños'] / 2) ); ?> </td>
        </tr>
        <?php
                    
                }
                ?>
      </tbody>
    </table>

    <table class="tabla">
      <thead>
        <th>Adultos Confirmados</th>
        <th>Niños</th>
        <th>Suma de Boletos</th>
        <th>Total Boletos</th>
        <th>Disponibles Sin Confirmar </th>
      </thead>

      <tbody>
        <?php while ($row = mysqli_fetch_assoc($resultContarConfirmados)) {
                ?>
        <tr>
          <td> <?php echo $row['adultosConfirmados']; ?> </td>
          <td> <?php echo $row['niñosConfirmados']; ?> </td>
          <td> <?php echo $row['adultosConfirmados'] + $row['niñosConfirmados'] / 2 ; ?> </td>
          <td>200</td>
          <td> <?php echo ( 200 - ($row['adultosConfirmados'] + $row['niñosConfirmados'] / 2) ); ?> </td>
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