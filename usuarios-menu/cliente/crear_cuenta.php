<!DOCTYPE html>
<html>
<head>
  <title>Crear cuenta bancaria</title>
  <style>
    form {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin: 50px;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-family: Arial, sans-serif;
}

label {
  font-weight: bold;
  margin-right: 10px;
}

input[type="text"],
input[type="number"] {
  padding: 5px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
}

button[type="submit"] {
  background-color: #007bff;
  color: #fff;
  padding: 10px;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #0069d9;
}

input[type="submit"] {
  background-color: #007bff;
  color: #fff;
  padding: 10px;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #0069d9;
}

  </style>
</head>
<body>
  <h1>Crear cuenta bancaria</h1>
  <form action="crear_cuenta.php" method="POST">
    <label for="nombre">Nombre del titular:</label>
    <input type="text" name="nombre" required><br><br>
    <label for="saldo">Saldo inicial:</label>
    <input type="number" name="saldo" min="0" step="0.01" required><br><br>
    <label for="dui">Número de DUI:</label>
    <input type="text" name="dui" required><br><br>
    <button type="submit">Crear cuenta</button>

  </form>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <input type="submit" name="submit" value="Regresar">
</form>

<?php
// Si el botón de submit es presionado
if (isset($_POST['submit'])) {
    // Redirigir a un archivo en específico
    header("Location: http://localhost/xampp1/Proyecto-Catedra-DSS/cliente.php");
    exit();
}
?>

  <?php
// Conexión a la base de datos
$servername = "localhost";
$username = "usuario_prueba";
$password = "pruebausuario123";
$dbname = "banco";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

// Validacion que no se hayan creado más de 3 cuentas bancarias
$sql = "SELECT COUNT(*) AS num_cuentas FROM cuentas";
$resultado = $conn->query($sql);
$num_cuentas = $resultado->fetch_assoc()["num_cuentas"];
if ($num_cuentas >= 3) {
  echo "Ya se han creado 3 cuentas bancarias";
  exit();
}

// Recibir los datos del formulario
$nombre = $_POST["nombre"];
$saldo = $_POST["saldo"];
$dui = $_POST["dui"];

// Generar un identificador único para la cuenta bancaria
$cuenta = rand(1, 999999);
$sql = "SELECT cuenta FROM cuentas WHERE cuenta = $cuenta";
$resultado = $conn->query($sql);
while ($resultado->num_rows > 0) {
  $cuenta = rand(1, 999999);
  $sql = "SELECT id FROM cuentas WHERE id = $cuenta";
  $resultado = $conn->query($sql);
}

// Insertar la nueva cuenta bancaria en la base de datos
$sql = "INSERT INTO cuentas (cuenta, nombre, saldo, dui) VALUES ('$cuenta', '$nombre', '$saldo', '$dui')";
if ($conn->query($sql) === TRUE) {
  echo "Cuenta bancaria creada exitosamente";
} else {
  echo "Error al crear la cuenta bancaria: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

</body>
</html>
