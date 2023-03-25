<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/views_style.css">
  <title>Bienvenido Cliente</title>
</head>
<body>
  <h1 class="titulo">Bienvenido <?php echo $user['usuario']; ?></h1>
  <a href="<?php echo RUTA.'close.php' ?>">Cerrar Sesion</a>
  <section>
  <h2>Menú de opciones:</h2>
	<ul>
		<li><a href="usuarios-menu/cliente/registro-cuenta/crear_cuenta.php">Crear una nueva cuenta bancaria</a></li>
		<li><a href="usuarios-menu/cliente/registro-cuenta/ver_cuentas.php">Ver la lista de cuentas bancarias existentes</a></li>
		<li><a href="usuarios-menu/cliente/registro-cuenta/ver_movimientos.php">Ver la lista de movimientos realizados en sus cuentas bancarias</a></li>
	</ul>
  </section>
</body>
</html>