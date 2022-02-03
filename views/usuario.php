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
    require_once "menu.php";
    ?>
</head>
<body>
    <div class="container">
        <h1>Administrar Usuarios</h1>
        <div class="row">
            <div class="col-sm-4">
                <form id="frmUsuarios">
                    <label>Nombre</label>
                    <input type="text" class="form-control input-sm" name="nombre" id="nombre">
                    <label>Apellido</label>
                    <input type="text" class="form-control input-sm" name="apellido" id="apellido">
                    <label>Usuario</label>
                    <input type="text" class="form-control input-sm" name="usuario" id="usuario">
                    <label>Password</label>
                    <input type="text" class="form-control input-sm" name="password" id="password">
                    <p></p>
                    <span class="btn btn-primary" id="agregarusuario">AGREGAR</span>
                </form>
            </div>
            <div class="col-sm-8">
                <div id="tablaUsuariosLoad"></div>
            </div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        $("#tablaUsuariosLoad").load("usuarios/tablausuarios.php")
        $("#agregarusuario").click(function(){
            vacios=validarFormularioVacio("frmUsuarios");
            if(vacios>0){
                alertify.alert("Debes llenar todo el formulario");
                return false;
            }
            datos=$("#frmUsuarios").serialize();
            $.ajax({
                type:"POST",
                data:datos,
                url:"../Procesos/Usuarios/agregarUsuario.php",
                success:function(r){
                    if (r==1) {
                        alertify.success("se agrego exitosamente")
                    }else{
                        alertify.error("no se agrego en la lista")
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