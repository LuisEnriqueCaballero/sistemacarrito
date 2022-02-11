<?php
class Venta{
    public function obtendatosPorducto($idproducto){
        $con =new Conectar();
        $conexion = $con->conexion();

        $sql="SELECT art.nombre, art.descripcion, art.cantidad, img.ruta, art.precio FROM articulo AS art 
              INNER JOIN imagenes AS img 
              ON art.id_imagen=img.id_imagen
              AND art.id_producto='$idproducto'";
        $resultado=mysqli_query($conexion,$sql);
        $ver=mysqli_fetch_row($resultado);
        
        $d=explode('/',$ver[3]);
        $img=$d[1].'/'.$d[2].'/'.$d[3];

        
        $datos=array(
            'nombre'=>$ver[0],
            'descripcion'=>$ver[1],
            'cantidad'=>$ver[2],
            'ruta'=>$img,
            'precio'=>$ver[4]
        );
        return $datos;
    }
}
?>