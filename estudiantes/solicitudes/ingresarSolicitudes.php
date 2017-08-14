<?php
include '../../BDconect.php';
$nombre= $_POST['nombre'];
$apellido= $_POST['apellido'];
$carrera= $_POST['carrera'];
$edad= $_POST['edad'];
$fecha= $_POST['fecha'];
$apellido= $_POST['apellido'];
$resumen= $_POST['resumen'];
$descripcion= $_POST['descripcion'];
$tipo = $_POST['tipo'];



$result = $mysqli->query("INSERT INTO solicitud (nombre_solicitante, apellido_solicitante, edad_solicitante, carrera_solicitante , resumen, descripcion) VALUES ('$nombre', '$apellido','$edad', '$carrera', '$resumen', '$descripcion')");
$lastid = mysqli_insert_id($mysqli);

$result3 = $mysqli->query("INSERT INTO estado_solicitud (nombre_estado, id_solicitud) VALUES ('Pendiente', '$lastid')");
$result4 = $mysqli->query("INSERT INTO tipo_solicitud (tipo_solicitud, id_solicitud) VALUES ('$tipo', '$lastid')");


?>
