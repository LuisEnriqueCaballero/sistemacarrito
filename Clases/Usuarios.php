<?php
class Usuarios{
    public function registroUsuario(){
        $con =new Conectar();
        $conexion =$con->conexion();

        $fecha =date("Y-m-d");
        $sql = "INSERT INTO (nombre,
                            apellido,
                            email,
                            password,
                            fechaCaptura)
                            VALUES ()";
                            
    }
}
?>