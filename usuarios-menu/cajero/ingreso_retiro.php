<?php
// Conexión a la base de datos
$host = "localhost";
$usuario = "root";
$contrasena = "";
$baseDeDatos = "banco";

$conexion = mysqli_connect($host, $usuario, $contrasena, $baseDeDatos);
if (!$conexion) {
  die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// Procesamiento del formulario de transacciones
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $dui = $_POST["dui"];
  $cuenta = $_POST["cuenta"];
  $tipo = $_POST["tipo"];
  $monto = $_POST["monto"];

  // Verificar si el DUI y la cuenta están relacionados
  $query = "SELECT * FROM cuentas WHERE dui = '$dui' AND cuenta = '$cuenta'";
  $resultado = mysqli_query($conexion, $query);
  if (mysqli_num_rows($resultado) == 1) {
    // El DUI y la cuenta están relacionados, hacer la transacción
    $fecha = date("Y-m-d");
    $hora = date("H:i:s");
    $query = "INSERT INTO transacciones (dui, cuenta, fecha, hora, monto, tipo) VALUES ('$dui', '$cuenta', '$fecha', '$hora', '$monto', '$tipo')";
    if (mysqli_query($conexion, $query)) {
      // Transacción exitosa, mostrar mensaje de éxito
      $mensaje = "Transacción realizada con éxito.";
    } else {
      // Error al insertar en la base de datos, mostrar mensaje de error
      $mensaje = "Error al realizar la transacción: " . mysqli_error($conexion);
    }
  } else {
    // El DUI y la cuenta no están relacionados, mostrar mensaje de error
    $mensaje = "Error al realizar la transacción: el DUI y la cuenta no están relacionados.";
  }
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Transacciones</title>
</head>
<body>
  <h1>Transacciones</h1>
  <?php
  if (isset($mensaje)) {
    echo "<p>$mensaje</p>";
  }
  ?>
  <form method="POST">
    <label for="dui">DUI:</label>
    <input type="text" id="dui" name="dui" required><br>
    <label for="cuenta">Cuenta bancaria:</label>
    <input type="text" id="cuenta" name="cuenta" required><br>
    <label for="tipo">Tipo de transacción:</label>
    <select id="tipo" name="tipo">
      <option value="ingreso">Ingreso</option>
      <option value="retiro">Retiro</option>
    </select><br>
    <label for="monto">Monto:</label>
    <input type="number" id="monto" name="monto" required><br>
    <button type="submit">Realizar transacción</button>
  </form>
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