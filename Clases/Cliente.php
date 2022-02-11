<?php
 class Cliente{
     public function RegristraCliente($datos){
         $con =new Conectar();
         $conexion =$con->conexion();

         $idusuario= $_SESSION['iduser'];

         $sql ="INSERT INTO clientes(id_usuario,nombre,apellido,direccion,email,telefono,rfc)
         VALUES('$idusuario','$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]')";
         return mysqli_query($conexion,$sql);
     }
     public function ObtendatosCliente($idcliente){
         $con =new Conectar();
         $conexion = $con->conexion();

         $sql="SELECT id_cliente,nombre,apellido,direccion,email,telefono,rfc FROM clientes WHERE id_cliente='$idcliente'";

         $resultado= mysqli_query($conexion,$sql);
         $ver=mysqli_fetch_row($resultado);

         $datos=array(
                      'id_cliente'=>$ver[0],
                      'nombre'=>$ver[1],
                      'apellido'=>$ver[2],
                      'direccion'=>$ver[3],
                      'email'=>$ver[4],
                      'telefono'=>$ver[5],
                      'rfc'=>$ver[6]
                     
         );
         return $datos;
     }
     public function Actualizarcliente($datos){
             $con =new Conectar();
             $conexion = $con->conexion();

             $sql="UPDATE clientes SET nombre='$datos[1]',apellido='$datos[2]',direccion='$datos[3]',
             email='$datos[4]',telefono='$datos[5]',rfc='$datos[6]' WHERE id_cliente='$datos[0]'";

             return mysqli_query($conexion,$sql);
    }
    public function EliminarCliente($idcliente){
        $con =new Conectar();
        $conexion = $con->conexion();

        $sql= "DELETE FROM clientes WHERE id_cliente='$idcliente'";

        return mysqli_query($conexion,$sql);
    }
 }
?>