<?php
class categorias{
    public function agregaCategoria($datos){
        $con =new Conectar();
        $conexion =$con->conexion();
        
        $sql = "INSERT INTO categoria(id_usuario,
                                    nombreCategoria,
                                     fechaCaptura)
                                     VALUES('$datos[0]',
                                     '$datos[1]',
                                     '$datos[2]')";

         return mysqli_query($conexion, $sql);                            
    }

    public function actualizarCategoria($datos){
        $con =new Conectar();
        $conexion =$con->conexion();

        $sql = "UPDATE categoria SET nombreCategoria='$datos[1]' WHERE id_categoria='$datos[0]'";

        echo mysqli_query($conexion,$sql);
    }
}
?>