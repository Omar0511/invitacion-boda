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
    // Obtener y limpiar datos
    $nombre = strtoupper(mysqli_real_escape_string($conn, $_POST['nombre']));
    $adultos = intval($_POST['adultos']); // Asegurarse de que sean números enteros
    $niños = intval($_POST['ninos']);

    // Actualizar la tabla 'invitados'
    $sql = "UPDATE invitados SET adultos = $adultos, ninos = $niños, confirmado = 1 WHERE nombre = '$nombre'";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirmación de boletos</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

  <link rel="stylesheet" href="/css/styles.css">
  <link rel="stylesheet" href="/css/normalize.css">
</head>

<body>

  <?php
        // Verificar si la consulta fue exitosa
        if ($result) {
            echo "<script>
                Swal.fire({
                    title: 'Boletos confirmados con éxito!',
                    text: 'Te esperamos!!!.',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redireccionar a la página principal después de cerrar la alerta
                        window.location.href = '/';
                    }
                });
            </script>";
        } else {
            echo "<script>
                Swal.fire({
                    title: 'Error en la actualización',
                    text: 'No se pudo actualizar los boletos: " . mysqli_error($conn) . "',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
            </script>";
        }

    }
    ?>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>

<?php
// Cerrar la conexión
mysqli_close($conn);
?>