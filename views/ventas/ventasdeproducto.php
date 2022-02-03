<h4>Vender un producto</h4>
<div class="row">
    <div class="col-sm-4">
        <form id="frmventasproductos">
            <label>Selecciona cliente</label>
            <select class="form-control input-sm" name="clienteventa" id="clienteventa">
                <option value="A">Selecciona</option>
            </select>
            <label>Producto</label>
            <select class="form-control input-sm" name="productoventa" id="productoventa">
                <option value="A">Selecciona</option>
            </select>
            <label>Descripcion</label>
            <textarea id="" name="" class="form-control input-sm"></textarea>
            <label>Cantidad</label>
            <input type="text" class="form-control input-sm" name="" id="">
            <label>Precio</label>
            <input type="text" class="form-control input-sm" name="" id="">
            <p></p>
            <span class="btn btn-primary" id="btnagregar">Agregar</span>
            <span class="btn btn-danger" id="btnvaciar">Vaciar</span>
        </form>
    </div>
</div>
<script type="text/javascript"> 
    $(document).ready(function(){
        $("#clienteventa").select2();
        $("#productoventa").select2();
    })
</script>