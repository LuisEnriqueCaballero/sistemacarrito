<script type="text/javascript">
    // script para evento click y ajax
    $('#').click(function(){
        datos=$('#').serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:"../Procesos",
            success:function(r){

            }
        })
    });

    function validarFormularioVacio(formulario){
        datos=$('#' + formulario).serialize();
        d=datos.split('&');
        vacios=0;
        for(i=0; i<=d.length ;i++){
            controles=d[i].split("=");
            if(controles[1]=="A" || controles[1]== ""){
                vacios++;
            }
        }
        return vacios;
    }
</script>/>