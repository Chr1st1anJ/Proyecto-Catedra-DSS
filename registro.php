<?php session_start();

require 'admin/config.php';
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario = limpiarDatos($_POST['usuario']);
    $password = limpiarDatos($_POST['password']);
    $password = hash('sha512' , $password);
    $rol = $_POST['rol'];

    $errores = '';

    // validacion de los campos de texto
    if (empty($usuario) || empty($password) || empty($rol)) {
        $errores .= '<li class="error">Porfavor llene todos los campos</li>';
    
    } else {
        //validacion en caso de que el usuario no exista
        $conexion = conexion($bd_config);
        $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1'); 
        $statement->execute([
            ':usuario' => $usuario
        ]);
        $resultado = $statement->fetch();

        if ($resultado != false) {
            $errores .= '<li class="error">El usuario ya existe</li>';
        }
    }

    if($errores == ''){
        $conexion = conexion($bd_config);
        $statement = $conexion->prepare('INSERT INTO usuarios (id, usuario, password, tipo_usuario) 
        VALUES(null, :usuario, :password, :tipo_usuario)');
        $statement->execute(
            array(
                ':usuario' => $usuario,
                ':password' => $password,
                ':tipo_usuario' => $rol
            )    
        );

        header('Location: '.RUTA.'login.php');

    }
}

require 'views/registro.view.php';

?>

