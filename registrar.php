<?php
include 'BDconect.php';

$rut= $_POST['rut'];
$nombre= $_POST['nombre'];
$apellido= $_POST['apellido'];
$correo= $_POST['correo'];
$edad= $_POST['edad'];
$telefono= $_POST['telefono'];
$pass= $_POST['pass'];

	$result2 = $mysqli->query("INSERT INTO usuario (tipo_usuario, contrasena) VALUES ('$usuario', '$pass')");
	$lastid = mysqli_insert_id($mysqli);
	
	$result = $mysqli->query("INSERT INTO estudiante (rut, nombre, apellido, correo_personal, edad, telefono, id_usuario) VALUES ('$rut', '$nombre', '$apellido', '$correo', '$edad', '$telefono', '$lastid')");
	

?>