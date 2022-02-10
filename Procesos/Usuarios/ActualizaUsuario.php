<?php
require_once "../../Clases/Conexion.php";
require_once "../../Clases/Usuarios.php";

$Usuario = new Usuarios();
 $datos =array(
                $_POST['idUsuario'],
                $_POST['nombreu'],
                $_POST['apellidou'], 
                $_POST['usuariou'], 
 );
 echo $Usuario->Actualizardatos($datos);
?>