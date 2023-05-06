<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="views/css-views/views_style.css">
  <title>Bienvenido Cajero</title>
</head>
<body>
	<header>
		<nav>
            <h1>Bienvenido <?php echo $user['usuario']; ?></h1>
			<ul>
		<li><a href="usuarios-menu/cajero/ingreso_retiro.php">Ingresar retiro</a></li>
		<li><a href="usuarios-menu/cajero/nuevo_cliente.php">Ingresar nuevo cliente</a></li>
		<li><a href="usuarios-menu/cajero/nuevo_dependiente.php">Ingresar nuevo dependiente</a></li>
		<li><a href="usuarios-menu/cajero/nuevo_prestamo.php">Ingresar un prestamo</a></li>
	</ul>
  <a href="<?php echo RUTA.'close.php' ?>">Cerrar Sesion</a>
</nav>
</header>
</body>
</html>