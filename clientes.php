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
	if ($_SESSION['user_id']==16){
                        $active_usuarios='';
                        $click='';
                      } else {
                       $active_usuarios='disabled';
                       $click='noclick';
                      }		
	$title="Clientes | Tapices S. de R.L.";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("cabecera.php");?>
    <title><?php echo $title;?></title>
  </head>
  <body>
	<?php
	include("barra_navegacion.php");
	?>
	<div class="canvas-wrap">
  		<canvas id="canvas"></canvas>
	</div>
    <div class="container">
	<div class="panel panel-info">
		<div class="panel-heading" style="background-color: #2980b9;color: white">
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
			<form class="form-horizontal" role="form" id="datos_cotizacion">
				
						<div class="form-group row">
							<label for="q" class="col-md-2 control-label">Cliente</label>
							<div class="col-md-5">
								<input type="text" class="form-control" id="q" placeholder="Nombre del cliente" onkeyup='load(1);'>
							</div>
							<div class="col-md-3">
								<button type="button" class="btn btn-default" onclick='load(1);'>
									<span class="glyphicon glyphicon-search" ></span> Buscar</button>
								<span id="loader"></span>
							</div>
							
						</div>
				
				
				
			</form>
			
				<div id="resultados"></div>
				<div class='outer_div'></div>
			
		
	
			
			
			
  </div>
</div>
		 
	</div>
	<ul class="circles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
            </ul>
	<?php
	include("pie_pagina.php");
	?>
	<script type="text/javascript" src="js/clientes.js"></script>
	<script type="text/javascript" src="js/controlador.js"></script>
	<script type="text/javascript" src="js/clock.js"></script>
  </body>
</html>
