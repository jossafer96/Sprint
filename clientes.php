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
	$active_clientes="active";
	$active_usuarios="";	
	$title="Clientes | Tapices S. de R.L.";
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
				<button type='button' class="btn btn-info" data-toggle="modal" data-target="#nuevoCliente"><span class="glyphicon glyphicon-plus" ></span> Nuevo Cliente</button>
			</div>
			<h4><i class='glyphicon glyphicon-search'></i> Clientes Registrados</h4>
		</div>
		<div class="panel-body">
		
			
			
			<?php
				include("modal/registro_clientes.php");
				include("modal/editar_clientes.php");
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
