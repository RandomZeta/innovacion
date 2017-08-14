<?php
include '../../BDconect.php';
$sql = "SELECT * FROM `solicitud` s join `tipo_solicitud` t  on (s.`id_solicitud` = t.`id_solicitud`) join `estado_solicitud` e  on (e.`id_solicitud` = t.`id_solicitud`) where s.`id_solicitud` = ". $_GET['id']." ORDER BY s.`fecha_emision` ASC";
//SELECT * FROM `solicitud` s join `tipo_solicitud` t  on (s.`id_solicitud` = t.`id_solicitud`) where s.`id_solicitud` = "14" ORDER BY s.`fecha_emision` ASC
$stmt = $db->prepare($sql);
$stmt->execute();
// $stmtImage->execute();
// $resultImage = $stmtImage->fetch();
$result = $stmt->fetchAll();

//echo '{"infoTotal":"' . trim(preg_replace('/\s+/', ' ', nl2br($result['infoTotal']))). '","image1":"' . $result['image1'] . '","image2":"' . $result['image2'] . '","image3":"' . $result['image3'] . '","image4":"' . $result['image4'] . '","fecha":"' . $result['fecha']. '","titulo":"' . $result['titulo']. '"}';

echo '
 <div class="modal-body">
  	  <div class="well">1.- Identificación del estudiante</div>
				  <span class="label label-default">Nombre</span>
                  
				  <input type="text" class="form-control" value="'.$result[0]['nombre_solicitante'].' '.$result[0]['apellido_solicitante']; echo '" readonly>
				  <br>
				  <span class="label label-default">Edad</span>
		
				  <input type="text" class="form-control" value="'.$result[0]['edad_solicitante']; echo '" readonly>
				  <br>
				  <span class="label label-default">Carrera</span>
	
				  <input type="text" class="form-control" value="'.$result[0]['carrera_solicitante']; echo'" readonly>
				  <br>
				  <span class="label label-default">Fecha</span>
			
				  <input type="text" class="form-control" value="'.$result[0]['fecha_emision']; echo '" readonly>
				  <br>
				  <span class="label label-default">Tipo Solicitud</span>
					<input type="text" class="form-control" value="'.$result[0]['tipo_solicitud']; echo '" readonly>
				  <br>
				  <div class="well">2.- Resumen</div>
				  <input class="form-control" rows="1" value="'.$result[0]['resumen'];echo '" readonly></input>
				  <br>
				  <div class="well">3.- Descripción</div>
				  <input class="form-control" rows="5" value="'.$result[0]['descripcion']; echo '" readonly></input>
				  <br>
 				 <div class="well respuesta">4.- Respuesta</div>
				  <br>
				  <textarea name="respuesta" class="form-control" rows="5" id="respuesta"></textarea>
</div>
	<div class="modal-footer">
<button name="enviar" type="button" class="btn btn-default" data-dismiss="modal">Enviar</button>
	</div>


';

$respuesta = $_POST['respuesta'];
$boton = $_POST['enviar'];
if (isset($boton)){
$sql2 = "UPDATE solicitud SET `respuesta` = '.$respuesta .' WHERE id_solicitud =". $_GET['id']."";
//SELECT * FROM `solicitud` s join `tipo_solicitud` t  on (s.`id_solicitud` = t.`id_solicitud`) where s.`id_solicitud` = "14" ORDER BY s.`fecha_emision` ASC
$stmt2 = $db->prepare($sql2);
$stmt2->execute();
// $stmtImage->execute();
// $resultImage = $stmtImage->fetch();
}

