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
    public function loginuser($datos){
        $con=new Conectar();
        $conexion=$con->conexion();

        $password =sha1($datos[1]);
        $_SESSION['usuario']=$datos[0];
        $_SESSION['iduser']=self::traeID($datos);

        $sql= "SELECT * FROM usuario WHERE email='$datos[0]' and  password='$password'";
        $resultado= mysqli_query($conexion,$sql);

        if(mysqli_num_rows($resultado)>0){
            return 1;
        }else{
            return 0;
        }
        
    }
    public function traeID($datos){
        $con =new Conectar();
        $conexion= $con->conexion();
        $password =sha1($datos[1]);
        $sql= "SELECT id_usuario FROM usuario WHERE email='$datos[0]' and  password='$password'";
        $resultado =mysqli_query($conexion,$sql);

        return mysqli_fetch_row($resultado)[0];
    }
}
?>