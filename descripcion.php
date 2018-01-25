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




<?PHP
//************************************************************************************************************

require_once('tools/mypathdb.php');
$codProducto = $_GET['codProducto'];



//********** Buscar el codigo del producto en la tabla PRODUCTOS *********************************************
	$query = mysql_query("SELECT * FROM tbl_productos WHERE codigo = '$codProducto'"); 
	$dataProducto = mysql_fetch_array($query);	
	
	
		$foto = $dataProducto['foto'];  // foto del empaque
		$producto = $dataProducto['producto']; 
		$unidadesPaquete = $dataProducto['unidadesPaquete']; 
		$pesoAprox = $dataProducto['pesoAprox']; 
		$valoracion = $dataProducto['valoracion']; 	
		$precio = $dataProducto['precio']; 
		$precio =	number_format($precio, 2, ",", ".");
		$fotoAdicional1 = $dataProducto['fotoAdicional1']; 
		$fotoAdicional2 = $dataProducto['fotoAdicional2']; 
		$fotoAdicional3 = $dataProducto['fotoAdicional3']; 
		$fotoAdicional4 = $dataProducto['fotoAdicional4']; 
		$fotoAdicional5 = $dataProducto['fotoAdicional5']; 
		$relacionado1 = $dataProducto['relacionado1'];
		$relacionado2 = $dataProducto['relacionado2'];
		$relacionado3 = $dataProducto['relacionado3'];
		$relacionado4 = $dataProducto['relacionado4'];
		$descripcion = $dataProducto['descripcion']; 
		$ingredientes = $dataProducto['ingredientes']; 
		$cantidad = $dataProducto['cantidad']; 
		$categoria = $dataProducto['categoria']; 
		$codigo = $dataProducto['codigo']; 
		
		switch ($valoracion) {
	case 0:
        $imagenPuntuacion="img/punto0.jpg";
        break;
    case 1:
        $imagenPuntuacion="img/punto1.jpg";
        break;
    case 2:
        $imagenPuntuacion="img/punto2.jpg";
        break;
    case 3:
        $imagenPuntuacion="img/punto3.jpg";
        break;
	case 4:
        $imagenPuntuacion="img/punto4.jpg";
        break;
	case 5:
        $imagenPuntuacion="img/punto5.jpg";
        break;
}
		
		
		$query = mysql_query("SELECT * FROM tbl_categorias WHERE id = '$categoria'");
		$dataCategoria = mysql_fetch_array($query);	
		$nombreCategoria = $dataCategoria['categoria'];
		
		

	
//****************************************************************************************************************

//====================Buscar numero de revisiones================= 
	$mysqlRev=("SELECT * FROM tbl_revisiones WHERE producto='".$codProducto."'");
	$resultRev = mysql_query($mysqlRev);
	$numeroComentarios = mysql_num_rows($resultRev);	
?>
	

<div role="main" class="main shop">

				<div class="container">

					<hr class="tall">

					<div class="row">
						<div class="col-md-6">

							<div class="owl-carousel" data-plugin-options='{"items": 1, "autoHeight": true}'>
								<div>
									<div class="thumbnail">
										<img alt="" class="img-responsive img-rounded" src="img/products/<?php echo $fotoAdicional1 ?>">
									</div>
								</div>
								<div>
									<div class="thumbnail">
										<img alt="" class="img-responsive img-rounded" src="img/products/<?php echo $fotoAdicional2 ?>">
									</div>
								</div>
                                <div>
									<div class="thumbnail">										
                                        <img alt="" class="img-responsive img-rounded" src="img/products/<?php echo $fotoAdicional3 ?>">
									</div>
								</div>
                                <div>
									<div class="thumbnail">										
                                        <img alt="" class="img-responsive img-rounded" src="img/products/<?php echo $fotoAdicional4 ?>">
									</div>
								</div>
							</div>

						</div>

						<div class="col-md-6">

							<div class="summary entry-summary">

								<h2 class="shorter"><strong><?php echo $producto ?></strong></h2>

								<div class="reVer_num">
									<span class="count" itemprop="ratingCount"><?php echo $numeroComentarios ?></span> comentarios
								</div>
                                <span class="comment-by">															
                                    <span class="pull-right">
                                        <div title="Puntuación <?php echo $valoracion ?> de 5">        
                                            <span style="width:100%"><strong class="rating"><img alt="" class="img-responsive img-rounded" src="<?php echo $imagenPuntuacion ?>"><?php echo $valoracion ?></strong> de 5</span> 
                                        </div>
                                    </span>
                                </span>
                                						
                                

								<p class="price">
									<span class="amount"><?php echo $precio ?>&nbsp;Bs</span>
								</p>

								<p class="taller"><?php echo ($descripcion) ?> </p>
 <script language="JavaScript" type="text/JavaScript">
	                       
    //Metodo para cargar el formulario  
    $("body").on('submit', '#agregarCarrito', function(event) {
	event.preventDefault()
	if ($('#agregarCarrito').valid()) {
		$('#barra').show();
	    $.ajax({
		type: "POST",
		url: "descripcion_procesar.php",
		dataType: "json",
		data: $(this).serialize(),
		success: function(respuesta) {
			$('#barra').hide();
		    if (respuesta.error == 1) {
			  $('#error1').show();
			setTimeout(function() {
			  $('#error1').hide();
			}, 2000);
		    }
			if (respuesta.error == 2) {
			  $('#error2').show();
			setTimeout(function() {
			  $('#error2').hide();
			}, 2000);
		    }
			if (respuesta.error == 3) {
			  $('#error3').show();
			setTimeout(function() {
			  $('#error3').hide();
			}, 2000);
		    }
			
			if (respuesta.exito == 1) {
			  $('#mensaje').show();
			  setTimeout(function() {
			  $('#mensaje').hide();
			  window.location.href='descripcion.php?codProducto=<?php echo $codigo ?>'; 
			}, 2000);
		    }
		    
		}
	    });
	}
	});	    
