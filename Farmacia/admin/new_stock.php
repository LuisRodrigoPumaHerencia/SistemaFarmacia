<?php
$sidebar=
'
<div class="sidebar">
    <ul class="widget widget-menu unstyled">
        <li class="active"><a href="./"><i class="menu-icon icon-dashboard"></i> Tablero
        </a></li>
        <li><a href="new_stock.php"><i class="menu-icon icon-shopping-cart"></i> Nuevo Stock</a>
        </li>
        <li><a href="stock_list.php"><i class="menu-icon icon-shopping-cart"></i> Lista de Stocks</a></li>
        <li><a href="barcodes.php"><i class="menu-icon icon-barcode"></i> Generar Código de Barras</a></li>
    </ul>

    <ul class="widget widget-menu unstyled">
        <li><a href="product_categories.php"><i class="menu-icon icon-filter"></i> Categoria de Productos</a></li>
        <li><a href="product_units.php"><i class="menu-icon icon-glass"></i> Unidad de Productos </a></li>
    </ul>
    
    <ul class="widget widget-menu unstyled">
        <li><a href="new_user.php"><i class="menu-icon icon-user"></i> Nuevo Usuario </a></li>
        <li><a href="my_users.php"><i class="menu-icon icon-user"></i> Usuarios </a></li>
    </ul>
    
    <ul class="widget widget-menu unstyled">
        <li><a href="add_sales.php"><i class="menu-icon icon-money"></i> Nuevas Ventas</a></li>
        <li><a href="sales.php"><i class="menu-icon icon-money"></i> Ventas </a></li>
        <li><a href="sales_summary.php"><i class="menu-icon icon-bar-chart"></i>Resumen de Ventas</a></li>
    </ul>

