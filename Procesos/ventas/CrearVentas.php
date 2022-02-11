<?php
session_start();
require_once "../../Clases/Conexion.php";
require_once "../../Clases/venta.php";

$venta = new Venta();



if(count($_SESSION['tablaComprasTemp'])==0){
    echo 0;   
    }else{
        $resultado=$venta->crearVenta();
        unset($_SESSION['tablaComprasTemp']);
        echo $resultado;
    }

?>