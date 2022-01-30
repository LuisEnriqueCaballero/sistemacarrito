<?php
class Usuarios{
    public function registroUsuario($datos){
        $con =new Conectar();
        $conexion =$con->conexion();

        $fecha =date("Y-m-d");
        $sql = "INSERT INTO usuario (nombre,
                            apellido,
                            email,
                            password,
                            fechaCaptura)
                            VALUES ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$fecha')";
                        
        return mysqli_query($conexion,$sql);                
                            
    }
}
?>