<?php
require_once "../../Clases/Conexion.php";
require_once "../../Clases/Usuarios.php";

$Usuarios =new Usuarios();

   $pass =sha1($_POST['password']);
   $datos=array(
       $_POST['nombre'],
       $_POST['apellido'],
       $_POST['usuario'],
       $pass
   );

  echo $Usuarios->registroUsuario($datos);

?>