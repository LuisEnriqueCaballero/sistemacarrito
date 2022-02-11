<?php
require_once "../../Clases/Conexion.php";
$con =new Conectar;
$conexion =$con->conexion();

$sql= "SELECT id_cliente,nombre,apellido,direccion,email,telefono, rfc FROM clientes";
$resultado=mysqli_query($conexion,$sql);
?>
<table class="table table-dark table-striped table-responsive" style="text-align: center">
    <caption><span>Clientes ;)</span></caption>
    <tr>
        <td>Nombre</td>
        <td>Apellido</td>
        <td>Direccion</td>
        <td>Email</td>
        <td>Telefono</td>
        <td>RFC</td>
        <td>Editar</td>
        <td>Eliminar</td>
    </tr>
    <?php while($ver=mysqli_fetch_row($resultado)):?>
    <tr>
        <td><?php echo $ver[1];?></td>
        <td><?php echo $ver[2];?></td>
        <td><?php echo $ver[3];?></td>
        <td><?php echo $ver[4];?></td>
        <td><?php echo $ver[5];?></td>
        <td><?php echo $ver[6];?></td>
        <td>
            <span class="btn btn-light sx" data-toggle="modal" data-target="#ActualizacionClientes"
            onclick="agregarDatosCliente('<?php echo $ver[0];?>')">
                <span class="glyphicon glyphicon-pencil" ></span>
            </span>
        </td>
        <td>
            <span class="btn btn-light sx">
                <span class="glyphicon-trash" onclick="eliminarCliente('<?php echo $ver[0];?>')"></span>
            </span>
        </td>
    </tr>
    <?php endwhile;?>
</table>