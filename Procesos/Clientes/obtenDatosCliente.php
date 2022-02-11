<?php
require_once "../../Clases/Conexion.php";
require_once "../../Clases/Cliente.php";

$cliente =new Cliente();

echo json_encode($cliente->ObtendatosCliente($_POST['idCliente']));
?>