</script>                               

          <form class="form-vertical" id="agregarCarrito">
            <div class="control-group"> 
              Cantidad: 
              
              <INPUT TYPE="NUMBER" MIN="1" MAX="500" STEP="1" VALUE="1" name="cantidad" id="cantidad">
              
              <input name="codigoProducto" type="hidden" value="<?php echo $codProducto ?>">
              <input name="cantidadInventario" type="hidden" value="<?php echo $cantidad ?>">
              
              <?PHP
			   if ($cantidad==0) {
			  ?>	 
			  &nbsp; &nbsp; <button class="btn btn-danger" type="submit"  disabled="disabled">Agotado</button>
			  <?PHP
			  } else {
			  ?>
              &nbsp; &nbsp; <button class="btn btn-danger" type="submit"><i class="icon-shopping-cart icon-large"></i>&nbsp; Agregar al carrito</button>
              <?PHP
			  }
			  ?>
            </div>
          </form>

   
          <br>
		     <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<strong></strong> <span class="textmensaje">Carrito actualizado!...</span>
			 </div>
			 <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<strong></strong> <span class="textmensaje">Cantidad incorrecta</span>
			 </div>
             <div class="alert alert-danger mensaje_form" style="display: none" id="error2">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<strong></strong> <span class="textmensaje">Solo se aceptan números</span>
			 </div>
              <div class="alert alert-danger mensaje_form" style="display: none" id="error3">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<strong></strong> <span class="textmensaje">Debe elegir una cantidad menor </span>
			 </div>
             
             <div style="float:left; display:none" id="barra"><img src="img/barra.gif" alt="Cargando..."/><br>Ingresando....</div>	
                            
								<div class="product_meta">
									<span class="posted_in">Categorias: <?php echo $nombreCategoria ?></span>
								</div>
                                <div class="product_meta">
									
                                    <a href="index.php"><button type="button" class="btn btn-danger"><i class="icon-check"></i> Seguir comprando </button></a>
								</div>
                               

							</div>


						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="tabs tabs-product">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#productDescription" data-toggle="tab">Descripción</a></li>
							<!--li><a href="#productInfo" data-toggle="tab">Información Adicional</a></li!-->
							<li><a href="#productReVers" data-toggle="tab">Comentarios (<?php echo $numeroComentarios ?>)</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="productDescription">
										<p><?php echo utf8_encode($descripcion) ?></p>
									</div>
									<!--div class="tab-pane" id="productInfo">
										<table class="table table-striped push-top">
											<tbody>
												<tr>
													<th>
														Peso:
													</th>
													<td>
														<?php //echo $pesoAprox ?>
													</td>
												</tr>
												<!--tr>
													<th>
														Cantidad
													</th>
													<td>
														<?php //echo $unidadesPaquete ?>
													</td>
												</tr>
												<tr>
													<th>
														Ingredientes
													</th>
													<td>
														<?php //echo utf8_encode($ingredientes) ?>
													</td>
												</tr>
											</tbody>
										</table>
									</div!-->
									<div class="tab-pane" id="productReVers">
										<ul class="comments">
											<li>
                                            <?php
