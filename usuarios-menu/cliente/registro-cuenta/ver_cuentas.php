<!DOCTYPE html>
<html>
<head>
  <title>Cuentas bancarias</title>
</head>
<body>
  <h1>Cuentas bancarias</h1>
  <table>
    <tr>
      <th>ID</th>
      <th>Nombre del titular</th>
      <th>Saldo</th>
    </tr>
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

    // Obtener las cuentas bancarias de la base de datos
    $sql = "SELECT id, nombre, saldo FROM cuentas";
    $resultado = $conn->query($sql);

    // Mostrar las cuentas bancarias en una tabla
    if ($resultado->num_rows > 0) {
      while($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila["id"] . "</td>";
        echo "<td>" . $fila["nombre"] . "</td>";
        echo "<td>" . $fila["saldo"] . "</td>";
        echo "</tr>";
      }
    } else {
      echo "No se han encontrado cuentas bancarias";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
  </table>
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
</body>
</html>

