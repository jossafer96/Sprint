<?php
	
	
	$active_facturas="";
	$active_productos="active";
	$active_clientes="";
	$active_usuarios="";	
	$title="Productos | Tapices S. de R.L.";
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
				<button type='button' class="btn btn-info" data-toggle="modal" data-target="#nuevoProducto"><span class="glyphicon glyphicon-plus" ></span> Nuevo Producto</button>
			</div>
			<h4><i class='glyphicon glyphicon-search'></i> Buscar Productos</h4>
		</div>
		<div class="panel-body">
		
			
		
			<?php
			include("modal/registro_productos.php");
			include("modal/editar_productos.php");
			?>
			<form class="form-horizontal" role="form" id="datos_cotizacion">
				
						<div class="form-group row">
							<label for="q" class="col-md-2 control-label">Código o nombre</label>
							<div class="col-md-5">
								<input type="text" class="form-control" id="q" placeholder="Código o nombre del producto" onkeyup='load(1);'>
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
	<hr>
	<?php
	include("pie_pagina.php");
	?>
	
  </body>
</html>
