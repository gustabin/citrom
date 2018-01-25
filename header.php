<!DOCTYPE html>
<html>
<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<title>Citrom, c.a.</title>		
		<meta name="keywords" content="pastillas de frenos" />
		<meta name="description" content="pastillas de freno, embragues, discos de freno, tambores de freno">
		<meta name="author" content="Ing Gustavo Arias">

				<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
 
		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="vendor/bootstrap/bootstrap.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.css">
		<link rel="stylesheet" href="vendor/owlcarousel/owl.carousel.css" media="screen">
		<link rel="stylesheet" href="vendor/owlcarousel/owl.theme.css" media="screen">
		<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.css" media="screen">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="css/theme.css">
		<link rel="stylesheet" href="css/theme-elements.css">
		<link rel="stylesheet" href="css/theme-blog.css">
		<link rel="stylesheet" href="css/theme-shop.css">
		<link rel="stylesheet" href="css/theme-animate.css">

		<!-- Skin CSS -->
		<link rel="stylesheet" href="css/skins/default.css">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="css/custom.css">
		<style type="text/css">
		body {
	background-image: url(img/fondo.jpg);
}
        </style>

		<!-- Head Libs -->
		<script src="vendor/modernizr/modernizr.js"></script>

		<!--[if IE]>
			<link rel="stylesheet" href="css/ie.css">
		<![endif]-->

		<!--[if lte IE 8]>
			<script src="vendor/respond/respond.js"></script>
			<script src="vendor/excanvas/excanvas.js"></script>
		<![endif]-->

	</head>
	<body>


		<div class="body">
			<header id="header">
            		<div align="center">					
<img src="img/header.jpg" class="img-responsive" alt="Citrom, c.a." width="1000" height="158" data-sticky-width="1000" data-sticky-height="158">
					</div>
                   

		
				<div class="container">
					
					<nav>
						<ul class="nav nav-pills">
                        	<?php
                            if ($_SESSION['$usuario']==3) {?>
                            <li>
								<a href="categorias.php"><i class="icon-sort-by-attributes"></i> Categorias</a>
							</li>
                        	<li>
								<a href="productos.php"><i class="fa fa-list-alt"></i> Inventario</a>
							</li>
                            <li>
								<a href="listaProductos.php"><i class="fa fa-file-text-o"></i> Lista de precios</a>
							</li>
                            <li>
								<a href="cambioPrecios.php"><i class="fa fa-indent"></i> Cambios de precios</a>
							</li>
							<?php }?>
							
							<li>
								<a href="micuenta.php"><i class="fa fa-phone"></i>(0243) 218-42-82</a>
							</li>
                             <?php if (!empty($_SESSION['nombre'])) { 	?>								
								<li><a href="micuenta.php"><i class="fa fa-user"></i>&nbsp;<?php echo $_SESSION['nombre'] ." ". $_SESSION['apellido']?></a></li>
						  <?php		}	?>
                          <li><a href="index.php">Productos</a></li>
								<li>
                                <?php if (!empty($_SESSION['nombre'])) { ?>
                                	<a href="logout.php">Logout</a>
                                <?php }else { ?> 
									<a href="login.php">Login</a>
                                <?php } ?>
								</li>	
                                <nav class="nav-main mega-menu">                       
								<ul class="nav nav-pills nav-main" id="mainMenu">                           
                                    <?php if (empty($_SESSION['cantidadDeProductos'])) {
										$_SESSION['cantidadDeProductos']=0;}?>
								
                                	<?php if (empty($_SESSION['cantidadDeProductos'])) { ?>
                                    <li class="mega-menu-shop">
                                        <a class="dropdown-toggle mobile-redirect" href="shop-cart.php">
                                            <i class="fa fa-shopping-cart"></i> Carro (<?php echo $_SESSION['cantidadDeProductos']?>)
                                            <i class="fa fa-angle-down"></i>
                                        </a>    
                                    </li>
									<?php }	?>
                                    <?php if (!empty($_SESSION['cantidadDeProductos'])) {
                                            ?>
                                    <li class="dropdown mega-menu-item mega-menu-shop">
                                        <a class="dropdown-toggle mobile-redirect" href="shop-cart.php">
                                            <i class="fa fa-shopping-cart"></i> Carro (<?php echo $_SESSION['cantidadDeProductos']?>)
                                            <i class="fa fa-angle-down"></i>
                                        </a>                                    
									<ul class="dropdown-menu">
										<li>
											<div class="mega-menu-content">
												<div class="row">
													<div class="col-md-12">
														<table cellspacing="0" class="cart">
															<tbody><?php
														error_reporting(0);
														require_once('tools/mypathdb.php');
														$email = $_SESSION['email'];
														$consulta_mysql=("SELECT * FROM tbl_temporal WHERE email='".$email."'");
														$resultado_consulta_mysql=mysql_query($consulta_mysql,$dbConn);
														while($fila=mysql_fetch_array($resultado_consulta_mysql))
															{
															$codigoProducto= $fila["codigoProducto"];
															$query = mysql_query("SELECT * FROM tbl_productos WHERE codigo = '$codigoProducto'"); 
															$dataProducto = mysql_fetch_array($query);	
															$foto = $dataProducto['foto'];  // foto del empaque	 
															$producto = $dataProducto['producto']; 
															$precio = $dataProducto['precio']; 	
															?>
															<tr>
                                                                <td class="product-thumbnail">
                                                                    <a href="descripcion.php?codProducto=<?php echo $codigoProducto ?>">
                                                                        <img width="100" height="100" alt="" class="img-responsive" src="img/products/<?php echo $foto?>">
                                                                    </a>
                                                                </td>
                                                                <td class="product-name">
                                                                    <a href="descripcion.php?codProducto=<?php echo $codigoProducto ?>"><?php echo $producto?><br><span class="amount">																	<strong><?php echo $precio?></strong></span></a>
                                                                </td>
                                                                <td class="product-actions">
                                                                    <a title="Eliminar este producto" class="remove" href="eliminarItem.php?codProducto=<?php echo $codigoProducto ?>">
                                                                        <i class="fa fa-times"></i>
                                                                    </a>
                                                                </td>
                                                                    </tr>
                                                                    <tr>
                                                                     <?php
                                                                }
                                                                ?>
                                                                <td class="product-actions" colspan="6">
                                                                    <div class="actions-continue"> 
                                                                    <a href="shop-cart.php"><input type="submit" value="Ver todo" class="btn btn-lg"></a>															
                                                                    </div>
                                                                </td>
															</tr>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</li>
                                <?php	}	?>
                                
							</ul>
						</nav>
						</ul>
                        
					</nav>
					<button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
						<i class="fa fa-bars"></i>
					</button>
				</div>
				<div class="navbar-collapse nav-main-collapse collapse">
				  <div class="container">
						
					</div>
				</div>
			</header>