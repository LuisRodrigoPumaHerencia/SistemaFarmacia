<?php
$sidebar=
'
<div class="sidebar">
    <ul class="widget widget-menu unstyled">
        <li><a href="index.php"><i class="menu-icon icon-money"></i> Nueva Venta</a></li>
        <li><a href="sales.php"><i class="menu-icon icon-money"></i> Ventas </a></li>
    </ul>

    <ul class="widget widget-menu unstyled">
        <li><a href="product_categories.php"><i class="menu-icon icon-filter"></i> Categorias de Producto</a></li>
        <li><a href="product_units.php"><i class="menu-icon icon-glass"></i> Unidad de Productos </a></li>
    </ul>
    <ul class="widget widget-menu unstyled">
        <li><a href="my_users.php"><i class="menu-icon icon-user"></i> Usuarios </a></li>
    </ul>
</div>
';
$alumno="Luis Rodrigo Puma Herencia";
$titulopag="Ajustes Cuenta";
$titulo="Inkafarma";
$tituloModulo="Ajustes Cuenta";
//BOTONES
$txtbtnes=array("btn1"=>"Ajustes de la Cuenta", "btn2"=>"Cerrar Sesión");
//FECHA 
$fechanno=date('Y');
?>
<!DOCTYPE html>
<html lang="en">
<?php
error_reporting(0);
include 'action/check-login2.php';

?>
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $titulopag;?></title>
        <link type="text/css" href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="../css/theme.css" rel="stylesheet">
        <link type="text/css" href="../images/icons/css/font-awesome.css" rel="stylesheet">
		<link rel="icon" href="../images/icon.png">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="#"><?php echo $titulo;?></a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <form class="navbar-search pull-left input-append" action="action/search_product.php" method="POST">
                        <input type="text" class="span3" placeholder="Search for product....." name="product" required>
                        <button class="btn" type="submit">
                            <i class="icon-search"></i>
                        </button>
                        </form>
                        <ul class="nav pull-right">
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<?php
			                if ($SEavator == null){
								print '<img src="../images/'.$SEgender.'.png" class="nav-avatar" />';
							}else{
								print '<img src="data:image/jpeg;base64,'.base64_encode($SEavator ).'"  class="nav-avatar"/>';
							}
							?>
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="account_settings.php"><?php echo $txtbtnes["btn1"];?></a></li>
                                    <li class="divider"></li>
                                    <li><a href="logout.php"><?php echo $txtbtnes["btn2"];?></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                
                </div>
            </div>
     
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <?php
                        $variable=1;
                        if($variable==1){
                            echo $sidebar;
                        }
                        else{
                            echo "Variable $variable incorrecta";
                        }
                        ?>
                    </div>
            
                    <div class="span9">
                        <div class="content">

       
                            <div class="module">
                                      <div class="module-body">
                                <div class="profile-head media">
                                    <a href="#" class="media-avatar pull-left">
																<?php
			                if ($SEavator == null){
								print '<img src="../images/'.$SEgender.'.png"/>';
							}else{
								print '<img src="data:image/jpeg;base64,'.base64_encode($SEavator ).'"/>';
							}
							?>
                                     
                                    </a>
                                    <div class="media-body">
                                        <h4>
                                            <?PHP echo"$SEfullname";?> , <?php echo "$SEuserid"; ?>
                                        </h4>
                                        <p class="profile-brief">
                                        La configuración de actualización requerirá que cierre la sesión para que se realicen los cambios.
                                        </p>
                                        <div class="profile-details muted">
										<form action="action/new-dp.php" method="POST" enctype="multipart/form-data">
										<input type="file" name="f1" required>
                                         <button type="submit"><i class="icon-refresh"></i> Actualizar foto de perfil </a></button>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                <ul class="profile-tab nav nav-tabs">
                                    <li class="active"><a href="#activity" data-toggle="tab">Datos Generales</a></li>
                                    <li><a href="#friends" data-toggle="tab">Contraseña</a></li>
                                </ul>
                                <div class="profile-tab-content tab-content">
                                    <div class="tab-pane fade active in" id="activity">
                                        <div class="stream-list">
                       
                                        <form class="form-horizontal row-fluid">

										<div class="control-group">
											<label class="control-label" for="basicinput">Nombres Completos</label>
											<div class="controls">
												<input type="text" id="basicinput" placeholder="You can't type something here..." class="span8" value="<?php echo"$SEfullname"; ?>" disabled="">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Correo Electrónico</label>
											<div class="controls">
												<input type="text" id="basicinput" placeholder="You can't type something here..." class="span8" value="<?php echo"$SEemail"; ?>" disabled="">
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="basicinput">Género</label>
											<div class="controls">
												<input type="text" id="basicinput" placeholder="You can't type something here..." class="span8" value="<?php echo"$SEgender"; ?>" disabled="">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Numero de Teléfono</label>
											<div class="controls">
												<input type="text" id="basicinput" placeholder="You can't type something here..." class="span8" value="<?php echo"$SEphone"; ?>" disabled="">
											</div>
										</div>
										
										<div class="control-group">
						
										</div>
									</form>
                                        </div>
                                        <!--/.stream-list-->
                                    </div>
                                    <div class="tab-pane fade" id="friends">
                                                           
                                        <form class="form-horizontal row-fluid" action="action/new-password.php" method="POST">

										<div class="control-group">
											<label class="control-label" for="basicinput">Nueva Contraseña</label>
											<div class="controls">
												<input type="password" id="password" class="span8" name="pas1" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Confirma Nueva Contraseña</label>
											<div class="controls">
												<input type="password" id="confirm_password" class="span8" name="pas2" required>
											</div>
										</div>
																<script>
	var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
			
										<br>
										<div class="control-group">
						                      <div class="controls">
												<button type="submit" class="btn">Actualizar Contraseña</button>
											</div>
										</div>
									</form>

                                    </div>
                                </div>
                            </div>
					
                            </div>


                       
                        </div>
                 
                    </div>
    
                </div>
            </div>
   
        </div>

        <div class="footer">
            <div class="container">
            <b class="copyright">&copy; <?php echo date('Y') ?> Tienda Inkafarma - Modificado por <a target="_blank" href="https://www.facebook.com/profile.php?id=100012306482797">Luis Rodrigo Puma Herencia</a></b> Todos los Derechos Reservados
            </div>
        </div>
        <script src="../scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="../scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="../scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="../scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../scripts/common.js" type="text/javascript"></script>
      
    </body>
