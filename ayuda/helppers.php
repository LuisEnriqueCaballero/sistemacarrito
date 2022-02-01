
<!-- MENU -->
<!-- https://bootsnipp.com/snippets/Kr5yV -->
<!-- https://getbootstrap.com/docs/3.3/components/ iconos componentes--> 
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

<!-- Begin Navbar -->
<div id="nav">
  <div class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="100">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img class="img-responsive logo" src="../img/logo.png" alt="" width="150px" height="150px"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#">Home</a>
            </li>
            <li><a href="#about">About</a>
            </li>
            <li><a href="#contact">Contact</a>
            </li>
          </ul>
        </div>
        <!--/.nav-collapse -->
      </div>
      <!--/.contatiner -->
</div>
</div>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    
    <!-- /container -->        

    