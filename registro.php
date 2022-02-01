<?php
require_once "Clases/Conexion.php";
$con = new Conectar();
$conexion = $con->conexion();

$sql ="SELECT * FROM usuario WHERE email='admin@gmail.com'";
$resultado = mysqli_query($conexion, $sql);
$validar = 0;
if(mysqli_num_rows($resultado)){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Libreria/bootstrap/css/bootstrap.css">
    <script src="Libreria/jquery/jquery-3.6.0.min.js"></script>
    <script src="Js/function.js"></script>
    <title>REGISTRARSE</title>
</head>
<body style="background:gainsboro">
    <br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="panel panel-danger">
                    <div class="panel panel-heading">
                        REGISTRO DE USUARIO
                    </div>
                    <div class="panel panel-body">
                        <form action="" id="frmRegistro">
                            <label for="">NOMBRE</label>
                            <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="INGRESAR NOMBRE">
                            <label for="">APELLIDO</label>
                            <input type="text" name="apellido" id="apellido" class="form-control input-sm" placeholder="INGRESAR APELLIDO">
                            <label for="">EMAIL</label>
                            <input type="email" name="correo" id="correo" class="form-control input-sm" placeholder="INGRESAR SU CORREO">
                            <label for="">CONTRASEÑA</label>
                            <input type="password" name="password" id="password" class="form-control input-sm" placeholder="INGRESAR SU CONTRASEÑA">
                            <p></p>
                            <span class="btn btn-success" id="registro">REGISTRARSE</span>
                            <br>
                            <a href="index.php" class="btn btn-danger float-end">LOGIN</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        $('#registro').click(function(){
            vacios=validarFormularioVacio("frmRegistro");
            if(vacios > 0){
                alert("DEBES RELLENAR EL FORMULARIO!!");
                return false;
            }
            datos=$('#frmRegistro').serialize();
            $.ajax({
                type:"POST",
                data:datos,
                url:'Procesos/regLoguin/registrarUsuario.php',
                success:function(r){
                    if(r==1){
                        alert("AGREGADO CON EXITOS !!")
                    }else{
                        alert("fallo al agregar xb")
                    }
                }
            });
        });
    });
</script>