//====================Buscar en la tabla revisiones================= 
	$cont=0;
	$valoracion=0;
	$puntuacionSubTotal=0;
	$mysql=("SELECT * FROM tbl_revisiones WHERE producto='".$codProducto."'"); 
	$consulta_mysql=mysql_query($mysql,$dbConn);
	while($fila=mysql_fetch_array($consulta_mysql))
	{
		$nombreRevision= $fila['nombre'];
		$comentario= $fila['comentario'];	
		$puntuacion= $fila['puntuacion'];
		$emailRevision= $fila['email'];
		$cont= $cont + 1;
		$puntuacionSubTotal= $puntuacionSubTotal + $puntuacion;
		
		
	switch ($puntuacion) {
	case 0:
        $imagenPuntuacion="img/punto0.jpg";
        break;
    case 1:
        $imagenPuntuacion="img/punto1.jpg";
        break;
    case 2:
        $imagenPuntuacion="img/punto2.jpg";
        break;
    case 3:
        $imagenPuntuacion="img/punto3.jpg";
        break;
	case 4:
        $imagenPuntuacion="img/punto4.jpg";
        break;
	case 5:
        $imagenPuntuacion="img/punto5.jpg";
        break;
}
		?>
												<div class="comment">
													<div class="img-thumbnail">
														<img class="avatar" alt="" src="img/comentario.jpg">
													</div>
													<div class="comment-block">
														<div class="comment-arrow"></div>
														<span class="comment-by">
															<strong><?php echo $nombreRevision ?></strong>&nbsp; <?php echo $emailRevision ?>
															<span class="pull-right">
																<div title="Puntuación <?php echo $puntuacion ?> de 5">        
																	<span style="width:100%"><strong class="rating"><img alt="" class="img-responsive img-rounded" src="<?php echo $imagenPuntuacion ?>"><?php echo $puntuacion ?></strong> de 5</span> 
																</div>
															</span>
														</span>
														<p><?php echo $comentario ?></p>
													</div>
												</div>
                                                <?php
  }	
 $valoracion= $puntuacionSubTotal / $cont;
// ========================= Actualizar la tabla productos ==========================================================
	
	$sql=mysql_query("UPDATE tbl_productos SET valoracion=" .ceil($valoracion). " WHERE codigo = $codProducto");
	

?>
											</li>
										</ul>

<script language="JavaScript" type="text/JavaScript">
	                       
    //Metodo para cargar el formulario  
    $("body").on('submit', '#comentario', function(event) {
	event.preventDefault()
	if ($('#comentario').valid()) {
		$('#barra').show();
	    $.ajax({
		type: "POST",
		url: "comentario_procesar.php",
		dataType: "json",
		data: $(this).serialize(),
		success: function(respuesta) {
			$('#barra').hide();
		    if (respuesta.error == 1) {
			  $('#error1').show();
			setTimeout(function() {
			  $('#error1').hide();
			}, 2000);
		    }
			if (respuesta.error == 2) {
			  $('#error2').show();
			setTimeout(function() {
			  $('#error2').hide();
			}, 2000);
		    }
			if (respuesta.error == 3) {
			  $('#error3').show();
			setTimeout(function() {
			  $('#error3').hide();
			}, 2000);
		    }
			if (respuesta.error == 4) {
			  $('#error4').show();
			setTimeout(function() {
			  $('#error4').hide();
			}, 2000);
		    }
			
			if (respuesta.exito == 1) {
			  $('#mensaje').show();
			  setTimeout(function() {
			  $('#mensaje').hide();
			  window.location.href='comentarioListo.php'; 
			}, 2000);
		    }
		    
		}
	    });
	}
	});	    
</script> 
<script>
  $('#myButton').on('click', function () {
    var $btn = $(this).button('enviando')
    // business logic...
    $btn.button('reset')
  })
