<?php
header('Content-Type: application/json');

// =======================
// CONFIGURACIÓN BD
// =======================
$host = 'localhost';
$db   = 'invitacion';
$user = 'root';
$pass = 'root';

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

$nombre = null;
$result = null;

if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['nombre'])) {
    $nombre = strtoupper(mysqli_real_escape_string($conn, $_POST['nombre']));
    $sql = "SELECT * FROM invitados WHERE nombre = '$nombre'";
    $result = mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirma tu asistencia</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

  <link rel="stylesheet" href="/css/normalize.css">
  <link rel="stylesheet" href="/css/styles.css">
</head>

<body>

  <?php if ($result): ?>

  <?php if (mysqli_num_rows($result) > 0): ?>
  <?php while ($row = mysqli_fetch_assoc($result)): ?>

  <?php if ((int)$row['confirmado'] === 1): ?>

  <script>
  Swal.fire({
    title: '¡Ya has confirmado!',
    html: `
              <h2><?= htmlspecialchars($row['nombre']) ?></h2>
              <p>Mesa: por asignar...</p>
              <p><strong>Adultos:</strong> <?= $row['adultos'] ?></p>
              <?= ($row['niños'] > 0) ? "<p><strong>Niños:</strong> {$row['niños']}</p>" : "" ?>
            `,
    icon: 'info',
    confirmButtonText: 'Aceptar'
  }).then(() => {
    window.location.href = '/';
  });
  </script>

  <?php else: ?>

  <div class="contenedor sombra contenedor-confirmacion">
    <h1>¡Gracias por confirmar!</h1>

    <h2><?= htmlspecialchars($row['nombre']) ?></h2>

    <h3>Mesa: <span>por asignar...</span></h3>
    <h3>Nota: <span>Confirma cuántos boletos utilizarás</span></h3>

    <form action="invitadosUpdate.php" method="POST" class="formulario-confirmacion">
      <fieldset>
        <h3>Boletos</h3>

        <input type="hidden" name="nombre" value="<?= htmlspecialchars($nombre) ?>">

        <div class="campo">
          <label>Adultos</label>
          <input type="number" name="adultos" min="1" max="<?= $row['adultos'] ?>" value="<?= $row['adultos'] ?>">
        </div>

        <?php if ($row['niños'] > 0): ?>
        <div class="campo">
          <label>Niños</label>
          <input type="number" name="niños" min="0" max="<?= $row['niños'] ?>" value="<?= $row['niños'] ?>">
        </div>
        <?php endif; ?>

        <input type="submit" value="Confirmar Boletos">
      </fieldset>
    </form>
  </div>

  <?php endif; ?>

  <?php endwhile; ?>

  <?php else: ?>

  <script>
  Swal.fire({
    title: 'Invitado no encontrado',
    text: 'No se encontró a <?= htmlspecialchars($nombre) ?> en la lista.',
    icon: 'error',
    confirmButtonText: 'Aceptar'
  }).then(() => {
    window.location.href = '/';
  });
  </script>

  <?php endif; ?>

  <?php endif; ?>

</body>

</html>

<?php
mysqli_close($conn);