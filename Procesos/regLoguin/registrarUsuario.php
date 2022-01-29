<?php
require_once "../../Clases/Conexion.php";
require_once "../../Clases/Usuarios.php";

$Usuarios =new Usuarios();


   $nombre=$_POST['nombre'];
   $apellido=$_POST['apellido'];
   $correo=$_POST['correo'];
   $password=$_POST['password'];
?>