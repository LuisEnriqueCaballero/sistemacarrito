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

    public function inserteArticulo($datos){
        $con =new Conectar();
        $conexion= $con->conexion();

        $fecha = date("Y-m-d");
        $sql="INSERT INTO articulo    (id_categoria,
                                       id_imagen,
                                       id_usuario,
                                           nombre,
                                        descripcion,
                                        cantidad,
                                        precio,
                                        fechaCaptura) VALUES
                                        ('$datos[0]',
                                         '$datos[1]',
                                         '$datos[2]',
                                         '$datos[3]',
                                         '$datos[4]',
                                         '$datos[5]',
                                         '$datos[6]',
                                          '$fecha')";
        return mysqli_query($conexion,$sql);
    }

    public function obtenDatosArticulo($idarticulo){
        $con =new Conectar();
        $conexion =$con->conexion();

        $sql="SELECT id_producto,id_categoria,nombre,descripcion,cantidad,precio FROM articulo 
        WHERE id_producto='$idarticulo'"; 
        $resultado =mysqli_query($conexion,$sql);

        $ver = mysqli_fetch_row($resultado);

        $datos =array(
            "id_producto"=>$ver[0],
            "id_categoria"=>$ver[1],
            "nombre"=>$ver[2],
            "descripcion"=>$ver[3],
            "cantidad"=>$ver[4],
            "precio"=>$ver[5]
        );
        return $datos;
    }
    public function ActualizarArticulo($datos){
        $con = new Conectar();
        $conexion = $con->conexion();
        
        $sql = "UPDATE articulo SET id_categoria='$datos[1]',
                                    nombre='$datos[2]',
                                    descripcion='$datos[3]',
                                    cantidad='$datos[4]',
                                    precio='$datos[5]' 
                                    WHERE id_producto='$datos[0]'";

        return mysqli_query($conexion,$sql);
    }
    public function eliminarArticulo($idarticulo){
        $con =new Conectar();
        $conexion = $con->conexion();

        $imagen = self::obtenImagen($idarticulo);

        $sql="DELETE FROM articulo WHERE id_producto='$idarticulo'";

        $resultado= mysqli_query($conexion,$sql);

        if($resultado){
            $ruta= self::obtenRutaImagen($imagen);
            $sql="DELETE FROM imagenes WHERE id_imagen='$imagen'";

            $resultado = mysqli_query($conexion,$sql);
            if($resultado){
                if(unlink($ruta)){//unlink nos sirve para limpiar archivos
                    return 1;
                }
            }
        }
    }

    public function obtenImagen($idProducto){
        $con =new Conectar();
        $conexion =$con->conexion();

        $sql="SELECT id_imagen FROM articulo WHERE id_producto='$idProducto'";

        $resultado = mysqli_query($conexion,$sql);
        return mysqli_fetch_row($resultado)[0];
    }

    public function obtenRutaImagen($idImg){
        $con = new Conectar();
        $conexion = $con->conexion();

        $sql= "SELECT ruta FROM imagenes WHERE id_imagen='$idImg'";
        
        $resultado= mysqli_query($conexion,$sql);
        return mysqli_fetch_row($resultado)[0];
    }
}
?>