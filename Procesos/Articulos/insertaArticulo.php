<?php
require_once "../../Clases/Conexion.php";
require_once "../../Clases/articulos.php";

$obj = new Articulos();

$datos =array(
    $_POST['categoriaselect'],
    $_POST['nombre'],
    $_POST['descripcion'],
    $_POST['cantidad'],
    $_POST['precio'],
    
);
$nombreimagen=$_FILES['imagen']['name'];
$rutaAlmacenamiento =$_FILES['imagen']['tmp_name'];
$carpeta='../../archivos/';
$rutafinal=$carpeta.$nombreimagen;

$datosImg=array(
    $_POST['categoriaselect'],
    $nombreimagen,
    $rutafinal
);

if(move_uploaded_file($rutaAlmacenamiento, $rutafinal)){
     echo $idimagen =$obj->agregarImagen($datosImg);
}

?>