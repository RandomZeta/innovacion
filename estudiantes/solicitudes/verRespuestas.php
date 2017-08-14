<?php

include '../../BDconect.php';
$sql = "SELECT * FROM `solicitud` s join `tipo_solicitud` t  on (s.`id_solicitud` = t.`id_solicitud`) where s.`id_solicitud` = ". $_GET['id']." ORDER BY s.`fecha_emision` ASC";
//SELECT * FROM `solicitud` s join `tipo_solicitud` t  on (s.`id_solicitud` = t.`id_solicitud`) where s.`id_solicitud` = "14" ORDER BY s.`fecha_emision` ASC
$stmt = $db->prepare($sql);
$stmt->execute();
// $stmtImage->execute();
// $resultImage = $stmtImage->fetch();
$result = $stmt->fetchAll();

//echo '{"infoTotal":"' . trim(preg_replace('/\s+/', ' ', nl2br($result['infoTotal']))). '","image1":"' . $result['image1'] . '","image2":"' . $result['image2'] . '","image3":"' . $result['image3'] . '","image4":"' . $result['image4'] . '","fecha":"' . $result['fecha']. '","titulo":"' . $result['titulo']. '"}';
echo '
<div id="seccion-1" class="container py-4">
	<div class="row">
		<div class="col-12 pb-0 ver-mas text-right"></div>
	</div>
	<div class="row">
		<div class="col-12 pb-3">
			
		</div>
	</div>
	<div class="row">
		<!-- intro1: introducción 1 columna-->
		<div id="intro-1" class="col-12  pb-3 pb-md-0 ">
			<p class="text-justify mensaje-noticia">'.trim(preg_replace('/\s+/', ' ', nl2br($result[0]['respuesta']))).'</p>
		</div>
		<!-- fin intro1:  introducción 1 columna-->
		<!-- galeria 2: galería 2 columnas-->

	</div>
</div>';


?>