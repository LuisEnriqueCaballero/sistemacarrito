<?php
require_once "../../Clases/Conexion.php";
require_once "../../Clases/venta.php";
$con =new Conectar();
$conexion = $con->conexion();
$venta = new Venta();

$sql="SELECT id_venta, fechaCompra, id_cliente  FROM ventas GROUP BY id_venta";
$resultado =mysqli_query($conexion,$sql);
?>

<h4>Reportes y ventas</h4>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <div class="table-responsive">
            <table class="table table-striped table-condensed table-bordered" style="text-align: center;">
                <caption><label>Ventas :)</label></caption>
                <tr>
                    <th>FOLIO</th>
                    <th>FECHA</th>
                    <th>CLIENTE</th>
                    <th>TOTAL DE COMPRA</th>
                    <th>TICKET</th>
                    <th>REPORTE</th>
                </tr>
                <?php while($ver=mysqli_fetch_row($resultado)): ?>
                <tr>
                    <td><?php echo $ver[0];?></td>
                    <td><?php echo $ver[1];?></td>
                    <td>
                        <?php 
                        if($venta->nombreCliente($ver[2])==" "){
                            echo "S/C";
                        }else{
                            echo $venta->nombreCliente($ver[2]);
                        }
                        ?>
                    </td>
                    <td>
                        <?php 
                         echo "$".$venta->ObtenerTotal($ver[0]);
                        ?>
                    </td>
                    <td>
                        <a href="" class="btn btn-info btn-sm">
                            <span class="glyphicon glyphicon-list-alt"></span>
                        </a>
                    </td>
                    <td>
                        <a href="../Procesos/ventas/crearReportePDF.php?id_venta='<?php echo $ver[0];?>'" class="btn btn-info btn-sm">
                            <span class="glyphicon glyphicon-file"></span>
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
    <div class="col-sm-1"></div>
</div>