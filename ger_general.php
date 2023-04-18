<?php session_start();

require 'admin/config.php';
require 'functions.php';

// comprobar session
if (!isset($_SESSION['usuario'])) {
  header('Location: '.RUTA.'login.php');
}

$conexion = conexion($bd_config);
$admin = iniciarSession('usuarios', $conexion);

if ($admin['tipo_usuario'] == 'Ger.General') {
  // traer el nombre del usuario
  $user = iniciarSession('usuarios', $conexion);


  require 'views/ger_general.view.php';
} else {
  header('Location: '.RUTA.'index.php');
}

 ?>