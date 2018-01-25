<?php 
session_start();
error_reporting(0);
include "header.php"; 
?>
         
<!-- ****************************************************************   -->

<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

  <link href="css/jquery-ui.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="css/jquery.ui.datepicker.css" rel="stylesheet" media="screen" />
  <link href="css/jquery.ui.core.css" rel="stylesheet" media="screen" />
  <link href="css/jquery.ui.theme.css" rel="stylesheet" media="screen" />
  

  <!-- .................................... $scripts .................................... -->
  <script type="text/javascript" language="javascript" src="js/jquery.js"></script>
  <script type="text/javascript" language="javascript" src="js/jquery-ui.js"></script>
 
  <script src="js/jquery.min.js"></script>
  <script src="js/modernizr.min.js"></script>


  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.hoverdir.min.js"></script>
  <script src="js/jquery.isotope.min.js"></script>
  <script src="js/jquery.masonry.min.js"></script>
  <script src="js/jquery.fitvids.min.js"></script>
  <script src="js/jquery.flexslider.min.js"></script>
  <!--script src="<?php// echo INCLUDES ?>js/script.js"></script!--> 

  <script type="text/javascript" language="javascript" src="js/jquery.validate.js"></script>
  <script type="text/javascript" language="javascript" src="js/jquery.ui.datepicker.js"></script>
  <script type="text/JavaScript" language="javascript" src="js/jquery.ui.core.js"></script>
  <script type="text/JavaScript" language="javascript" src="js/jquery.ui.widget.js"></script>
  <script type="text/JavaScript" language="javascript" src="js/datepiker_lenguaje.js"></script>
  <script type="text/JavaScript" language="javascript" src="js/jquery.maskedinput.js"></script>	 
  
   <script type="text/javascript" src="js/jquery.tablesorter.js"></script> 
  <script type="text/javascript" src="js/jquery.tablesorter.pager.js"></script> 
        
        
<!-- ****************************************************************   -->        
        
		<style type="text/css">
		body {
	background-image: url();
}


input[type="number"] {
   width:50px;
}
        </style>




	

<div role="main" class="main shop">

				<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron">
				<h2>
					Hola, para nosotros es un placer hacer negocios juntos!
			  </h2>
				<p>
					Puedes comunicarte de Lunes a Viernes en nuestro horario de oficina.</p>				
			</div>
			<p align="center">
				Debido al gran volumen de correos recibidos, <strong>diariamente</strong>. Es posible que demoremos hasta 48 horas en responder. <em>Le agradecemos un poco de paciencia.</em> Hacemos todo lo posible en contestar todos los mensajes recibidos <br /><small> El equipo de citrom, c.a.</small>
			</p>
		</div>
	</div>
</div>
</div>

<?php 
			mysql_close(); //desconectar();
			include "footer.html"; 
			?>