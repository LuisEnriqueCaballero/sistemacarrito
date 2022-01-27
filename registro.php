<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Libreria/bootstrap/css/bootstrap.css">
    <script src="Libreria/jquery/jquery-3.6.0.min.js"></script>
    <title>REGISTRARSE</title>
</head>
<body>
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
                        <form action="" class="frmlogin">
                            <label for="">NOMBRE</label>
                            <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="INGRESAR NOMBRE">
                            <label for="">APELLIDO</label>
                            <input type="text" name="apellido" id="apellido" class="form-control input-sm" placeholder="INGRESAR APELLIDO">
                            <label for="">EMAIL</label>
                            <input type="email" name="correo" id="correo" class="form-control input-sm" placeholder="INGRESAR SU CORREO">
                            <label for="">CONTRASEÑA</label>
                            <input type="password" name="contraseña" id="contraseña" class="form-control input-sm" placeholder="INGRESAR SU CONTRASEÑA">
                            <p></p>
                            <span class="btn btn-success ">REGISTRARSE</span>
                            <br>
                            <a href="index.php" class="btn btn-danger float-end">LOGIN</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>