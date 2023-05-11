<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="views/css-views/views_style.css">
  <title>Bienvenido Ger.Sucursal</title>
</head>
<body>
  <header>
    <nav>
  <h1>Bienvenido <?php echo $user['usuario']; ?></h1>
  <ul>
		<li><a href="usuarios-menu/gerente-sucursal/ingresar_empleado.php">Ingresar empleado</a></li>
		<li><a href="usuarios-menu/gerente-sucursal/empleado_baja.php">Dar de baja a empleado</a></li>
		<li><a href="usuarios-menu/gerente-sucursal/ver_prestamos.php">Ver prestamos|Aprobacion/Desaprobacion de prestamos</a></li>
	</ul>
  <a href="<?php echo RUTA.'close.php' ?>">Cerrar Sesion</a>
</nav>
</header>
</body>
</html>