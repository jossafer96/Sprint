<?php

	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }

     require_once ("config/db.php");
	require_once ("config/conexion.php");
	$active_facturas="active";
	$active_productos="";
	$active_clientes="";
	if ($_SESSION['user_id']==16){
                        $active_usuarios='';
                        $click='';
                      } else {
                       $active_usuarios='disabled';
                       $click='noclick';
                      }	
	$title="Nueva Factura | Tapices S. de R.L.";
	
?>
<!DOCTYPE html>
<html lang="en" >
  <head>
    <?php include("cabecera.php");?>
     <title><?php echo $title;?></title>
  </head>
  <body >
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
				<a  href="nueva_factura.php" class="btn btn-info"><span class="glyphicon glyphicon-plus" ></span> Nueva Factura</a>
			</div>
			<h4><i class='glyphicon glyphicon-search'></i> Buscar Facturas</h4>
		</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" id="datos_cotizacion">
				
						<div class="form-group row">
							<label for="q" class="col-md-2 control-label">Cliente o # de factura</label>
							<div class="col-md-5">
								<input type="text" class="form-control" id="q" placeholder="Nombre del cliente o # de factura" onkeyup='load(1);'>
							</div>
							
							
							
							<div class="col-md-3">
								<button type="button" class="btn btn-default" onclick='load(1);'>
									<span class="glyphicon glyphicon-search" ></span> Buscar</button>
								<span id="loader"></span>
							</div>
							
						</div>
				
				
				
			</form>
				<div id="resultados"></div><!-- Carga los datos ajax -->
				<div class='outer_div'></div><!-- Carga los datos ajax -->
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
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/clock.js"></script>
	
	<script type="text/javascript" src="js/controlador.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	
	<script type="text/javascript" src="js/facturas.js"></script>
  </body>
</html>