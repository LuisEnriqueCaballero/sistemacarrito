<?php
     session_start();
     if(isset($_SESSION['usuario'])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> Categorias</title>
    <?php require_once "menu.php";?>
</head>
<body>
    <div class="container">
        <h1>Categorias</h1>
        <div class="row">
            <div class="col-sm-4">
                <form id="frmcategoria">
                    <label>Categoria</label>
                    <input type="text" class="form-control input-sm" name="categoria" id="categoria">
                    <p></p>
                    <span class="btn btn-primary" id="btnagregarcategoria">Agregar</span>
                </form>
            </div>
            <div class="col-sm-8">
                <div id="tablaCategoriaLoad">
                </div>
            </div>
        </div>
    </div>
<!-- Modal -->
<div class="modal fade" id="actualizacategotia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualiza Categorias</h4>
      </div>
      <div class="modal-body">
        <form id="frmCategoria">
          <input type="text" hidden="" name="idCategoria" id="idCategoria">
          <label>Categoria</label>
          <input type="text" name="categoriaU" id="categoriaU" class="form-control input-sm">

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" id="guardarDatosActualizado" data-dismiss="modal">Guardar datos</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<script type="text/javascript"> 
$(document).ready(function(){
    $("#tablaCategoriaLoad").load("categorias/tablascategorias.php");
    $("#btnagregarcategoria").click(function(){
        vacios=validarFormularioVacio("frmcategoria");
        if(vacios > 0){
            alertify.alert("DEBES LLENAR TODO EL FORMULARIO");
            return false;
        }
        datos=$("#frmcategoria").serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:"../Procesos/Categorias/agregacategotias.php",
            success:function(r){
                if(r == 1){
                    // nos permite limpiar el formulario para insertar un registro
                    $("#frmcategoria")[0].reset();

                    $("#tablaCategoriaLoad").load("categorias/tablascategorias.php");
                    alertify.success("categoria agregado con exitos");
                }else{
                    alertify.error("No se pudo agregar categoria");
                }
            }
        });
    });
});  
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#guardarDatosActualizado").click(function(){

            datos=$("#frmCategoria").serialize();
            $.ajax({
                type:"POST",
                data:datos,
                url:"../Procesos/Categorias/actualizarCategoria.php",
                success:function(r){
                    if(r == 1){
                        $("#tablaCategoriaLoad").load("categorias/tablascategorias.php");
                        alertify.success("Actualizacion exitosa");
                    }else{
                        alertify.error("No se Actualizo datos :*(");
                    }
                }
            })
        })
    })
</script>
<script type="text/javascript"> 
    function agregaDato(idCategoria,categoria){
        $("#idCategoria").val(idCategoria);
        $("#categoriaU").val(categoria);
    }

    function eliminarDatos(idcategoria){
        alertify.confirm('¿DESEA ELIMINAR ESTA CATEGORIA', function(){
            $.ajax({
                type:'POST',
                data:"idcategoria="+ idcategoria,
                url:"../Procesos/Categorias/eliminarCategoria.php",
                success:function(r){
                    if(r==1){
                        $("#tablaCategoriaLoad").load("categorias/tablascategorias.php");
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

<?php
}else{
    header('location:../index.php');
}
?>