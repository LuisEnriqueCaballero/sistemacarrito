<?php
 require_once "../../Clases/Conexion.php";
 require_once "../../Clases/venta.php";
 
 $venta=new Venta();
$con=new Conectar();
$conexion =$con->conexion();

 $id_venta=$_GET['id_venta'];

 $sql="SELECT ve.id_venta,
              ve.fechaCompra,
              ve.id_cliente,
              art.nombre,
              art.precio,
              art.descripcion FROM 
              ventas AS ve INNER JOIN articulos AS art ON ve.id_producto=art.id_producto
              AND ve.id_venta='$id_venta'";

$resultado=mysqli_query($conexion, $sql);
$ver=mysqli_fetch_row($resultado);

$folio=$ver[0];
$fecha=$ver[1];
$id_cliente=$ver[2];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Libreria//bootstrap/css/bootstrap.css">
</head>
<body>
    <img src="../../img/logo.png" width="200" height="200">
    <br>

    <table class="table table-hover">
        <tr>
            <td>FECHA:<?php echo $fecha;?></td>
        </tr>
        <tr>
            <td>FOLIO:<?php echo $folio;?></td>
        </tr>
        <tr>
            <td>Cliente:<?php echo $venta->nombreCliente($id_cliente);?></td>
        </tr>
    </table>

    <table class="table table-striped">
        <tr>
            <td>nombre Producto</td>
            <td>Precio</td>
            <td>Cantidad</td>
            <td>Descripcion</td>
        </tr>
        <?php
        $sql="SELECT ve.id_venta,
        ve.fechaCompra,
        ve.id_cliente,
        art.nombre,
        art.precio,
        art.descripcion FROM 
        ventas AS ve INNER JOIN articulos AS art ON ve.id_producto=art.id_producto
        AND ve.id_venta='$id_venta'";

        $resultado=mysqli_query($conexion, $sql);
        $total=0;
        while($ver=mysqli_fetch_row($resultado)):

        ?>
        <tr>
            <td><?php echo $ver[3];?></td>
            <td><?php echo $ver[4];?></td>
            <td>1</td>
            <td><?php echo $ver[5];?></td>
        </tr>
        <?php 
        $total=$total+$ver[4];
         endwhile;?>
    </table>
    <tr>
       <td>TOTAL= :<?php echo$total; ?></td> 
    </tr>
</body>
</html>