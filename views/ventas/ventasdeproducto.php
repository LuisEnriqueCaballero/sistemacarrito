<?php
require_once '../../Clases/Conexion.php';
$con =new Conectar();
$conexion =$con->conexion();


?>

<h4>Vender un producto</h4>
<div class="row">
    <div class="col-sm-4">
        <form id="frmventasproductos">
            <label>Selecciona cliente</label>
            <select class="form-control input-sm" name="clienteventa" id="clienteventa">
            <option value="A">Selecciona</option>
                <?php 
                $sql ="SELECT id_cliente, nombre, apellido FROM clientes";
                $resultado= mysqli_query($conexion,$sql);

                while($cliente=mysqli_fetch_row($resultado)):
                ?>
                <option value="<?php echo $cliente[0];?>"><?php echo $cliente[2]." ".$cliente[1];?></option>
                <?php endwhile ;?>
            </select>
            <label>Producto</label>
            <select class="form-control input-sm" name="productoventa" id="productoventa">
                <option value="A">Selecciona</option>
                <?php 
                  $sql="SELECT id_producto,nombre FROM articulo";
                  $resultado=mysqli_query($conexion,$sql);

                  while($producto=mysqli_fetch_row($resultado)):
                ?>
                <option value="<?php echo $producto[0]?>"><?php echo $producto[1];?></option>
                <?php endwhile;?>
            </select>
            <label>Descripcion</label>
            <textarea id="descripcionV" name="descripcionV" class="form-control input-sm" readonly=""></textarea>
            <label>Cantidad</label>
            <input type="text" class="form-control input-sm" name="cantidadV" id="cantidadV" readonly="">
            <label>Precio</label>
            <input type="text" class="form-control input-sm" name="precioV" id="precioV" readonly="">
            <p></p>
            <span class="btn btn-primary" id="btnagregar">Agregar</span>
            <span class="btn btn-danger" id="btnvaciar">Vaciar</span>
        </form>
    </div>
    <div class="col-sm-3">
        <div id="imgProducto"></div>
    </div>
    <div class="col-sm-4">
        <div id="tablaVentaTempLoad"></div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaVentaTempLoad').load('ventas/tablaVentaTem.php');
        $('#productoventa').change(function(){
        $.ajax({
            type:"POST",
            data:'idproducto=' + $('#productoventa').val(),
            url:"../Procesos/ventas/llenarFormProducto.php",
            success:function(r){
                dato=jQuery.parseJSON(r);
                $('#descripcionV').val(dato['descripcion']);
                $('#cantidadV').val(dato['cantidad']);
                $('#precioV').val(dato['precio']);

                $('#imgProducto').prepend('<img class="img-img-thumbnail" id="imgp" src="'+dato['ruta']+'"/>');
            }
          });
        });
        $('#btnagregar').click(function(){
            vacios=validarFormularioVacio("frmventasproductos");
            if(vacios>0){
                alertify.alert("debes llenar todo el formulario");
                return false;
            }
            datos=$('#frmventasproductos').serialize(),
            $.ajax({
                type:'POST',
                data:datos,
                url:"../Procesos/ventas/agregaProductoTem.php",
                success:function(r){
                    $('#tablaVentaTempLoad').load('ventas/tablaVentaTem.php');
                }
            })
        });
        $('#btnvaciar').click(function(){
            $.ajax({
                url:"../Procesos/ventas/vaciarTemp.php",
                success:function(r){
                    $('#tablaVentaTempLoad').load('ventas/tablaVentaTem.php'); 
                }
            })
        });
    });
</script>
<script type="text/javascript">
    function quitarP(index){
        $.ajax({
            type:'POST',
            data:"ind="+index,
            url:"../Procesos/ventas/quitarProducto.php",
            success:function(r){
                $('#tablaVentaTempLoad').load('ventas/tablaVentaTem.php');
                alertify.success("se quito el producto");
            }
        })
    }
    function CrearVenta(){
        $.ajax({
            url:'../Procesos/ventas/CrearVentas.php',
            success:function(r){
                if(r >0){
                    $('#tablaVentaTempLoad').load('ventas/tablaVentaTem.php');
                    $('#frmventasproductos')[0].reset();
                    alertify.alert("Venta creada con exitos");
                }else if(r==0){
                    alertify.alert("No hay lista de venta");
                }else{
                    alertify.error("no se puedo crear la venta");
                }
            }
        })
    }
</script>
<script type="text/javascript"> 
    $(document).ready(function(){
        $("#clienteventa").select2();
        $("#productoventa").select2();
    })
</script>