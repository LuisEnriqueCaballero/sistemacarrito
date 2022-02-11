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
    <!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="ActualizacionClientes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar Datos</h4>
      </div>
      <div class="modal-body">
        <form id="frmclienteU">
            <input type="text" hidden="" name="idclienteU" id="idclienteU">
            <label>Nombre</label>
            <input type="text" name="nombreU" id="nombreU" class="form-control input-sm-group">
            <label>Apellido</label>
            <input type="text" name="apellidoU" id="apellidoU" class="form-control input-sm">
            <label>Direccion</label>
            <input type="text" name="direccionU" id="direccionU" class="form-control input-sm">
            <label>Email</label>
            <input type="email" name="correoU" id="correoU" class="form-control input-sm">
            <label>Telefono</label>
            <input type="tel" name="telefonoU" id="telefonoU" class="form-control input-sm">
            <label>RFC</label>
            <input type="text" name="rfcU" id="rfcU" class="form-control input-sm">
        </form>
      </div>
      <div class="modal-footer">
        <button id="actualizarCliente" type="button" class="btn btn-primary" data-dismiss="modal">Actualizar</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<script type="text/javascript">
    function agregarDatosCliente(idCliente){
        $.ajax({
            type:"POST",
            data:"idCliente="+idCliente,
            url:"../Procesos/Clientes/obtenDatosCliente.php",
            success:function(r){
                dato=jQuery.parseJSON(r);
                $('#idclienteU').val(dato['id_cliente']);
                $('#nombreU').val(dato['nombre']);
                $('#apellidoU').val(dato['apellido']);
                $('#direccionU').val(dato['direccion']);
                $('#correoU').val(dato['email']);
                $('#telefonoU').val(dato['telefono']);
                $('#rfcU').val(dato['rfc']);
            }
        });
    } 
    function eliminarCliente(idCliente){
        alertify.confirm('¿DESEA ELIMINAR CLIENTE', function(){
            $.ajax({
                type:'POST',
                data:"idCliente="+ idCliente,
                url:"../Procesos/Clientes/Eliminarcliente.php",
                success:function(r){
                    if(r==1){
                        $("#tablacliente").load("clientes/tablacliente.php");
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
        $('#actualizarCliente').click(function(){
            datos=$('#frmclienteU').serialize();
            $.ajax({
                type:"POST",
                data:datos,
                url:'../Procesos/Clientes/ActualizarCliente.php',
                success:function(r){
                    if(r==1){
                        $('#frmcliente')[0].reset();
                        $("#tablacliente").load("clientes/tablacliente.php");
                        alertify.success("Su actualizacion fue correcta ;=)");
                    }else{
                        alertify.error("No se actualizo los datos");
                    }
                }
            });
        });
    });
</script>
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
                    alert(r)
                    if(r==1){
                        $("#tablacliente").load("clientes/tablacliente.php");
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