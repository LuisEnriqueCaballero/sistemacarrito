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
                    <select name="categoriaselect" id="categoriaselect" class="form-control input-sm">
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
                <div id="tablaArticulosLoad">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript"> 
    $(document).ready(function(){
        $("#tablaArticulosLoad").load("articulos/tablasarticulos.php");
        $("#btnagregarArticulo").click(function(){
            // vacios=validarFormularioVacio("frmArticulos");
            // if(vacios>0){
            //     alertify.alert("debes llenar todo el formulario");
            //     return false;
            // }
            var formData = new FormData(document.getElementById("frmArticulos"));

            $.ajax({
              url:"../Procesos/Articulos/insertaArticulo.php",
              type:"POST",
              dataType:"html",
              cache:false,
              contentType:false,
              processData:false,

              success:function(r){
                alert(r);

                if(r== 1){
                  $('#frm')[0].reset();
                  $('#tablaArticulosLoad').load('articulos/tablasarticulos.php');
                  alertify.success("Agregado con exito :D");
                }else{
                  alertify.error("Fallo al subir el archivo :C");
                }
              }
            })
        })
    })
</script>
<?php
}else{
    header('location:../index.php');
}
?>