<?php session_start();

require 'admin/config.php';
require 'functions.php';

// comprobar session
if (isset($_SESSION['usuario'])) {
  // validar los datos por privilegio
  $conexion = conexion($bd_config);
  $usuario = iniciarSession('usuarios', $conexion);

  if ($usuario['tipo_usuario'] == 'Dependiente') {
    header('Location: '.RUTA.'dependiente.php');
  } elseif ($usuario['tipo_usuario'] == 'Cliente') {
    header('Location: '.RUTA.'cliente.php');
  } else {
    header('Location: '.RUTA.'login.php');
  }
} else {
  header('Location: '.RUTA.'login.php');
}

