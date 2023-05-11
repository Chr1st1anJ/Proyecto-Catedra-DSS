<!DOCTYPE html>
<html>
<head>
	<title>Agregar dependientes del banco</title>
	<style>
		form {
  display: flex;
  flex-direction: column;
  align-items: center;
}

label {
  font-weight: bold;
  margin-bottom: 10px;
}

input[type="text"],
input[type="date"] {
  padding: 10px;
  margin-bottom: 20px;
  border-radius: 5px;
  border: 1px solid gray;
  font-size: 16px;
  width: 100%;
  box-sizing: border-box;
}

input[type="submit"] {
  padding: 10px 20px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
  transition: all 0.3s ease;
}

input[type="submit"]:hover {
  background-color: #0056b3;
}

	</style>
</head>
<body>
	<h1>Agregar dependientes del banco</h1>
	<?php
	// Verificar si se enviaron los datos del formulario
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

	    // Obtener los datos del formulario
	    $nombre = $_POST["nombre"];
	    $fecha_nacimiento = $_POST["fecha_nacimiento"];
	    $num_identificacion = $_POST["num_identificacion"];

	    // Validar que se hayan proporcionado todos los campos necesarios
	    if ($nombre && $fecha_nacimiento && $num_identificacion) {

	        // Conectar a la base de datos del banco
	        $servername = "localhost";
	        $username = "root";
	        $password = "";
	        $dbname = "banco";

	        $conn = new mysqli($servername, $username, $password, $dbname);

	        // Verificar si la conexión es exitosa
	        if ($conn->connect_error) {
	            die("Error de conexión: " . $conn->connect_error);
	        }

	        // Insertar los datos del dependiente en la base de datos
	        $sql = "INSERT INTO dependientes_banco (nombre, fecha_nacimiento, num_identificacion)
	        VALUES ('$nombre', '$fecha_nacimiento', '$num_identificacion')";

	        if ($conn->query($sql) === TRUE) {
	            // Mostrar un mensaje de confirmación
	            echo "El dependiente ha sido agregado exitosamente.";
	        } else {
	            echo "Error: " . $sql . "<br>" . $conn->error;
	        }

	        $conn->close();
	    } else {
	        // Mostrar un mensaje de error si no se proporcionaron todos los campos necesarios
	        echo "Por favor, complete todos los campos requeridos.";
	    }
	}
	?>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<label>Nombre:</label>
		<input type="text" name="nombre" required><br>

		<label>Fecha de nacimiento:</label>
		<input type="date" name="fecha_nacimiento" required><br>

		<label>Número de identificación:</label>
		<input type="text" name="num_identificacion" required><br>

		<input type="submit" value="Agregar dependiente">
	</form>
	<br>
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
</body>
</html>
