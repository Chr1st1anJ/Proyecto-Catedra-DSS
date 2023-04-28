<!DOCTYPE html>
<html>
<head>
	<title>Formulario de Registro de Clientes o Prestamistas</title>
</head>
<body>
	<h1>Registro de Clientes o Prestamistas</h1>
	<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
		<label for="tipo">Tipo de Registro:</label>
		<select name="tipo" id="tipo">
			<option value="cliente">Cliente</option>
			<option value="prestamista">Prestamista</option>
		</select>
		<br>
		<label for="nombre">Nombre:</label>
		<input type="text" name="nombre" id="nombre" required>
		<br>
		<label for="direccion">Dirección:</label>
		<input type="text" name="direccion" id="direccion" required>
		<br>
		<label for="telefono">Teléfono:</label>
		<input type="tel" name="telefono" id="telefono" required>
		<br>
		<label for="email">Correo Electrónico:</label>
		<input type="email" name="email" id="email" required>
		<br>
		<input type="submit" value="Enviar">
	</form>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <input type="submit" name="submit" value="Regresar">
</form>

<?php
// Si el botón de submit es presionado
if (isset($_POST['submit'])) {
    // Redirigir a un archivo en específico
    header("Location: http://localhost/xampp1/Proyecto-Catedra-DSS/cajero.php");
    exit();
}
?>

	<?php
	// Procesar los datos del formulario cuando se envíe
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Conectar a la base de datos
		$servername = "localhost";
		$username = "usuario_prueba";
		$password = "pruebausuario123";
		$dbname = "banco";

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
		    die("Error al conectar a la base de datos: " . mysqli_connect_error());
		}

		// Obtener los datos del formulario
		$tipo = $_POST["tipo"];
		$nombre = $_POST["nombre"];
		$direccion = $_POST["direccion"];
		$telefono = $_POST["telefono"];
		$email = $_POST["email"];

		// Validar los datos ingresados
		if (empty($tipo) || empty($nombre) || empty($direccion) || empty($telefono) || empty($email)) {
		    die("Error: Todos los campos son obligatorios.");
		}

		// Insertar los datos en la tabla registro de la base de datos
		$sql = "INSERT INTO registro (tipo, nombre, direccion, telefono, email) VALUES ('$tipo', '$nombre', '$direccion', '$telefono', '$email')";

		if (mysqli_query($conn, $sql)) {
		    echo "Registro exitoso.";
		} else {
		    echo "Error al registrar los datos: " . mysqli_error($conn);
		}

		mysqli_close($conn);
	}
	?>
</body>
</html>

