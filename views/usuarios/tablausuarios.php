<?php
require_once '../../Clases/Conexion.php';
$con =new Conectar();
$conexion = $con->conexion();

$sql ="SELECT id_usuario,nombre, apellido, email FROM usuario ";

$resultado =mysqli_query($conexion,$sql);


?>

<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
<caption><span>usuarios</span></caption>
<tr>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Usuario</th>
    <th>Editar</th>
    <th>Eliminar</th>
</tr>
<?php while($ver = mysqli_fetch_row($resultado)):?>
<tr>
    <td><?php echo $ver[1];?></td>
    <td><?php echo $ver[2];?></td>
    <td><?php echo $ver[3];?></td>
    <td>
        <span class="btn btn-success btn-sm" onclick="agregarDatosUsuario('<?php echo $ver[0];?>')"
        data-toggle="modal" data-target="#actualizarusuario">
            <span class="glyphicon glyphicon-pencil"></span>
        </span>
    </td>
    <td>
        <span class="btn btn-danger btn-sm" onclick="eliminarusuario('<?php echo $ver[0] ;?>')">
            <span class="glyphicon glyphicon-trash"></span>
        </span>
    </td>
</tr>
<?php endwhile;?>
</table>