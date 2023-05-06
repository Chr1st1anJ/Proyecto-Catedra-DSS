<!DOCTYPE html>
<html>
<head>
	<title>Ingresar nuevo empleado</title>
</head>
<body>
	<h1>Ingresar nuevo empleado</h1>
	<form action="procesar_empleado.php" method="POST">
		<label for="nombre">Nombre:</label>
		<input type="text" name="nombre" required><br>

		<label for="cargo">Cargo:</label>
		<input type="text" name="cargo" required><br>

		<label for="accion_personal">Acción de personal:</label>
		<input type="text" name="accion_personal" required><br>

		<input type="submit" value="Ingresar empleado">
	</form>

    <?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banco";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificación de la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Obtención de los datos del formulario
$nombre = $_POST["nombre"];
$cargo = $_POST["cargo"];
$accion_personal = $_POST["accion_personal"];

// Inserción de los datos en la base de datos
$sql = "INSERT INTO empleados (nombre, cargo, accion_personal, estado_aprobacion)
VALUES ('$nombre', '$cargo', '$accion_personal', 'En espera')";

if (mysqli_query($conn, $sql)) {
    echo "Nuevo empleado ingresado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <input type="submit" name="submit" value="Regresar">
</form>

<?php
// Si el botón de submit es presionado
if (isset($_POST['submit'])) {
    // Redirigir a un archivo en específico
    header("Location: http://localhost/xampp1/Proyecto-Catedra-DSS/ger_sucursal.php");
    exit();
}
?>

</body>
</html>
