<?php
session_start();
require_once "../../Clases/Conexion.php";
require_once "../../Clases/categorias.php";
$fecha =date("Y-m-d");
$idusuario= $_SESSION['iduser'];
$categoria=$_POST['categoria'];

$datos=array(
    $idusuario,
    $categoria,
    $fecha,
);

$categorias =new categorias();
echo $categorias->agregaCategoria($datos);
?>