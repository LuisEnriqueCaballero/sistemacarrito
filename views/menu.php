<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ALMACEN Y VENTA</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <?php 
    require_once "dependencia.php"
    ?>
  </head>
  <body>
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
  </body>
</html>
<script type="text/javascript">
    $(window).scroll(function() {
    if ($(document).scrollTop() > 150) {
        alert('hi');
    $('.logo').height(200);

    }
    else {
    $('.logo').height(100);}
    });
</script>
