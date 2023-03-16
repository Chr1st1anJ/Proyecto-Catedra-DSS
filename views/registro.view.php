<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body class="bg-image">
    <h1 class="titulo">Bienvenido a Banco de Agricultura Salvadoreño SV</h1>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <div class="input-group">
            <i class="fa fa-user-o icons" aria-hidden="false"></i>
            <input type="text" name="usuario" placeholder="Usuario" class="form-control">
        </div>

        <div class="input-group">
            <i class="fa fa-lock icons" aria-hidden=""></i>
            <input type="password" name="password" placeholder="Contraseña" class="form-control">
        </div>

        <div class="input-group">
            <select class="form-control" name="rol">
                <option value="">Seleccione un privilegio</option>
                <option value="administrador">Administrador</option>
                <option value="usuario">Usuario</option>
            </select>

        </div>
        <?php if (!empty($errores)): ?>
            <ul>
                <?php echo $errores; ?>
            </ul>
            <?php endif; ?>

        <button type="submit" name="submit" class="btn btn-flat-green">Ingresar</button>
    </form>

<a href="login.php" class="login-link">Ya tienes una cuenta? Inicia Sesion aqui</a>

    </div>
</body>
</html>