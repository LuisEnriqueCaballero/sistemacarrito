<?php
require_once "../../Clases/Conexion.php";
require_once "../../Clases/Usuarios.php";

$Usuario = new Usuarios();

echo $Usuario->EliminaUsuario($_POST['idusuario']);
?>