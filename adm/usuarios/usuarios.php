<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Universidad de los lagos - Estudiantes</title>

<!-- LIBRERIA PARA EL BOTON DETALLE -->
<script type='text/javascript' src='http://code.jquery.com/jquery-2.0.2.js'></script>

<!-- Bootstrap -->
<link rel="stylesheet" href="../../css/bootstrap.css">
<link rel="stylesheet" href="../../css/estudiantes/solicitudes.css">

<!-- SCRIPT BONTON "DETALLE" -->
<script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){
// guarda el selector para que no tengas que hacer la búsqueda cada vez
$dropdown = $("#contextMenu");
$(".actionButton").click(function() {
    //Obtiene id de la fila
    var id = $(this).closest("tr").children().first().html();
    //move dropdown menu
    $(this).after($dropdown);
    //Actualiza los link
    //$dropdown.find(".modificar_us").attr("href", "/transaction/pay?id="+id);
    //$dropdown.find(".eliminar_us").attr("href", "/transaction/delete?id="+id);
    //Muestra lista
    $(this).dropdown();
});
});//]]>  
</script>
<!-- / SCRIPT BONTON "DETALLE" -->


</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid"> 
    <div class="navbar-header">
    <img src="../../img/logo_ulagos.png" width="150" height="50" alt=""/> </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">Comunidad Estudiantes <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../ad_principal.php">Noticias destacadas</a> </li>
            <li><a href="#">Becas y créditos</a> </li>
            <li><a href="#">Universidad</a> </li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Link separado</a> </li>
          </ul>
          <li><a href="../historial_solicitudes/historial_solicitudes.php">Historial solicitudes</a> </li>
          <li><a href="../datos_personales/datos_personales.php">Datos Personales</a> </li>
          <li><a href="../usuarios/usuarios.php">Usuarios</a> </li>
          <li><a href="../index.php">Cerrar sesión</a> </li>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">

<!-- PANEL DE INFORMACION -->
<div class="panel panel-info">
      <div class="panel-heading">Usuarios Administradores</div>
      <div class="panel-body">Los usuarios administradores son los encargados de responder solicitudes emitidas por estudiantes.</div>
</div>
<!-- / PANEL DE INFORMACION -->

<!-- BOTONES MODAL -->
<button type="button" class="btn btn-primary botones" data-toggle="modal" data-target="#myModal">Agregar</button>
<!--<button type="button" class="btn btn-warning botones">Modificar</button>
<button type="button" class="btn btn-danger botones">Eliminar</button>-->
<!-- / BOTONES MODAL -->

<!-- MODAL -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- MODAL CONTENIDO-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nuevo usuario</h4>
        </div>
        
        <div class="modal-body">
       	  <form action="#">
            	  <div class="well">1.- Identificación del usuario</div>
				  <span class="label label-default">Nombre</span>
				  <input type="text" class="form-control" id="nombre">
				  <br>
				  <span class="label label-default">Correo electrónico</span>
				  <input type="text" class="form-control" id="correo_electronico">
				  <br>
				  <div class="well">2.- Asignar contraseña</div>
				  <span class="label label-default">Contraseña</span>
				  <input type="text" class="form-control" id="nombre">
				  <br>
				  <span class="label label-default">Repetir contraseña</span>
				  <input type="text" class="form-control" id="correo_electronico">
				  <br>
		  </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Enviar</button>
        </div>
      </div>
      <!-- / MODAL CONTENIDO -->
      
    </div>
</div>
<!-- / MODAL -->

<!-- TABLA SOLICITUDES -->
<table class="table table-hover">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Correo Electrónico</th>
        <th>Acción</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Administrador 1</td>
        <td>Correo electrónico 1</td>
        <td class="dropdown"><a class="btn btn-default actionButton"
          data-toggle="dropdown" href="#"> Detalle </a></td>
      </tr>
      <tr>
        <td>Administrador 2</td>
        <td>Correo electrónico 2</td>
        <td class="dropdown"><a class="btn btn-default actionButton"
          data-toggle="dropdown" href="#"> Detalle </a></td>
      </tr>
      <tr>
        <td>Administrador n</td>
        <td>Correo electrónico n</td>
        <td class="dropdown"><a class="btn btn-default actionButton"
          data-toggle="dropdown" href="#"> Detalle </a></td>
      </tr>
    </tbody>
  </table>
<!-- / TABLA SOLICITUDES -->
 
 <!--  LISTA BOTON -->
   <ul id="contextMenu" class="dropdown-menu" role="menu">
    <li><a tabindex="-1" href="#" class="modificar_us">Modificar</a></li>
    <li><a tabindex="-1" href="#" class="eliminar_us" >Eliminar</a></li>
  </ul>
<!-- / LISTA BOTON -->
  
</div>

<script src="../../js/jquery-1.11.3.min.js"></script> 
<script src="../../js/bootstrap.js"></script>
</body>
</html>
