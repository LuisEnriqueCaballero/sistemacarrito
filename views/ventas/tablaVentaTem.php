<?php
session_start();

//print_r($_SESSION['tablaComprasTemp']);
?>

<h4>Hacer Ventas</h4>
<h4><div id="nombreClienteVenta"></div></h4>
<table class="table table-bordered table-hover table-condensed" style="text-align:center;">
    <caption>
        <span class="btn btn-success" onclick="CrearVenta()">Generar Venta
            <span class="glyphicon glyphicon-usd"></span>
        </span>
    </caption>
    <tr>
        <td>Nombre</td>
        <td>Descripcion</td>
        <td>Precio</td>
        <td>Cantidad</td>
        <td>Quitar</td>
    </tr>
    <?php 
    $total=0; //esta variable tendrael total dela compra en dinero
    $cliente="";//en esta se guarda el nombre del cliente
        if(isset($_SESSION['tablaComprasTemp'])):
            foreach (@$_SESSION['tablaComprasTemp'] as $key) {
                $i=0;
                $d=explode('||', @$key);
    ?>
    <tr>
        <td><?php echo $d[1]?></td>
        <td><?php echo $d[2]?></td>
        <td><?php echo $d[3]?></td>
        <td><?php echo 1 ?></td>
        <td>
            <span class="btn btn-danger btn-xs" onclick="quitarP('<?php echo $i;?>')">
                <span class="glyphicon glyphicon-remove"></span>
            </span>
        </td>
    </tr>
    <?php 
    $total=$total +$d[3];
    $i++;
    $cliente=$d[4];
    }
    endif ;?>
    <tr>
        <td>Total de venta</td>
        <td colspan="4"><?php echo 'S/.'.$total ;?></td>
    </tr>
</table>
<script type="text/javascript">
    $(document).ready(function(){
        nombre="<?php echo @$cliente ?>";
        $("#nombreClienteVenta").text("Nombre de Cliente:"+nombre);
    })
</script>