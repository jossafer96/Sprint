<?php
	
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }

	require_once ("config/db.php");
	require_once ("config/conexion.php");
	$active_facturas="";
	$active_productos="";
	$active_clientes="";
	$active_usuarios="active";	
	$title="Usuarios | Tapices S. de R.L.";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<?php include("cabecera.php");?>
  </head>
  <body>
 	<?php
	include("barra_navegacion.php");
	?> 
    <div class="container">
		<div class="panel panel-info">
		<div class="panel-heading">
		    <div class="btn-group pull-right">
				<button type='button' class="btn btn-info" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" ></span> Nuevo Usuario</button>
			</div>
			<h4><i class='glyphicon glyphicon-search'></i> Usuarios Registrados</h4>
		</div>			
			<div class="panel-body">
			<?php
			include("modal/registro_usuarios.php");
			include("modal/editar_usuarios.php");
			include("modal/cambiar_password.php");
			?>
			
				<div id="resultados"></div>
				<div class='outer_div'></div>
						
			</div>
		</div>

	</div>
	<hr>
	<?php
	include("pie_pagina.php");
	?>
  </body>
</html>
