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
 
		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">
        
        <!-- Vendor CSS -->
        
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.css">
		<link rel="stylesheet" href="vendor/owlcarousel/owl.carousel.css" media="screen">
		<link rel="stylesheet" href="vendor/owlcarousel/owl.theme.css" media="screen">
		<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.css" media="screen">
        
        <link rel="stylesheet" href="css/theme.css">
		<link rel="stylesheet" href="css/theme-elements.css">
		<link rel="stylesheet" href="css/theme-blog.css">
		<link rel="stylesheet" href="css/theme-shop.css">
		<link rel="stylesheet" href="css/theme-animate.css">
        
  <link href="css/style-t12.css" rel="stylesheet">
  
  <link href="ico/favicon.ico" rel="shortcut icon">
  <link href="ico/apple-touch-icon.html" rel="apple-touch-icon">
  <link href="ico/apple-touch-icon-72x72.html" rel="apple-touch-icon" sizes="72x72">
  <link href="ico/apple-touch-icon-114x114.html" rel="apple-touch-icon" sizes="114x114">
  <link href="css/jquery-ui.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="css/jquery.ui.datepicker.css" rel="stylesheet" media="screen" />
  <link href="css/jquery.ui.core.css" rel="stylesheet" media="screen" />
  <link href="css/jquery.ui.theme.css" rel="stylesheet" media="screen" />
  

  <!-- .................................... $scripts .................................... -->
  <script type="text/javascript" language="javascript" src="js/jquery.js"></script>
  <script type="text/javascript" language="javascript" src="js/jquery-ui.js"></script>
 

  <script data-require="jquery@*" data-semver="2.0.3" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
  <script src="js/modernizr.min.js"></script>


  <script data-require="bootstrap@*" data-semver="3.1.1" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.hoverdir.min.js"></script>
  <script src="js/jquery.isotope.min.js"></script>
  <script src="js/jquery.masonry.min.js"></script>
  <script src="js/jquery.fitvids.min.js"></script>
  <script src="js/jquery.flexslider.min.js"></script>
  <!--script src="<?php// echo INCLUDES ?>js/script.js"></script!--> 
  

  <script type="text/javascript" language="javascript" src="js/jquery.validate.js"></script>
  <script type="text/JavaScript" language="javascript" src="js/jquery.ui.core.js"></script>
  <script type="text/JavaScript" language="javascript" src="js/jquery.ui.widget.js"></script>
  <script type="text/JavaScript" language="javascript" src="js/jquery.maskedinput.js"></script>	 
  
  <script type="text/javascript" src="js/jquery.tablesorter.js"></script> 
  <script type="text/javascript" src="js/jquery.tablesorter.pager.js"></script> 
  
          
                
 <!--style type="text/css">
		body {
	background-image: url(img/fondo.jpg);
}
        </style!-->
</head>
	<body>
		<div class="body">
        <header id="header">
            <div align="center">					
                <img src="img/header.jpg" class="img-responsive" alt="Citrom, c.a." width="1000" height="158" data-sticky-width="1000" data-sticky-height="158">
            </div>
            <div class="navbar-collapse nav-main-collapse ">
				  	<div class="container">
                  		<nav>
						<ul class="nav nav-pills nav-top">
                            <li>
								<a href="index.php"><i class="fa fa-home"></i>inicio</a>
							</li>
								<li>
                                <?php if (empty($_SESSION['nombre'])) { ?>
                                	<a href="login.php">Login</a>
                                <?php } ?> 									
								</li>
								
								<li>
                                <?php if (!empty($_SESSION['nombre'])) { ?>
                                	<a href="logout.php">Logout</a>
                                <?php } ?> 									
								</li>
							
						</ul>
						</nav>
                    </div>
            </div>
        </header>