<?php
session_start();
$iduser =$_SESSION['iduser'];
require_once "../../Clases/Conexion.php";
require_once "../../Clases/articulos.php";

$obj = new Articulos();

$datos =array();

$nombreimagen=$_FILES['imagen']['name'];
$rutaAlmacenamiento =$_FILES['imagen']['tmp_name'];
$carpeta='../../archivos/';
$rutafinal=$carpeta.$nombreimagen;

$datosImg=array(
    $_POST["Seleccionecategoria"],
    $nombreimagen,
    $rutafinal
);

if(move_uploaded_file($rutaAlmacenamiento, $rutafinal)){
      $idimagen =$obj->agregarImagen($datosImg);

      if($idimagen > 0){
          $datos[0]=$_POST["Seleccionecategoria"];
          $datos[1]=$idimagen;
          $datos[2]=$iduser;
          $datos[3]=$_POST["nombre"];
          $datos[4]=$_POST["descripcion"];
          $datos[5]=$_POST["cantidad"];
          $datos[6]=$_POST["precio"];
          
          echo $obj->inserteArticulo($datos);
      }else{
          echo 0;
      }
}

?>