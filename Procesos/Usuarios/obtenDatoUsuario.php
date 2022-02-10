<?php

require_once '../../Clases/Conexion.php';
require_once '../../Clases/Usuarios.php';

$usuario = new Usuarios();

echo json_encode($usuario->obtenDatosUsuarios($_POST['idusuario']));

?>