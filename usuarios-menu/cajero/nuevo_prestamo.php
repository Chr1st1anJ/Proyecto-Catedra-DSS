<!DOCTYPE html>
<html>
<head>
	<title>Apertura de préstamo</title>
</head>
<body>
	<h1>Apertura de préstamo</h1>

	<?php
	// Verificar si se enviaron los datos del formulario
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		// Obtener los datos del formulario
	    $nombre = $_POST["nombre"];
	    $salario = $_POST["salario"];
	    $monto = $_POST["monto"];
	    $plazo = $_POST["plazo"];

	    // Validar que se hayan proporcionado todos los campos necesarios
	    if ($nombre && $salario && $monto && $plazo) {

	        // Verificar si el cliente cumple con los requisitos para el préstamo
	        if ($salario < 365) {
	            // El préstamo máximo que se puede hacer es de $10,000 con un interés del 3%
	            $max_monto = 10000;
	            $interes = 0.03;
	        } elseif ($salario < 600) {
	            // El préstamo máximo que se puede hacer es de $25,000 con un interés del 3%
	            $max_monto = 25000;
	            $interes = 0.03;
	        } elseif ($salario < 900) {
	            // El préstamo máximo que se puede hacer es de $35,000 con un interés del 4%
	            $max_monto = 35000;
	            $interes = 0.04;
	        } else {
	            // El préstamo máximo que se puede hacer es de $50,000 con un interés del 5%
	            $max_monto = 50000;
	            $interes = 0.05;
	        }

	        // Verificar si el monto solicitado es menor o igual al máximo permitido
	        if ($monto <= $max_monto) {

	            // Calcular la cuota mensual a pagar
	            $cuota = ($monto * $interes) / (1 - pow(1 + $interes, -$plazo));
	            
	            // Verificar si la cuota mensual a pagar es menor o igual al 30% del salario del cliente
	            if ($cuota <= ($salario * 0.3)) {

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

		            // Insertar los datos del préstamo en la base de datos
		            $sql = "INSERT INTO prestamos_banco (nombre_cliente, monto, plazo, estado)
		            VALUES ('$nombre', '$monto', '$plazo', 'en espera')";

		            if ($conn->query($sql) === TRUE) {
		                // Mostrar un mensaje de confirmación
		                echo "El préstamo ha sido solicitado exitosamente.";
		            } else {
		                echo "Error: " . $sql . "<br>" . $conn->error;
		            }

		            $conn->close();

                } else {
                    // La cuota mensual a pagar supera el 30% del salario del cliente
                    echo "Lo sentimos, la cuota mensual a pagar no puede superar el 30% del salario del cliente.";
                }
    
            } else {
                // El monto solicitado es mayor al máximo permitido
                echo "Lo sentimos, el monto máximo que se puede solicitar es de $" . $max_monto . ".";
            }
    
        } else {
            // Faltan campos por completar
            echo "Por favor complete todos los campos del formulario.";
        }
    
    }
    ?>
    
    <!-- Formulario para solicitar el préstamo -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Nombre:<br>
        <input type="text" name="nombre"><br>
        Salario:<br>
        <input type="number" name="salario"><br>
        Monto del préstamo:<br>
        <input type="number" name="monto"><br>
        Plazo en años:<br>
        <input type="number" name="plazo"><br>
        <input type="submit" value="Solicitar préstamo">
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
</body>
</html>    
