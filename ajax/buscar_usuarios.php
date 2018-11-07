<?php


	require_once ("../config/db.php");
	require_once ("../config/conexion.php");
	include('is_logged.php');
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$user_id=intval($_GET['id']);
		
			if ($delete1=mysqli_query($con,"DELETE FROM users WHERE user_id='".$user_id."'")){
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Datos eliminados exitosamente.
			</div>
			<?php 
		}else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
			</div>
			<?php
			
		}
			
		
		
		
		
	}
	if($action == 'ajax'){
		
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		$sql="SELECT * FROM  users order by user_id desc LIMIT 0,10";
		$query = mysqli_query($con, $sql);
		
		if (10>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="info">
					<th>ID</th>
					<th>Nombres</th>
					<th>Usuario</th>
					<th>Email</th>
					<th>Agregado</th>
					<th><span class="pull-right">Acciones</span></th>
					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$user_id=$row['user_id'];
						$fullname=$row['firstname']." ".$row["lastname"];
						$user_name=$row['user_name'];
						$user_email=$row['user_email'];
						$date_added= date('d/m/Y', strtotime($row['date_added']));
						
					?>
					
					<input type="hidden" value="<?php echo $row['firstname'];?>" id="nombres<?php echo $user_id;?>">
					<input type="hidden" value="<?php echo $row['lastname'];?>" id="apellidos<?php echo $user_id;?>">
					<input type="hidden" value="<?php echo $user_name;?>" id="usuario<?php echo $user_id;?>">
					<input type="hidden" value="<?php echo $user_email;?>" id="email<?php echo $user_id;?>">
				
					<tr>
						<td><?php echo $user_id; ?></td>
						<td><?php echo $fullname; ?></td>
						<td ><?php echo $user_name; ?></td>
						<td ><?php echo $user_email; ?></td>
						<td><?php echo $date_added;?></td>
						
					<td ><span class="pull-right">
					<a href="#" class='btn btn-default' title='Editar usuario' onclick="obtener_datos('<?php echo $user_id;?>');" data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-edit"></i></a> 
					<a href="#" class='btn btn-default' title='Cambiar contraseña' onclick="get_user_id('<?php echo $user_id;?>');" data-toggle="modal" data-target="#myModal3"><i class="glyphicon glyphicon-cog"></i></a>
					<a href="#" class='btn btn-default' title='Borrar usuario' onclick="eliminar('<?php echo $user_id; ?>')"><i class="glyphicon glyphicon-trash"></i> </a></span></td>
						
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=9><span class="pull-right"></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>