<?php
require_once "../../Clases/Conexion.php";
require_once "../../Clases/Cliente.php";

$cliente =new Cliente();

$datos =array(
    $_POST['idclienteU'],
    $_POST['nombreU'],
    $_POST['apellidoU'], 
    $_POST['direccionU'], 
    $_POST['correoU'],
    $_POST['telefonoU'],
    $_POST['rfcU'],
);

echo $cliente->Actualizarcliente($datos);
?>