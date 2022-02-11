<?php
session_start();
 require_once "../../Clases/Conexion.php";

 $con =new Conectar();
 $conexion = $con->conexion();

 $clienteventa=$_POST['clienteventa'];
 $productoventa=$_POST['productoventa'];
 $descripcion=$_POST['descripcionV'];
 $cantidad=$_POST['cantidadV'];
 $precio=$_POST['precioV'];
 

 $sql="SELECT nombre, apellido FROM clientes WHERE id_cliente='$clienteventa'";
 $resultado=mysqli_query($conexion,$sql);

 $cliente =mysqli_fetch_row($resultado);

 $nacliente=$cliente[1]." ".$cliente[0];

 $sql ="SELECT nombre FROM articulo WHERE id_producto='$productoventa'";

 $resultado=mysqli_query($conexion,$sql);

 $producto=mysqli_fetch_row($resultado)[0];

 $articulo = $productoventa ."||".$producto."||".$descripcion."||".$precio."||".$nacliente."||".$clienteventa;

 $_SESSION['tablaComprasTemp'][]=$articulo;
?>