</div>
';
$alumno="Luis Rodrigo Puma Herencia";
$titulopag="Stock";
$titulo="Inkafarma";
$tituloModulo="Nuevo Stock";
//BOTONES
$txtbtnes=array("btn1"=>"Ajustes de la Cuenta", "btn2"=>"Cerrar Sesión", "btn3"=>"Agregar Stock", "btn4"=>"Restablecer Formulario");
//FECHA 
$fechanno=date('Y');
?>
<!DOCTYPE html>
<html lang="en">
<?php
include 'action/check-login.php';
error_reporting(0);
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
                        <i class="icon-reorder shaded"></i></a+
                        ><a class="brand" href="#"><?php echo $titulo;?></a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                                               <form class="navbar-search pull-left input-append" action="action/search_product.php" method="POST">
                        <input type="text" class="span3" placeholder="Buscar un producto....." name="product" required>
                        <button class="btn" type="submit">
                            <i class="icon-search"></i>
                        </button>
                        </form>
                        <ul class="nav pull-right">
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<?php
							if ($SEshoplogo == null) {
								print '<img src="../images/shop.png" class="nav-avatar" />';
							}else{
						      print '<img src="data:image/jpeg;base64,'.base64_encode($SEshoplogo ).'"  class="nav-avatar"/>';
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
                        for ($i=0;$i<$variable;$i++){
                           echo $sidebar;
                        }
                        ?> 
                        
                    </div>
                    <div class="span9">
                        <div class="content">

       
                            <div class="module">
                                <div class="module-head">
                                    <h3><?php echo $tituloModulo;?></h3>
                                </div>
								<div class="module-body">
								<?php
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
                                 <form class="form-horizontal row-fluid" action="action/new-stock.php" method="POST">
										<div class="control-group">
											<label class="control-label" for="basicinput">Nombre del Producto</label>
											<div class="controls">
												<input type="text" id="basicinput" placeholder="Nombre del Producto..." name="product" required class="span8">
												
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Precio de Compra</label>
											<div class="controls">
												<div class="input-append">
													<input type="number" placeholder="Precio de Compra" name="buyingprice" required class="span8"><span class="add-on">PEN</span>
				                                 
												</div>

											</div>
										</div>
										
																				<div class="control-group">
											<label class="control-label" for="basicinput">Precio de venta</label>
											<div class="controls">
												<div class="input-append">
													<input type="number" placeholder="Precio de venta" name="sellingprice"  required class="span8"><span class="add-on">PEN</span>
				                                 
												</div>

											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="basicinput">Nivel de stock bajo</label>
											<div class="controls">
												<input type="number" id="basicinput" placeholder="Nivel de stock bajo..." name="stocklevel" required class="span8">
												
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Stock de apertura</label>
											<div class="controls">
												<input type="number" placeholder="Stock de apertura…" name="stock" required class="span8 tip">
											</div>
										</div>
										
																				<div class="control-group">
											<label class="control-label" for="basicinput">Código de barras</label>
											<div class="controls">
												<input type="text" placeholder="Código de barras…" name="barcode" required class="span8 tip">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Categoria de Producto</label>
											<div class="controls">
												<select tabindex="1" data-placeholder="Select here.." name="productcategory" class="span8">
													<option value="">Seleccione uno..</option>
													<?php
													include '../config/db_config.php';
													$sql = "SELECT * FROM product_categories WHERE shop = '$SEshopno' or shop = 'ALL' ORDER BY name";
                                                    $result = $conn->query($sql);

                                                    if ($result->num_rows > 0) {

                                                    while($row = $result->fetch_assoc()) {
                                                     print '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                                                       }
                                                     } else {

                                                     }
                                                     $conn->close();
													?>
												</select>
											</div>
										</div>
										
										
										<div class="control-group">
											<label class="control-label" for="basicinput">Unidad de producto</label>
											<div class="controls">
												<select tabindex="1" data-placeholder="Select here.." name="productunit" required class="span8">
													<option value="">Seleccione uno..</option>
                                                     <?php
													include '../config/db_config.php';
													$sql = "SELECT * FROM product_units WHERE shop = '$SEshopno' or shop = 'ALL' ORDER BY name";
                                                    $result = $conn->query($sql);

                                                    if ($result->num_rows > 0) {

                                                    while($row = $result->fetch_assoc()) {
                                                     print '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                                                       }
                                                     } else {

                                                     }
                                                     $conn->close();
													?>
												</select>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Fecha de Caducidad</label>
											<div class="controls">
												  <select tabindex="1" data-placeholder="Select here.." name="date" required class="span2">
													<option value="">Dia</option>
													<?php 
                                                    $x = 1; 

                                                    while($x <= 31) {
                                         
												     if ($x < 10) {
														   $x = "0$x";
													 print '<option value="'.$x.'">'.$x.'</option>';
													   }else{
													 print '<option value="'.$x.'">'.$x.'</option>';
													   }
                                                    $x++;
                                                      } 
                                                        ?>
													</select>
													
													<select tabindex="1" data-placeholder="Select here.." name="month" required class="span2">
													<option value="">Mes</option>
													<?php 
                                                    $x = 1; 

                                                    while($x <= 12) {
                                                       if ($x < 10) {
														   $x = "0$x";
													 print '<option value="'.$x.'">'.$x.'</option>';
													   }else{
													 print '<option value="'.$x.'">'.$x.'</option>';
													   }
													   
                                                    $x++;
                                                      } 
                                                        ?>
													</select>
													
													<select tabindex="1" data-placeholder="Select here.." name="year" class="span2">
													<option value="">Año</option>
													<?php 
                                                    $x = date('Y'); 
                                                    $yr = 20;
													$y2 = $x + $yr;
                                                    while($x <= $y2) {
                                         
													 print '<option value="'.$x.'">'.$x.'</option>';
                                                    $x++;
                                                      } 
                                                        ?>
													</select>
											</div>
										</div>
										

										<div class="control-group">
											<div class="controls">
												<button type="submit" class="btn"><?php echo $txtbtnes["btn3"];?></button>
												<button type="reset" class="btn"><?php echo $txtbtnes["btn4"];?></button>
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
