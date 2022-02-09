<?php
   require_once "../../Clases/Conexion.php";

   $con =new Conectar();
   $conexion =$con->conexion();

   $sql = "SELECT art.nombre, art.descripcion , art.cantidad, art.precio,img.ruta,cat.nombreCategoria,art.id_producto
           FROM articulo as art
           INNER JOIN imagenes as img 
           on art.id_imagen = img.id_imagen
           INNER JOIN categoria as cat
           on art.id_categoria=cat.id_categoria"
           ;

   $resultado=mysqli_query($conexion,$sql);
?>

<table class="table table-hover table-condensed table-bordered" style="text-align:center;">
<caption><label>Articulos xv</label></caption>
<tr>
    <th>Nombre</th>
    <th>Descripcion</th>
    <th>Cantidad</th>
    <th>Precio</th>
    <th>Imagen</th>
    <th>Categoria</th>
    <th>Editar</th>
    <th>Eliminar</th>
</tr>
<?php while($ver =mysqli_fetch_row($resultado)) :?>
<tr>
    <td><?php echo $ver[0];?></td>
    <td><?php echo $ver[1];?></td>
    <td><?php echo $ver[2];?></td>
    <td><?php echo $ver[3];?></td>
    <td>
        <?php 
        $imgver= explode("/",$ver[4]);
        $imgruta=$imgver[1]."/".$imgver[2]."/".$imgver[3];
        ?>
        <img src="<?php echo $imgruta?>" width="100" height="100">
    </td>
    <td><?php echo $ver[5] ;?></td>
    <td>
        <span class="btn btn-warning btn-xs">
            <span class="glyphicon glyphicon-pencil"
            data-toggle="modal" data-target="#actualizarArticulo" onclick="agregaDatosArticulo('<?php echo $ver[6] ;?>')"
            ></span>
        </span>
    </td>
    <td>
        <span class="btn btn-danger btn-xs">
            <span class="glyphicon glyphicon-trash" onclick="eliminarArticulo('<?php echo $ver[6];?>')"></span>
        </span>
    </td>
</tr>
<?php endwhile ;?>
</table>