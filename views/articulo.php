<?php
     session_start();
     if(isset($_SESSION['usuario'])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Inicio</title>
    <?php require_once "menu.php";?>
    <?php require_once "../Clases/Conexion.php";
    $con = new Conectar();
    $conexion =$con->conexion();
    $sql= "SELECT id_categoria, nombreCategoria FROM categoria";
    $resultado =mysqli_query($conexion, $sql);
    ?>
</head>
<body>
    <div class="container">
        <h1>Articulos</h1>
        <div class="row">
            <div class="col-sm-4">
                <form id="frmArticulos" enctype="multipart/form-data">
                    <label></label>
                    <select name="Seleccionecategoria" id="Seleccionecategoria" class="form-control input-sm">
                        <option value="A">Seleccionar Categoria</option>
                    <?php while($ver=mysqli_fetch_row($resultado)):?>
                        <option value="<?php echo $ver[0]?>"><?php echo $ver[1] ;?></option> 
                    <?php endwhile; ?>
                    </select>
                    <label>Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control input-sm">
                    <label>Descripcion</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control input-sm">
                    <label>Cantidad</label>
                    <input type="text" name="cantidad" id="cantidad" class="form-control input-sm">
                    <label>Precio</label>
                    <input type="text" name="precio" id="precio" class="form-control input-sm">
                    <label>Imagen</label>
                    <input type="file" name="imagen" id="imagen">
                    <p></p>
                    <span id="btnagregarArticulo" class="btn btn-primary">Agregar</span>
                </form>
            </div>
            <div class="col-sm-8">
                <div id="tablaArticulosLoad"></div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="actualizarArticulo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
          </div>
          <div class="modal-body">
              <!-- U:update -->
          <form id="frmArticulosU" enctype="multipart/form-data">
                    <input type="text" name="idArticulo" id="idArticulo" hidden="">
                    <label>Categoria</label>
                    <select name="SeleccionecategoriaU" id="SeleccionecategoriaU" class="form-control input-sm">
                        <option value="A">Seleccionar Categoria</option>
                    <?php  
                         $sql= "SELECT id_categoria, nombreCategoria FROM categoria";
                         $resultado =mysqli_query($conexion, $sql);
                    ?>
                    <?php while($ver=mysqli_fetch_row($resultado)):?>
                        <option value="<?php echo $ver[0]?>"><?php echo $ver[1] ;?></option> 
                    <?php endwhile; ?>
                    </select>
                    <label>Nombre</label>
                    <input type="text" name="nombreU" id="nombreU" class="form-control input-sm">
                    <label>Descripcion</label>
                    <input type="text" name="descripcionU" id="descripcionU" class="form-control input-sm">
                    <label>Cantidad</label>
                    <input type="text" name="cantidadU" id="cantidadU" class="form-control input-sm">
                    <label>Precio</label>
                    <input type="text" name="precioU" id="precioU" class="form-control input-sm">
                    <p></p>
                    
                </form>
          </div>
          <div class="modal-footer">
            <button id="btnactualizearticulo" type="button" class="btn btn-btn-danger" data-dismiss="modal">Actualizar</button>
          </div>
        </div>
      </div>
    </div>
</body>
</html>
<script type="text/javascript">
  function agregaDatosArticulo(idarticulo){
    $.ajax({
      type:"POST",
      data:"idart="+idarticulo,
      url:"../Procesos/Articulos/obtenDatosArticulos.php",
      success:function(r){
        // alert(r);//vamos a decirle si es una cadena JSON
        dato=jQuery.parseJSON(r);
        $("#idArticulo").val(dato['id_producto']);
        $("#SeleccionecategoriaU").val(dato['id_categoria']);
        $("#nombreU").val(dato['nombre']);
        $("#descripcionU").val(dato['descripcion']);
        $("#cantidadU").val(dato['cantidad']);
        $("#precioU").val(dato['precio']);

      }
    })
  }
  function eliminarArticulo(idArticulo){
        alertify.confirm('¿DESEA ELIMINAR ESTE ARTICULO', function(){
            $.ajax({
                type:'POST',
                data:"idarticulo=" + idArticulo,
                url:"../Procesos/Articulos/eliminarArticulo.php",
                success:function(r){
                    if(r==1){
                      $("#tablaArticulosLoad").load("articulos/tablasarticulos.php");
                        alertify.success("Eliminacioon exitosa");
                    }else{
                        alertify.error("No se elimino datos :*(");
                    }
                }
            });
            alertify.success('ok')
        },function(){
            alertify.error('Cancel')
        });
    }
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#btnactualizearticulo').click(function(){
        datos=$('#frmArticulosU').serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:"../Procesos/Articulos/ActualizaArticulo.php",
            success:function(r){
              if(r==1){
                $("#tablaArticulosLoad").load("articulos/tablasarticulos.php");
                alertify.success("LOS DATOS SE ACTUALIZARON :)");
              }else{
                alertify.error("No se actualizaron datos")
              }
            }
        })
    });
  });
</script>
<script type="text/javascript"> 
    $(document).ready(function(){
        $("#tablaArticulosLoad").load("articulos/tablasarticulos.php");
        $("#btnagregarArticulo").click(function(){
            vacios=validarFormularioVacio("frmArticulos");
            if(vacios>0){
                alertify.alert("debes llenar todo el formulario");
                return false;
            }
            var formData = new FormData(document.getElementById("frmArticulos"));

            $.ajax({
              url:"../Procesos/Articulos/insertaArticulo.php",
              type:"POST",
              dataType:"html",
              data:formData,
              cache:false,
              contentType:false,
              processData:false,

              success:function(r){
                alert(r);

                if(r== 1){
                  $('#frmArticulos')[0].reset();
                  $('#tablaArticulosLoad').load('articulos/tablasarticulos.php');
                  alertify.success("Agregado con exito :D");
                }else{
                  alertify.error("Fallo al subir el archivo :C");
                }
              }
            });
        });
    });
</script>
<?php
}else{
    header('location:../index.php');
}
?>