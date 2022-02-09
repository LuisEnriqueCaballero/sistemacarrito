<?php
require_once '../../Clases/Conexion.php';
require_once '../../Clases/articulos.php';
$articulo = new Articulos();

$idart=$_POST["idart"];

echo json_encode($articulo->obtenDatosArticulo($idart));


?>