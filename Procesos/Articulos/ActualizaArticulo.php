<?php
 require_once "../../Clases/Conexion.php";
 require_once "../../Clases/articulos.php";
 $Articulo = new Articulos();

 $datos =array(
    $_POST['idArticulo'],
    $_POST['SeleccionecategoriaU'],
    $_POST['nombreU'],
    $_POST['descripcionU'],
    $_POST['cantidadU'],
    $_POST['precioU'],
 );
    echo $Articulo->ActualizarArticulo($datos);
?>