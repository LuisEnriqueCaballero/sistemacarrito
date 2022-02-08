<?php
class Articulos{
    public function agregarImagen($datos){
        $con = new Conectar();
        $conexion = $con->conexion();

        $fecha=date("Y-m-d");
        $sql = "INSERT INTO imagenes (id_categoria,nombre,ruta,fechaSubida) 
        VALUES ('$datos[0]','$datos[1]','$datos[2]','$fecha')";

        $resultado =mysqli_query($conexion, $sql);

        return mysqli_insert_id($conexion);
    }
}
?>