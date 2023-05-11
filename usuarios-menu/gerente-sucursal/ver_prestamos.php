<!DOCTYPE html>
<html>
<head>
	<title>Ver préstamos</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		th {
			background-color: #007bff;
			color: white;
		}
		form {
			display: inline-block;
			margin: 0;
			padding: 0;
		}
		input[type=submit] {
			background-color: #0069d9;
			color: white;
			border: none;
			padding: 8px 16px;
			text-decoration: none;
			margin: 4px 2px;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<h1>Préstamos pendientes de aprobación</h1>
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

	// Obtención de los préstamos pendientes de aprobación
	$sql = "SELECT * FROM prestamos_banco WHERE estado='En espera'";
	$result = mysqli_query($conn, $sql);

	// Impresión de los préstamos en una tabla
	if (mysqli_num_rows($result) > 0) {
	    echo "<table><tr><th>ID</th><th>Nombre</th><th>Monto</th><th>Estado de aprobación</th><th>Acción</th></tr>";
	    while($row = mysqli_fetch_assoc($result)) {
	        echo "<tr><td>".$row["id"]."</td><td>".$row["nombre_cliente"]."</td><td>".$row["monto"]."</td><td>".$row["estado"]."</td>";
	        echo "<td>";
	        echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='POST'>";
	        echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
	        echo "<input type='submit' name='aprobar' value='Aprobar'>";
	        echo "<input type='submit' name='desaprobar' value='Desaprobar'>";
	        echo "</form>";
	        echo "</td></tr>";
	    }
	    echo "</table>";
	} else {
	    echo "No hay préstamos pendientes de aprobación";
	}

	// Procesamiento del formulario cuando se aprueba o desaprueba un préstamo
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$id = $_POST["id"];
		if (isset($_POST["aprobar"])) {
			$sql = "UPDATE prestamos_banco SET estado='Aprobado' WHERE id='$id'";
			if (mysqli_query($conn, $sql)) {
			    echo "Préstamo aprobado correctamente";
			} else {
			    echo "Error al aprobar el préstamo: " . mysqli_error($conn);
			}
		} elseif (isset($_POST["desaprobar"])) {
			$sql = "UPDATE prestamos_banco SET estado='Desaprobado' WHERE id='$id'";
			if (mysqli_query($conn, $sql)) {
			    echo "Préstamo desaprobado correctamente";
			} else {
			    echo "Error al desaprobar el préstamo: " . mysqli_error($conn);
			}
		}
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