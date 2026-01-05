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
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirmación de deseos</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="/css/styles.css">
  <link rel="stylesheet" href="/css/normalize.css">
</head>

<body>

  <?php
// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener y limpiar datos
    $nombreDeseo = strtoupper(mysqli_real_escape_string($conn, $_POST['nombre-deseo']));
    $mensaje = strtoupper(mysqli_real_escape_string($conn, $_POST['mensaje']));
    
    // Validar que los campos no estén vacíos
    if (empty($nombreDeseo) || empty($mensaje)) {
        echo "<script>
            Swal.fire({
                title: 'Error',
                text: 'Los campos Nombre y Mensaje son obligatorios!',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            }).then(() => {
                window.history.back();
            });
        </script>";
    } else {
        // Insertar en la tabla 'deseos'
        $sql = "INSERT INTO deseos (nombre, mensaje) VALUES('$nombreDeseo', '$mensaje')";
        $result = mysqli_query($conn, $sql);

        // Verificar si la consulta fue exitosa
        if ($result) {
            echo "<script>
                Swal.fire({
                    title: 'Gracias por tus buenos deseos!',
                    html: '<h3>Esperamos tu compañía...</h3>',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                }).then(() => {
                    window.location.href = '/'; // Cambia la ruta si es necesario
                });
            </script>";
        } else {
            echo "<script>
                Swal.fire({
                    title: 'Error',
                    text: 'No se pudo guardar tu mensaje: " . mysqli_error($conn) . "',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
            </script>";
        }
    }
}
?>

</body>

</html>

<?php
// Cerrar la conexión
mysqli_close($conn);
?>