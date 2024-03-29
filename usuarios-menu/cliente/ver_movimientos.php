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

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="css/VerDiseños.css" type="text/css" rel="stylesheet">';
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movimientos</title>
  <style>
table {
  border-collapse: collapse;
  width: 100%;
  max-width: 800px;
  margin: 0 auto;
}

th, td {
  text-align: left;
  padding: 8px;
}

th {
  background-color: #f2f2f2;
  font-weight: bold;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

#tablaTransacciones {
  display: none;
}

button {
  padding: 10px;
  border: none;
  border-radius: 5px;
  background-color: #007bff;
  color: white;
  font-size: 16px;
  cursor: pointer;
}

button:hover {
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
<button onclick="mostrarTransacciones()">Ver transacciones</button>
  <br><br>
  <table id="tablaTransacciones" style="display:none">
    <tr>
      <th>Fecha</th>
      <th>Hora</th>
      <th>Monto</th>
      <th>Tipo</th>
    </tr>
    <?php

  // Obtener las transacciones realizadas en las últimas 24 horas
  if (isset($_POST['dui'])) {
    $dui = $_POST['dui'];
  }
  
  if (isset($_POST['cuenta'])) {
    $cuenta = $_POST['cuenta'];
  }
  $fechaDesde = date("Y-m-d H:i:s", strtotime("-1 day"));
  $query = "SELECT * FROM transacciones WHERE dui = '$dui' AND cuenta = '$cuenta' AND monto = '$monto' AND fecha >= '$fechaDesde' ORDER BY fecha DESC";
  $resultado = mysqli_query($conexion, $query);
  while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    echo "<td>" . $fila["fecha"] . "</td>";
    echo "<td>" . $fila["hora"] . "</td>";
    echo "<td>" . $fila["monto"] . "</td>";
    echo "<td>" . $fila["tipo"] . "</td>";
    echo "</tr>";
  }
?>
  </table>
  <script>
    function mostrarTransacciones() {
      document.getElementById("tablaTransacciones").style.display = "table";
    }
  </script>
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