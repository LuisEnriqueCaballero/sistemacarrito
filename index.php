<?php
   require_once "Clases/Conexion.php";

   $con = new Conectar();
   $conexion =$con->conexion();
   $sql ="SELECT * FROM usuario WHERE email='admin@gmail.com'";

   $validar =0;
   $resultado= mysqli_query($conexion, $sql);
     if(mysqli_num_rows($resultado)>0){
       $validar = 1 ;
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
    <!-- esta funcion nos sirve para valida datos -->
    <title>Login de usuario</title>
</head>
<body style="background:gray">
    <br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel panel-heading">
                        sistema de ventas y almacen
                    </div>
                    <div class="panel panel-body">
                        <p>
                            <img src="img/logo.png"  height="190px">
                        </p>
                        <form id="frmlogin">
                            <label for="">USUARIO</label>
                            <input type="text" name="usuario" id="usuario" class="form-control input-sm" placeholder="INGRESE EL USUARIO">
                            <label for="">PASSWORD</label>
                            <input type="password" name="password" id="password" class="form-control input-sm" placeholder="INGRESE SU CONTRASEÑA">
                            <p></p>
                            <span class="btn btn-primary btn-sm" id="Ingresar">ENTRAR</span>
                            <?php if(!$validar):?>
                                <a href="registro.php" class="btn btn-danger btn-sm">REGISTRAR</a>
                            <?php endif;?>    
                            
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
    $("#Ingresar").click(function(){
        vacio=validarFormularioVacio('frmlogin')
        if(vacio >0){
            alert("Debes llenar todos los datos ;)");
            return false;
        }
        datos=$("#frmlogin").serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:"Procesos/regLoguin/login.php",
            success:function(r){
                if(r==1){
                    window.location="views/inicio.php";
                }else{
                    alert("no se puedo acceder :'(");
                }
            }
        });
    }); 
})   
</script>