<?php

require_once "../../Clases/Conexion.php";
require_once "../../Clases/articulos.php";


$idart= $_POST['idarticulo'];

$eliminarArticulo =new Articulos();

echo $eliminarArticulo->eliminarArticulo($idart);
?>