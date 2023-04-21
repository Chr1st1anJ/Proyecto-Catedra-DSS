<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Bienvenido Cajero</title>
</head>
<body>
  <h1>Bienvenido <?php echo $user['usuario']; ?></h1>
  <a href="<?php echo RUTA.'close.php' ?>">Cerrar Sesion</a>
  <table>
		<tr>
			<th>Ingresar nuevos clientes o prestamistas</th>
			<td><a href="usuarios-menu/cajero/nuevo_cliente.php">Agregar</a></td>
		</tr>
		<tr>
			<th>Agregar dependientes del banco</th>
			<td><a href="usuarios-menu/cajero/nuevo_dependiente.php">Agregar</a></td>
		</tr>
		<tr>
			<th>Ingresar o retirar dinero a una cuenta</th>
			<td><a href="usuarios-menu/cajero/ingreso_retiro.php">Ingresar/Retirar</a></td>
		</tr>
		<tr>
			<th>Apertura de préstamo</th>
			<td><a href="usuarios-menu/cajero/nuevo_prestamo.php">Abrir</a></td>
		</tr>
	</table>
</body>
</html>