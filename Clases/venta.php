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
    public function crearVenta(){
        $con=new Conectar();
        $conexion =$con->conexion();
        $fecha =date('Y-m-d');
        $idventa=self::creaFolio();
        $usuario=$_SESSION['iduser'];
        $datos=$_SESSION['tablaComprasTemp'];

        $r=0;
        
        for ($i=0; $i < count($datos); $i++) { 
            $d=explode('||',$datos[$i]);
            $sql="INSERT INTO ventas (id_venta,id_cliente,id_producto,id_usuario,precio,fechaCompra	)
            VALUES('$idventa','$d[5]','$d[0]','$usuario','$d[3]','$fecha')";

            $r= $r + $resulta=mysqli_query($conexion,$sql);
        }
        return $r;
    }
    public function creaFolio(){
        $con=new Conectar();
        $conexion =$con->conexion();
        $sql="SELECT id_venta FROM ventas GROUP BY id_venta desc";
        $resultado=mysqli_query($conexion,$sql);
        $id=mysqli_fetch_row($resultado)[0];
      
        if($id=="" or $id==null or $id==0){
          return 1;
        }else{
          return $id +1;
        }
      }
}
?>