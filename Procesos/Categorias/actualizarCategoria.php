<?php
require_once "../../Clases/Conexion.php";
require_once "../../Clases/categorias.php";

$datos =array(
    $_POST['idCategoria'],
    $_POST['categoriaU']
);

$actulizarCategoria =new categorias();

echo $actulizarCategoria->actualizarCategoria($datos);
?>