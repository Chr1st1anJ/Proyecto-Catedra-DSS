<?php
$host = 'localhost';
$dbname = 'banco';
$user = 'usuario_prueba';
$pass = 'pruebausuario123';

$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimientos</title>
</head>
<body>
    <?php 
    $sql = "SELECT nombre, saldo FROM cuentas";
    $stmt = $db->query($sql);
    $cuentas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
<table>
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Saldo</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($cuentas as $cuenta): ?>
      <tr>
        <td><?php echo $cuenta['nombre']; ?></td>
        <td><?php echo $cuenta['saldo']; ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
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