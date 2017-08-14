<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Universidad de los lagos</title>
    <!-- Bootstrap -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/inicio_sesion.css" rel="stylesheet" type="text/css">
	<!-- PARA EL ESTILO DEL MODAL -->
	<link rel="stylesheet" href="css/estudiantes/solicitudes.css">
	<!-- / PARA EL ESTILO DEL MODAL -->
  </head>
  <body>
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/bootstrap.js"></script>
  
  <!-- FORMULARIO DE ACCESO -->
  <div class="container-fluid">
	  <img src="img/logo_ulagos.png" alt="" width="226" height="98" class="logo_ulagos"/> 
	  <img src="img/iconos/usuario.png" width="30" height="30" alt="" class="logo_usuario"/>
	  <img src="img/iconos/contrasena.png" width="30" height="30" alt="" class="logo_contrasena"/>
	  <form class="form-signin" method="post" id="login-form">
		  <input name="mail" type="text" class="form-control usuario" id="usuario" placeholder="Correo Electrónico">
		  <input name="contrasena" type="text" class="form-control contrasena" id="contrasena" placeholder="********">
		  <button type="submit" class="btn btn-default"  name="btn-login" id="btn-login">
		  <span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
   		  </button> 
		  <div id="resp"></div>
	  </form>
	  <button name="registrarse" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Registrarse</button>
	  <!--<form action="estudiantes/es_principal.php">
	  	<button type="submit" class="btn btn-success">Ingresar</button>
	  </form>
	  <form action="estudiantes/es_principal.php">
	  	<button type="submit" class="btn btn-primary">Registrarse</button>
	  </form>-->
  </div>
    <!-- / FORMULARIO DE ACCESO -->
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
            	  <div class="well">1.- Rellene Formulario</div>
				  <span class="label label-default">RUT</span>
				  <input name="rut" type="text" class="form-control" id="rut">
				  <br>
				  <span class="label label-default">Nombre</span>
				  <input name="nombre" type="text" class="form-control" id="nombre">
				  <br>
				  <span class="label label-default">Apellido</span>
				  <input name="apellido" type="text" class="form-control" id="apellido">
				  <br>
				  <span class="label label-default">Correo Electrónico</span>
				  <input name="correo" type="text" class="form-control" id="correo_e">
				  <br>
				  <span class="label label-default">Edad</span>
				  <input name="edad" type="text" class="form-control" id="edad">
				  <br>
				  <span class="label label-default">Teléfono</span>
				  <input name="telefono" type="text" class="form-control" id="telefono">
				  <br>
				   <span class="label label-default">Password</span>
				  <input name="pass" type="text" class="form-control" id="pass">
				  <div class="modal-footer">
          		<input type="submit" class="btn btn-default" data-dismiss="modal" onclick="javascript:cargar();"></input>
        		</div>
		  </form>
        </div>
     
      </div>
      <!-- / MODAL CONTENIDO -->
              <script>
function cargar(){

    var url = "registrar.php";
    $.ajax({                        
       type: "POST",                 
       url: url,                     
       data: $("#formulario").serialize(), 
       success: function(data) {

    	   
           }            
      
   });
}
</script>

    </div>
</div>
<!-- / MODAL -->
<?php
session_start();
require_once 'dbconfig.php';

if(isset($_POST['btn-login']))
{
	$user_email = trim($_POST['mail']);
	$user_password = trim($_POST['contrasena']);
	
	//$password = md5($user_password);
	
	try
	{
		$stmt = $db_con->prepare("SELECT * From usuario u left join estudiante e on (u.`id_usuario` = e.`id_usuario`) where e.correo_personal = '$user_email'");
		$stmt2 = $db_con->prepare("SELECT * From usuario u left join administrador a on (u.`id_usuario` = a.`id_usuario`) where a.correo_electronico = '$user_email'");
		$stmt->execute();
		$stmt2->execute();
		$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
		$count2 = $stmt2->rowCount();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$count = $stmt->rowCount();
		if(($row['contrasena'] == $user_password) && ($row['tipo_usuario'] == 'estudiante' )){			
			echo '
			<script type="text/javascript">
			window.location="./estudiantes/es_principal.php";
			console.log(window.location);
			</script> '; 
			$_SESSION['user_session'] = $row['user_email'];
		}
		else if(($row2['contrasena'] == $user_password) && ($row2['tipo_usuario'] == 'administrador')){
			echo '
			<script type="text/javascript">
			window.location="./adm/ad_principal.php";
			console.log(window.location);
			</script> ';
			$_SESSION['user_session'] = $row2['user_email'];
		}else{
			echo "<script type='text/javascript'>alert('email or password aaaaadoes not exist.');</script>";
		}
		
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
}

?>
</body>
</html> 






