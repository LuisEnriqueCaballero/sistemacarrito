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
                    alertify.success("categoria agregado con exitos");
                }else{
                    alertify.error("No se pudo agregar categoria");
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