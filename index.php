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
  } elseif ($usuario['tipo_usuario'] == 'Cajero') {
    header('Location: '.RUTA.'cajero.php');
  } elseif ($usuario['tipo_usuario'] == 'Ger.Sucursal') {
    header('Location: '.RUTA.'ger_sucursal.php');
  } elseif ($usuario['tipo_usuario'] == 'Ger.General') {
    header('Location: '.RUTA.'ger_general.php');
  } else {
    header('Location: '.RUTA.'login.php');
  }
} else {
  header('Location: '.RUTA.'login.php');
}

