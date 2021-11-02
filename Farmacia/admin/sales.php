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
$titulopag="Ventas";
$titulo="Inkafarma";
$tituloModulo="Ventas";
//BOTONES
$txtbtnes=array("btn1"=>"Ajustes de la Cuenta", "btn2"=>"Cerrar Sesión");
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
                            while ($variable < 2) {
                            echo $sidebar;
                            $variable++; 
                            } 
                        ?>
                    </div>
            
                    <div class="span9">
                        <div class="content">
                            <div class="module">
                                <div class="module-head">
                                    <h3><?php echo $tituloModulo;?></h3>
                                </div>
						                                <div class="module-body table">
                                 <?php
								 include '../config/db_config.php';
								 
								 $sql = "SELECT * FROM sales WHERE shop = '$SEshopno'";
                                 $result = $conn->query($sql);

                                 if ($result->num_rows > 0) {
									 print '
									  <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>
                                                    ID de Venta
                                                </th>
                                                <th>
                                                    Nombre de Producto
                                                </th>
                                                <th>
                                                    Precio
                                                </th>
                                                <th>
                                                    Cantidad
                                                </th>
												<th>
                                                    Total
                                                </th>
												<th>
                                                    Fecha
                                                </th>
                                                <th>
                                                    Opcion
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>';
    
                                  while($row = $result->fetch_assoc()) {
									
                               print '<tr class="odd gradeX">
                                                <td>
                                                    '.$row['oid'].'
                                                </td>
                                                <td>
                                                    '.$row['product_name'].'
                                                </td>
                                                <td>
                                                    '.number_format($row['price']).' PEN
                                                </td>
                                                <td class="center">
                                                   '.$row['amount'].' '.$row['unit'].'
                                                </td>
												<td>
                                                   '.number_format($row['total']).' PEN
                                                </td>
												<td>
                                                  '.$row['date'].'
                                                </td>
                                                <td class="center">
                                                <a href="action/delete-sales.php?ref='.$row['sales_id'].'&sh='.$row['shop'].'&am='.$row['amount'].'&pr='.$row['product_name'].'" ';?> onclick="return confirm('¿Estas seguro de elminar el producto <?php echo $row['product_name']; ?> ?')" <?php print ' class="btn btn-small btn-danger">Delete</a>
                                                </td>
                                            </tr>';
                                    }
                                    } else {
                                    print '
									<div class="module-body">
                                 <div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<h3 style="color:green">No se encontraron ventas!</h3>
										Todos los productos vendidos en su tienda se mostrarán aquí.
									</div>
									</div>';
                                       }
									   
									   print ' </tbody>
                                
                                    </table>';
                                     $conn->close();
								 ?>
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
