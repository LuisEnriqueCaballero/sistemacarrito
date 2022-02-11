<?php
require_once "../../Clases/Conexion.php";
require_once "../../Clases/venta.php"; 

$venta =new Venta();

echo json_encode($venta->obtendatosPorducto($_POST['idproducto']));


?>