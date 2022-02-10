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
    public function obtenDatosUsuarios($idusuario){
        $con =new Conectar();
        $conexion = $con->conexion();

        $sql ="SELECT id_usuario, nombre, apellido,email FROM usuario WHERE id_usuario='$idusuario'";
        $resultado=mysqli_query($conexion,$sql);
        $ver=mysqli_fetch_row($resultado);

        $datos=array(
                     'id_usuario'=>$ver[0],
                     'nombre'=>$ver[1],
                     'apellido'=>$ver[2],
                     'email'=>$ver[3]
        );
        return $datos;
    }
    public function Actualizardatos($datos){
        $con = new Conectar();
        $conexion = $con->conexion();

        $sql="UPDATE usuario SET nombre='$datos[1]',apellido='$datos[2]', email='$datos[3]' WHERE id_usuario='$datos[0]'";
        return mysqli_query($conexion,$sql);
    }

    public function EliminaUsuario($idusuarios){
        $con= new Conectar();
        $conexion = $con->conexion();

        $sql= "DELETE FROM usuario WHERE id_usuario='$idusuarios'";

        return mysqli_query($conexion,$sql);
    }
}
?>