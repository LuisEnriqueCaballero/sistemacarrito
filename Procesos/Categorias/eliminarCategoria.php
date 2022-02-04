<?php

require_once "../../Clases/Conexion.php";
require_once "../../Clases/categorias.php";


$id= $_POST['idcategoria'];

$eliminarcategoria =new categorias();

echo $eliminarcategoria->eliminarCategoria($id);
?>