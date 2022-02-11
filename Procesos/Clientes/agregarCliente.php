<?php
session_start();
require_once "../../Clases/Conexion.php";
require_once "../../Clases/Cliente.php";

$datos=array(
    $_POST['nombre'],
    $_POST['apellido'],
    $_POST['direccion'],
    $_POST['correo'],
    $_POST['telefono'],
    $_POST['rfc']
);

$cliente= new Cliente();

echo $cliente->RegristraCliente($datos);
?>