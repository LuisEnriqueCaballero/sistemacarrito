<?php
require_once "../../Clases/Conexion.php";
$con = new Conectar();
$conexion = $con->conexion();

$sql ="SELECT id_categoria,nombreCategoria FROM categoria";
$resultado = mysqli_query($conexion,$sql);
?>
<table class="table table-hover table-condensed table-bordered" style="text-align:center;">
     <caption><label>Categotia :D</label></caption>
    <tr>
        <td>Categoria</td>
        <td>Editar</td>
        <td>Eliminar</td>
    </tr>
    <?php 
    while ($ver=mysqli_fetch_row($resultado)):
    ?>
    <tr>
        <td><?php echo $ver[1];?></td>
        <td>
            <span class="btn btn-success btn-sm">
                <span class="glyphicon glyphicon-pencil" 
                data-toggle="modal" data-target="#actualizacategotia"
                onclick="agregaDato('<?php echo $ver[0];?>','<?php echo $ver[1];?>')"></span>
            </span>
        </td>
        <td>
            <span class="btn btn-danger btn-sm">
                <span class="glyphicon glyphicon-trash"></span>
            </span>
        </td>
    </tr>
    <?php endwhile; ?>
</table>