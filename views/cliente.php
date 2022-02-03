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
    <?php
    include_once "menu.php";
    ?>
</head>
<body>
    <div class="container">
        <h1>Agregar Clientes</h1>
        <div class="row">
            <div class="col-sm-4">
                <form id="frmcliente">
                    <label>Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control input-sm-group">
                    <label>Apellido</label>
                    <input type="text" name="apellido" id="apellido" class="form-control input-sm">
                    <label>Direccion</label>
                    <input type="text" name="direccion" id="direccion" class="form-control input-sm">
                    <label>Email</label>
                    <input type="email" name="correo" id="correo" class="form-control input-sm">
                    <label>Telefono</label>
                    <input type="tel" name="telefono" id="telefono" class="form-control input-sm">
                    <label>RFC</label>
                    <input type="text" name="rfc" id="rfc" class="form-control input-sm">
                    <p></p>
                    <span class="btn btn-primary" id="registrarcliente">Agregar</span>
                </form>
            </div>
            <div class="col-sm-8">
                <div id="tablacliente"></div>
            </div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        $("#tablacliente").load("clientes/tablacliente.php");
        $("#registrarcliente").click(function(){
            vacios=validarFormularioVacio('frmcliente');
            if(vacios>0){
                alertify.alert("llenar el formulario =(");
                return false;
            }
            datos=$("#frmcliente").serialize(),
            $.ajax({
                type:"POST",
                data:datos,
                url:"../Procesos/Clientes/agregarCliente.php",
                success:function(r){
                    if(r==1){
                        alertify.success("se agrego exitosamente");
                    }else{
                        alertify.error("no se agrego exitosamente");
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