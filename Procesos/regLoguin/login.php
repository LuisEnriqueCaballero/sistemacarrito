<?php

session_start();

include_once('../../Clases/Conexion.php');
include_once('../../Clases/Usuarios.php');

$usuario =new Usuarios();

$datos =array(
    $_POST['usuario'],
    $_POST['password']
);
echo $usuario->loginuser($datos);
?>