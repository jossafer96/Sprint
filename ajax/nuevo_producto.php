<?php
include('is_logged.php');
	
		require_once ("../config/db.php");
		require_once ("../config/conexion.php");

		$codigo=mysqli_real_escape_string($con,(strip_tags($_POST["codigo"],ENT_QUOTES)));
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$estado=intval($_POST['estado']);
		$precio_venta=floatval($_POST['precio']);
		$date_added=date("Y-m-d H:i:s");
		$sql="INSERT INTO products (codigo_producto, nombre_producto, status_producto, date_added, precio_producto) VALUES ('$codigo','$nombre','$estado','$date_added','$precio_venta')";
		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert) {
                        $messages[] = "Producto añadido con éxito.";
                    } else {
                        $errors[] = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.";
                    }
                
            
    
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

		
?>		
		