</script>
                                        
            <hr class="tall">
            <h4>Agregar un comentario</h4>
            <div class="row">
                <div class="col-md-12">
                    <form class="form-vertical" id="comentario">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Tu nombre *</label>                                    
                                    <input name="nombre" type="text" class="required" data-msg-required="Por favor ingresa tu nombre." id="nombre" value="" maxlength="100">
                                </div>
                                <div class="col-md-6">
                                    <label>Tu correo electrónico *</label>
                                    <input  type="email" class="required" value="" data-msg-required="Por favor ingresa tu correo electronico." data-msg-email="Por favor ingresa un correo electronico valido." maxlength="100" class="form-control" name="email" id="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Mensaje *</label>
                                    <textarea  maxlength="600" class="required" data-msg-required="Por favor ingresa tu mensaje." rows="3" class="form-control" name="mensaje" id="mensaje" rows="25"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Puntuación *</label>
                                    <INPUT TYPE="NUMBER" MIN="1" MAX="5" STEP="1" VALUE="5" name="puntuacion" id="puntuacion">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" id="myButton" value="Enviar comentario" class="btn btn-danger" data-loading-text="Cargando...">
                            </div>
                        </div>
                        <input name="codigoProducto" type="hidden" value="<?php echo $codProducto?>" />
                    </form>
                    <br />
                    
			 <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<strong></strong> <span class="textmensaje">Puntuación incorrecta</span>
			 </div>
             <div class="alert alert-danger mensaje_form" style="display: none" id="error2">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<strong></strong> <span class="textmensaje">Solo se aceptan números</span>
			 </div>
              <div class="alert alert-danger mensaje_form" style="display: none" id="error3">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<strong></strong> <span class="textmensaje">Debe elegir un numero entre 1 y 5 </span>
			 </div>
             <div class="alert alert-danger mensaje_form" style="display: none" id="error4">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<strong></strong> <span class="textmensaje">Campo requerido </span>
			 </div>
             
             <div style="float:left; display:none" id="barra"><img src="img/barra.gif" alt="Cargando..."/><br>Ingresando....</div>	
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>

					<hr class="tall" />

					<div class="row">

						<div class="col-md-12">
							<h2>Productos <strong>Relacionados</strong></h2>
						</div>

						<ul class="products product-thumb-info-list">
<?php
//====================Buscar productos relacionados ================= 
	
	for ($i = 1; $i <= 4; $i++) {   	
			switch ($i) {
			case 1:
				$query =  mysql_query("SELECT * FROM tbl_productos WHERE id ='" .$relacionado1. "'"); 
				break;
			case 2:
				$query =  mysql_query("SELECT * FROM tbl_productos WHERE id ='" .$relacionado2. "'"); 
				break;
			case 3:
				$query =  mysql_query("SELECT * FROM tbl_productos WHERE id ='" .$relacionado3. "'"); 
				break;
			case 4:
				$query =  mysql_query("SELECT * FROM tbl_productos WHERE id ='" .$relacionado4. "'"); 
				break;
}

			$dataRelacionado = mysql_fetch_array($query);
			$fotoRelacionado = $dataRelacionado['fotoAdicional1']; 
			$productoRelacionado = $dataRelacionado['producto']; 
			$precioRelacionado = $dataRelacionado['precio']; 
			$codigoRelacionado = $dataRelacionado['codigo']; 
			$precioAnteriorRelacionado =  $precioRelacionado*1.05;
            ?>
                        
							<li class="col-sm-3 col-xs-12 product">
								
								<span class="product-thumb-info">
									<a href="shop-cart.html" class="add-to-cart-product">
										<span><i class="fa fa-shopping-cart"></i> Agregar al carrito</span>
									</a>
									<a href="descripcion.php?codProducto=<?php echo $codigoRelacionado ?>">
										<span class="product-thumb-info-image">
											<span class="product-thumb-info-act">
												<span class="product-thumb-info-act-left"><em>Ver</em></span>
												<span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> Detalles</em></span>
											</span>
									<img alt="" class="img-responsive" src="img/products/<? echo $fotoRelacionado ?>">
										</span>
									</a>
									<span class="product-thumb-info-content">
										<a href="descripcion.php?codProducto=<?php echo $codigoRelacionado ?>">
											<h4><?php echo $productoRelacionado ?></h4>
											<span class="price">
												<del><span class="amount"><?php echo $precioAnteriorRelacionado ?> Bs</span></del>
												<ins><span class="amount"><?php echo $precioRelacionado ?> Bs</span></ins>
											</span>
										</a>
									</span>
								</span>
							</li>
                            <?php
							}
							?>
								
						</ul>

					</div> 
				</div>

			</div>

			<?php 
			mysql_close(); //desconectar();
			include "footer.html"; 
			?>