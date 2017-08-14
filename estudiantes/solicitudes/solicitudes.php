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
    //$dropdown.find(".ver_sol").attr("href", "/transaction/pay?id="+id);
    //$dropdown.find(".eliminar_sol").attr("href", "/transaction/delete?id="+id);
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
        <li class="dropdown"> <a href="../es_principal.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">Comunidad Estudiantes <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../es_principal.php">Noticias destacadas</a> </li>
            <li><a href="#">Becas y créditos</a> </li>
            <li><a href="#">Universidad</a> </li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Link separado</a> </li>
          </ul>
          <li><a href="solicitudes.php">Solicitudes</a> </li>
          <li><a href="../datos_personales/datos_personales.php">Datos Personales</a> </li>
          <li><a href="../../index.php">Cerrar sesión</a> </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">

<!-- PANEL DE INFORMACION -->
<div class="panel panel-info">
      <div class="panel-heading">Solicitudes enviadas</div>
      <div class="panel-body">Para ver o eliminar solicitud presionar en "DETALLE"</div>
</div>
<!-- / PANEL DE INFORMACION -->

<!-- BOTONES MODAL -->
<button type="button" class="btn btn-primary botones" data-toggle="modal" data-target="#myModal">Agregar</button>
<!-- / BOTONES MODAL -->

<!-- MODAL -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- MODAL CONTENIDO-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Formulario Solicitud</h4>
        </div>
        
        <div class="modal-body">
       	  <form method="post" id="formulario">
            	  <div class="well">1.- Identificación del estudiante</div>
				  <span class="label label-default">Nombre</span>
				  <input name="nombre" type="text" class="form-control" id="nombre">
				  <br>
				  <span class="label label-default">Apellido</span>
				  <input name="apellido" type="text" class="form-control" id="apellido">
				  <br>
				  <span class="label label-default">Edad</span>
				  <input name="edad" type="text" class="form-control" id="edad">
				  <br>
				  <span class="label label-default">Carrera</span>
				  <input name="carrera" type="text" class="form-control" id="carrera">
				  <br>
				  <span class="label label-default">Fecha</span>
				  <input  name="fecha" type="text" class="form-control" id="fecha_emision">
				  <br>
				  <span class="label label-default">Tipo Solicitud</span>
				  <select name="tipo" class="form-control" id="tipo_solicitud">
					<option value="Consulta">Consulta</option>
					<option value="Queja">Queja</option>
					<option value="Sugerencia">Sugerencia</option>
					<option value="Otro">Otro</option>
				  </select>
				  <br>
				  <div class="well">2.- Resumen</div>
				  <textarea name="resumen" class="form-control" rows="1" id="resumen"></textarea>
				  <br>
				  <div class="well">3.- Descripción</div>
				  <textarea name="descripcion" class="form-control" rows="5" id="descripcion"></textarea>
		  </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="javascript:cargar();">Enviar</button>
        </div>
      </div>
      <!-- / MODAL CONTENIDO -->
      
    </div>
</div>
<!-- / MODAL -->
<?php

include '../../BDconect.php';
$sql = "SELECT * FROM `solicitud` s join `tipo_solicitud` t  on (s.`id_solicitud` = t.`id_solicitud`) join `estado_solicitud` e  on (e.`id_solicitud` = t.`id_solicitud`)  ORDER BY s.`fecha_emision` ASC";

$stmt = $db->prepare($sql);
$stmt->execute();
// $stmtImage->execute();
// $resultImage = $stmtImage->fetch();
$result = $stmt->fetchAll();

?>
<!-- TABLA SOLICITUDES -->
<table class="table table-hover">
    <thead>
      <tr>
        <th>Resumen</th>
        <th>Tipo Solicitud</th>
        <th>Estado Solicitud</th>
        <th>Acción</th>
      </tr>
    </thead>
    <?php if(count($result) > 0):?> 
    <tbody>
    	<?php for($i=0; $i < count($result); $i++):?>
      <tr>
       	 <td><?php echo $result[$i]['resumen']; ?></td>
       	 <td><?php echo $result[$i]['tipo_solicitud']; ?></td>
         <td><?php echo $result[$i]['nombre_estado']; ?></td>
         <td><a class="btn btn-default actionButton" data-id=<?php echo $result[$i]['id_solicitud']; ?> onclick="javascript:respuesta($(this).data('id'));"> Ver Respuesta </a></td>
      </tr>
      	<?php  endfor; ?>
    </tbody>
 
  </table>
<!-- / TABLA SOLICITUDES -->
	 <?php  endif; ?>
</div>

<script src="../../js/jquery-1.11.3.min.js"></script> 
<script src="../../js/bootstrap.js"></script>
 <script>
function cargar(){

    var url = "ingresarSolicitudes.php";
    $.ajax({                        
       type: "POST",                 
       url: url,                     
       data: $("#formulario").serialize(), 
       success: function(data) {
   
           }            
      
   });
}
function respuesta(id){

	var url = "verRespuestas.php?id=" + id;
    $.ajax({
		type: "GET",
		url: url,
		success: function(data) {
			console.log(data);

			$(".modal-body2").html(data);
			$('#myModal2').modal({
				keyboard: true
				
			});
		}
	});

}

</script>
<div class="modal fade" id="myModal2" role="dialog">
	<div class="modal-dialog modal-lg">
		<!-- MODAL CONTENIDO-->
		<div class="noticias modal-content">
			<div class="modal-header2">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title2">Respuesta a solicitud</h4>
				<input type="hidden" name="bookId" id="bookId" value="" />
			</div>
			<div class="modal-body2">
				<!-- fin sección 1 -->
				<!-- sección 2 -->
				<!-- fin sección 3 -->
			</div>
			<div class="modal-footer2">
          <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
        </div>
      </div>
		</div>
		<!-- / MODAL CONTENIDO -->
	</div>
</div>
</body>
</html>

