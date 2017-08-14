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
    //$dropdown.find(".ver").attr("href", "/transaction/pay?id="+id);
    //$dropdown.find(".eliminar").attr("href", "/transaction/delete?id="+id);
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
      <div class="panel-heading">Solicitudes enviadas</div>
      <div class="panel-body">Para modificar, eliminar o responder solicitud presionar en "DETALLE"</div>
</div>
<!-- / PANEL DE INFORMACION -->

<!-- BOTONES MODAL -->
<!--<button type="button" class="btn btn-warning botones">Modificar</button>
<button type="button" class="btn btn-danger botones">Eliminar</button>
<button type="button" class="btn btn-success botones">Enviar</button>
<!-- / BOTONES MODAL -->

<!-- MODAL -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- MODAL CONTENIDO-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Solicitud</h4>
        </div>
        
        <div class="modal-body">
       	  <form action="#">
		  </form>
        </div>
        <div class="modal-footer">
  
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
        <th>Usuario</th>
        <th>Tipo Solicitud</th>
        <th>Descripción</th>
        <th>Respuesta</th>
        <th>Acción</th>
       <!-- <th>Selecionar</th>-->
      </tr>
    </thead>
    <?php if(count($result) > 0):?> 
    	<?php for($i=0; $i < count($result); $i++):?>
    <tbody>
      <tr>
        <td><?php echo $result[$i]['nombre_solicitante'].' '.$result[$i]['apellido_solicitante']; ?></td>
        <td><?php echo $result[$i]['tipo_solicitud']; ?></td>
        <td><?php echo $result[$i]['descripcion']; ?></td>
        <td><?php echo $result[$i]['nombre_estado']; ?></td>
        <td class="dropdown"><a class="btn btn-default actionButton" data-toggle="dropdown" href="#"> Detalle </a></td>
        <!--<td><input type="checkbox" value=""></td>-->
      </tr>
    </tbody>
  </table>
<!-- / TABLA SOLICITUDES -->
 
 <!--  LISTA BOTON -->
 <div>
   <ul id="contextMenu" class="dropdown-menu" role="menu">
    <li><a tabindex="-1" href="#" class="responder" data-id=<?php echo $result[$i]['id_solicitud']; ?> onclick="javascript:respuesta($(this).data('id'));" data-toggle="modal" data-target="#myModal">Responder</a></li>
    <li><a tabindex="-1" href="#" class="modificar" data-toggle="modal" data-target="#myModal2" >Modificar</a></li>
    <li><a tabindex="-1" href="#" class="eliminar" >Eliminar</a></li>
  </ul>
 </div>
<!-- / LISTA BOTON -->
   	<?php  endfor; ?>
 <?php  endif; ?>


<script type="text/javascript">
function respuesta(id){

	var url = "respuesta.php?id=" + id;
    $.ajax({
		type: "GET",
		url: url,
		success: function(data) {
			console.log(data);

			$(".modal-body").html(data);
			$('#myModal').modal({
				keyboard: true
				
			});
		}
	});

}
</script>
        

<script src="../../js/jquery-1.11.3.min.js"></script> 
<script src="../../js/bootstrap.js"></script>



</body>
</html>
