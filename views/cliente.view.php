<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="views/css-views/views_style.css">
  <title>Bienvenido Cliente</title>
</head>
<body>
  <header>
    <nav>
      <h1 class="titulo">Bienvenido <?php echo $user['usuario']; ?></h1>
	<ul>
		<li><a href="usuarios-menu/cliente/crear_cuenta.php">Crear una nueva cuenta bancaria</a></li>
		<li><a href="usuarios-menu/cliente/ver_cuentas.php">Ver la lista de cuentas bancarias existentes</a></li>
		<li><a href="usuarios-menu/cliente/ver_movimientos.php">Ver la lista de movimientos realizados en sus cuentas bancarias</a></li>
	</ul>
  <a href="<?php echo RUTA.'close.php' ?>">Cerrar Sesion</a>
</nav>
</header>
</body>
</html>