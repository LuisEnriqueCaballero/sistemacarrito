<?php
     session_start();
     if(isset($_SESSION['usuario']) and $_SESSION['usuario']=='admin@gmail.com'){

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
<!-- Modal -->
<div class="modal fade" id="actualizarusuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualiza Usuarios</h4>
      </div>
      <div class="modal-body">
        <form id="frmUsuariosU">
            <input type="text" hidden="" id="idUsuario" name="idUsuario">
            <label>Nombre</label>
            <input type="text" class="form-control input-sm" name="nombreu" id="nombreu">
            <label>Apellido</label>
            <input type="text" class="form-control input-sm" name="apellidou" id="apellidou">
            <label>Usuario</label>
            <input type="text" class="form-control input-sm" name="usuariou" id="usuariou">
        </form>
      </div>
      <div class="modal-footer">
        <button id="actualizaUsuario" type="button" class="btn btn-primary">Actualizar</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>
<script type="text/javascript">
    function agregarDatosUsuario(idusuario){
        $.ajax({
            type:"POST",
            data:'idusuario='+idusuario,
            url:'../Procesos/Usuarios/obtenDatoUsuario.php',
            success:function(r){
                dato=jQuery.parseJSON(r);
                $('#idUsuario').val(dato['id_usuario']);
                $('#nombreu').val(dato['nombre']);
                $('#apellidou').val(dato['apellido']);
                $('#usuariou').val(dato['email']);
            }
        });
    }
    function eliminarusuario(idusuario){
        alertify.confirm('¿DESEA ELIMINAR ESTE USUARIO', function(){
            $.ajax({
                type:'POST',
                data:"idusuario="+ idusuario,
                url:"../Procesos/Usuarios/eliminarUsuario.php",
                success:function(r){
                    if(r==1){
                        $("#tablaUsuariosLoad").load("usuarios/tablausuarios.php");
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
        $('#actualizaUsuario').click(function(){
            datos=$('#frmUsuariosU').serialize();
            $.ajax({
                type:"POST",
                data:datos,
                url:"../Procesos/Usuarios/ActualizaUsuario.php",
                success:function(r){
                if(r==1){
                    $('#tablaUsuariosLoad').load('usuarios/tablausuarios.php');
                    alertify.success("se agrego exitosamente");
                }else{
                        alertify.error("no se agrego en la lista");
                    }
                }
            });
        });
    });
</script>

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
                url:"../Procesos/regLoguin/registrarUsuario.php",
                success:function(r){
                    if (r==1) {
                        $('#frmUsuarios')[0].reset();
                        $('#tablaUsuariosLoad').load('usuarios/tablausuarios.php')
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