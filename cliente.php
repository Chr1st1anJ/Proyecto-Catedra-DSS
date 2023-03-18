<?php session_start();

require 'admin/config.php';
require 'functions.php';

// comprobar session
if (!isset($_SESSION['usuario'])) {
  header('Location: '.RUTA.'login.php');
}

$conexion = conexion($bd_config);
$user = iniciarSession('usuarios', $conexion);

if ($user['tipo_usuario'] == 'Cliente') {
  // traer el nombre del usuario
  $user = iniciarSession('usuarios', $conexion);


  require 'views/cliente.view.php';
} else {
  header('Location: '.RUTA.'index.php');
}
