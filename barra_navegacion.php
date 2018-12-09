	<?php
  if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
    exit;
        }          
                  
		if (isset($title))
		{
	?>
<nav class="navbar navbar-default header" style="border-radius: 0;margin-bottom: 0;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Tapices S. de R.L. </a>
      <img id="logo-barra-navegacion" class="img img-responsive" src="img/logo1.png" alt="Logo" style="heig">
    </div>

    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="<?php echo $active_facturas;?>"><a href="facturas.php"><i class='glyphicon glyphicon-list-alt'></i> Facturas <span class="sr-only">(current)</span></a></li>
        <li class="<?php echo $active_productos;?>"><a href="inventario.php"><i class='glyphicon glyphicon-barcode'></i> Inventario</a></li>
		<li class="<?php echo $active_clientes;?>"><a href="clientes.php"><i class='glyphicon glyphicon-user'></i> Clientes</a></li>
		<li class="<?php echo $active_usuarios;?>"><a href="usuarios.php" class="<?php echo $click;?>"><i  class='glyphicon glyphicon-lock'></i> Usuarios</a></li>
       </ul>
      <ul class="nav navbar-nav navbar-right">

        <p id="my-clock" style="color: white;color: white;margin-top: 0px;margin-right: 10px;"></p>
        <p id="my-date" style="float: left;color: white;margin-right: 150px;margin-top: 10px;"></p>
  
        <li><h4 style="font-size: 25px;color: white;">
          <?php
                    $sql_vendedor=mysqli_query($con,"select * from users order by lastname");
                    while ($rw=mysqli_fetch_array($sql_vendedor)){
                      $id_vendedor=$rw["user_id"];
                      $nombre_vendedor=$rw["firstname"]." ".$rw["lastname"];
                      if ($id_vendedor==$_SESSION['user_id']){
                        echo $nombre_vendedor;
                      } else {
                       echo "";
                      }
                      ?>
                      
                      <?php
                    }
                  ?></h4></li>
		<li><a href="login.php?logout"><i class='glyphicon glyphicon-off'></i> Salir</a></li>
      </ul>
    </div>
  </div>
</nav>
	<?php
		}
	?>