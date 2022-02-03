<?php
     session_start();
     if(isset($_SESSION['usuario'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Inicio</title>
    <?php
    require_once "menu.php";
    ?>
</head>
<body>
    <div class="container">
        <h1>Ventas de productos</h1>
        <div class="row">
            <div class="col-sm-12">
                <span class="btn btn-default" id="ventaProductosbtn">Vender Producto</span>
                <span class="btn btn-default" id="ventaHechasbtn">Ventas hechas</span>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div id="ventasProductos"></div>
                <div id="ventashechas"></div>
            </div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        
        $("#ventaProductosbtn").click(function(){
            esconderseccionventa();
            $("#ventasProductos").load("ventas/ventasdeproducto.php");
            $("#ventasProductos").show();

        });
        $("#ventaHechasbtn").click(function(){
            esconderseccionventa();
            $("#ventashechas").load("ventas/ventashechas.php");
            $("#ventashechas").show();
        });
    });
    function esconderseccionventa(){
        $("#ventasProductos").hide();
        $("#ventashechas").hide();
    };
</script>
<?php
}else{
    header('location:../index.php');
}
?>