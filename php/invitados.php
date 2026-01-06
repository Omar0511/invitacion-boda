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

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener el nombre y convertirlo a mayúsculas
    $nombre = strtoupper(mysqli_real_escape_string($conn, $_POST['nombre'])); // Escapar caracteres especiales y convertir a mayúsculas

    // Realizar una consulta SELECT usando el nombre
    $sql = "SELECT * FROM invitados WHERE nombre = '$nombre'"; // Cambia 'invitados' y 'nombre' por los nombres correctos
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirma tu asistencia</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

  <link rel="stylesheet" href="/css/styles.css">
  <link rel="stylesheet" href="/css/normalize.css">
</head>

<body>
  <?php
        // Verificar si se obtuvieron resultados
        if (mysqli_num_rows($result) > 0) {
            // Mostrar los datos de cada fila
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['confirmado'] == 1) { // Verificar si ya está confirmado
  ?>

  <script>
  Swal.fire({
    title: '¡Ya has confirmado!',
    html: `<h1><?php echo $row['nombre']; ?></h1>
      <h2>Mesa: por asignar...</h2>
      <h2>Boletos </h2>
      <h2>Adultos: <?php echo $row['adultos']; ?></h2>
      <?php if ($row['ninos'] > 0) { ?>
      <h2>Niños: <?php echo $row['ninos']; ?></h2>
      <?php } ?>`,
    icon: 'info',
    confirmButtonText: 'Aceptar'
  }).then((result) => {
    if (result.isConfirmed) {
      // Redireccionar a la página principal después de cerrar la alerta
      window.location.href = '/';
    }
  });
  </script>

  <?php
                } else {
                    ?>
  <div class="contenedor sombra contenedor-confirmacion">
    <h1>Confirmación de Boletos</h1>

    <h2><?php echo $row['nombre']; ?></h2>

    <h3>Mesa: <span>por asignar...</span></h3>

    <h3>Nota: <span>De los boletos asignados, confirma cuántos asistirán...</span>
    </h3>

    <form action="invitadosUpdate.php" class="formulario-confirmacion" method="POST">
      <fieldset>
        <h3>Boletos</h3>

        <input type="hidden" name="nombre" id="nombre" value="<?php echo $nombre; ?>">

        <div class="campo">
          <label for="adultos">Adultos</label>
          <input type="number" name="adultos" value="<?php echo $row['adultos']; ?>" min="1"
            max="<?php echo $row['adultos']; ?>">
        </div>

        <?php if ($row['ninos'] > 0) { ?>

        <div class="campo">
          <label for="ninos">Niños</label>
          <input type="number" name="ninos" value="<?php echo $row['ninos']; ?>" min="0"
            max="<?php echo $row['ninos']; ?>">
        </div>
        <?php } ?>

        <input type="submit" name="confirmar" id="confirmar" value="Confirmar Boletos">
      </fieldset>
    </form>
  </div>
  <?php
                }
            }
        } else {
            ?>
  <script>
  Swal.fire({
    title: 'Invitado no encontrado',
    text: 'No se encontró a <?php echo $nombre; ?> en la lista de invitados.',
    icon: 'error',
    confirmButtonText: 'Aceptar'
  }).then((result) => {
    if (result.isConfirmed) {
      // Redireccionar a la página principal después de cerrar la alerta
      window.location.href = '/';
    }
  });
  </script>
  <?php
        }
    ?>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>

<?php
    }
    // Cerrar la conexión
    mysqli_close($conn);
?>