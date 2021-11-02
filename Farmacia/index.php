<?php
$alumno="Luis Rodrigo Puma Herencia";
$titulopag="Inkafarma";
$titulo="Inkafarma";
//BOTONES
$iniciarSesion="<h3>Iniciar Sesión</h3>";
$administrador="Administrador";
$usEstandar="Usuario Estandar";
$txtbtnes=array("btn1"=>"Iniciar Sesión", "btn2"=>"Administrador", "btn3"=>"Usuario Estandar", "btn4"=>"Registre su tienda",
				"btn5"=>"¿Olvido Su contraseña?");
//FECHA 
$fechanno=date('Y');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $titulopag;?></title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link rel="icon" href="favicon.png">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>
				<a class="brand" href="#"><?php echo $titulo;?></a>
				<div class="nav-collapse collapse navbar-inverse-collapse">
				
					<ul class="nav pull-right">

						<li><a href="register-shop.php">
							<?php echo $txtbtnes["btn4"];?>
						</a></li>

						

						<li><a href="reset-password.php">
							<?php echo $txtbtnes["btn5"];?>
						</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>



	<div class="wrapper" style="background-image: url(images/Fondo1.jpg);">
		<div class="container" >
			<div class="row">
				<div class="module module-login span4 offset4">
					<form class="form-vertical" action="action/login.php" method="POST">
						<div class="module-head">
							<p><?php echo $txtbtnes["btn1"];?></p>
						</div>

						<div class="module-body">
								<?php
								if(isset($_GET['err'])) {
									print '
									<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert">×</button>
										'.$_GET['err'].' 
									</div>
									';
								}else{
									
								}
								
								if(isset($_GET['in'])) {
									print '
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										'.$_GET['in'].' 
									</div>
									';
								}else{
									
								}
								?>
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="text" id="inputEmail" placeholder="Nombre de Usuario" name="username" required>
								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="password" id="inputPassword" placeholder="Contraseña" name="password" required>
								</div>
							</div>
							
													<div class="control-group">
								<div class="controls row-fluid">
								<select name="role" class="span12">
								<option value="shops"><?php echo $txtbtnes["btn2"];?></option>
								<option value="users"><?php echo $txtbtnes["btn3"];?></option>
								</select>
								
								</div>
							</div>
						</div>
						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
									<button type="submit" class="btn btn-primary pull-right"><?php echo $txtbtnes["btn1"];?></button>
								
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="footer">
		<div class="container">
			<b class="copyright">&copy; <?php echo $fechanno ?> Tienda Touka - Modificado por <a target="_blank" href="https://www.facebook.com/profile.php?id=100012306482797"><?php echo $alumno;?></a></b> Todos los Derechos Reservados.
		</div>
	</div>
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>