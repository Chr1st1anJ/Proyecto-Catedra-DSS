<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cuentas bancarias</title>
  <style>
    table {
  border-collapse: collapse;
  width: 100%;
  margin-bottom: 20px;
}

th, td {
  text-align: left;
  padding: 8px;
}

th {
  background-color: #f2f2f2;
  color: #444;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

tr:hover {
  background-color: #ddd;
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
  <h1>Listado de cuentas</h1>
  <table>
    <tr>
      <th>Cuenta</th>
      <th>Nombre del titular</th>
      <th>Saldo</th>
    </tr>
    <?php
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "banco";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener las cuentas bancarias de la base de datos
    $sql = "SELECT cuenta, nombre, saldo FROM cuentas";
    $resultado = $conn->query($sql);

    // Mostrar las cuentas bancarias en una tabla
    if (is_object($resultado) && $resultado->num_rows > 0) {
      while($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila["cuenta"] . "</td>";
        echo "<td>" . $fila["nombre"] . "</td>";
        echo "<td>" . $fila["saldo"] . "</td>";
        echo "</tr>";
      }
    } else {
      if (is_object($resultado)) {
        echo "No se han encontrado cuentas bancarias";
      } else {
        echo "Error al realizar la consulta a la base de datos";
      }
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
