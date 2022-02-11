<?php
require_once "../../Clases/Conexion.php";
require_once "../../Clases/Cliente.php";

$cliente = new Cliente();

echo $cliente->EliminarCliente($_POST['idCliente']);
?>