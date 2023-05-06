<!DOCTYPE html>
<html>
<head>
	<title>Dar de baja a un empleado</title>
</head>
<body>
	<h1>Dar de baja a un empleado</h1>
	<?php
	// Procesamiento del formulario cuando se envía
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

		// Obtención del ID del empleado que se desea dar de baja
		$id = $_POST["id"];

		// Actualización del estado del empleado en la base de datos
		$sql = "UPDATE empleados SET estado_aprobacion='Inactivo' WHERE id='$id'";

		if (mysqli_query($conn, $sql)) {
		    echo "Empleado dado de baja correctamente";
		} else {
		    echo "Error al dar de baja al empleado: " . mysqli_error($conn);
		}

		mysqli_close($conn);
	}
	?>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		<label for="id">ID del empleado:</label>
		<input type="text" id="id" name="id"><br><br>
		<input type="submit" value="Dar de baja">
	</form>
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
