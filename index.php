<?php 
session_start();
require_once('tools/mypathdb.php');
error_reporting(0);
include "header.php"; 
$idCategoria = $_GET['categoria'];
?>
  <!-- .................................... $scripts .................................... -->
  <script type="text/javascript" language="javascript" src="js/jquery.js"></script>
  <script type="text/javascript" language="javascript" src="js/jquery-ui.js"></script>
 
  <script type="text/javascript" language="javascript" src="js/jquery.validate.js"></script> 
  
  <script type="text/javascript" src="js/jquery.tablesorter.js"></script> 
  <script type="text/javascript" src="js/jquery.tablesorter.pager.js"></script> 


<script type="text/javascript" language="javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" language="javascript" src="js/si.files.js"></script>

<script type='text/javascript'>                             // tablesorter
    $(document).ready(function() {
        $("#sTable").tablesorter({
            headers: {
                3: {   
                    sorter: false
                }
            }
        });
    });
</script>
<script type = "text/javascript">                            // tablesorter pagination
$(document).ready(function() {
    $('#sTable').tablesorter().tablesorterPager({container: $("#pager")}); 
}); 
</script>
<script type="text/javascript">
    $("body").on('submit', '#formProducto', function(event) {
		event.preventDefault()
		if ($('#formProducto').valid()) {
			$.ajax({
				type: "POST",
				url: "productoBuscar.php",
				dataType: "json",
				data: $(this).serialize(),
				success: function(respuesta) {
					if (respuesta.error == 1) {
						$('#error1').show();
						setTimeout(function() {
						$('#error1').hide();
						}, 2000);
					}
					
					if (respuesta.exito == 1) {
						$('#exito1').show();
						setTimeout(function() {
						$('#exito1').hide();
						window.location.href='productosOLD.php'; 
					  }, 1000);
					}
				}
			});
		}
	});	
</script> 

  <!-- .................................... $breadcrumb .................................... -->
  <style type="text/css">
<!--
.section-content.section-contact.section-color-graylighter .container #sresults #sTable #contenido tr td .col-md-4 .thumb-info-type {
	color: #F00;
}
-->
  </style>
			
    <div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
        <p>&nbsp;</p>
        <strong>Categorias:</strong>
        <p>&nbsp;</p>
        <?php
                //================================================Recuperar registros tabla categorias==================================================
                $query = ("SELECT * FROM tbl_categorias");
                $resultado=mysql_query($query,$dbConn);
                while($data_cat=mysql_fetch_array($resultado))
                {
                    $categoria = $data_cat['categoria'];	
                    $id = $data_cat['id'];	
                    ?>
              
              <p>
                   <a href="index.php?categoria=<?php echo $id ?>" class="thumb-info"><?php echo $categoria ?></a></p>
                    
                  <?php
                } // fin del bucle de instrucciones
                    mysql_free_result($resultado); // Liberamos los registros
                ?>
        </div>
		<div class="col-md-10">
        <h2>Catalogo online - pastillas de freno, embragues, discos de freno, tambores de freno</h2>
                    <div class="form-group col-md-12">
                        <form  method="post" name="formProducto" id="formProducto">
                            <div class="controls">
                                <input type="text" id="nombre" name="nombre" style="width: 20%;"  placeholder="Nombre del producto" />	  
                            
                                <button id="search-btn" type="submit" name="submit" class="btn btn-danger"><i class="icon-search"></i> Buscar </button>
                            </div>
                        </form>
                    </div>
                    
                    <div id="sresults" class="col-md-12">
                      <table id="sTable" class="tablesorter table table-bordered table-hover" style="border:1px solid #ECF0F1">
                            <thead>
                            <tr>                    
                                <th width="10%" class="header" style="text-align: left">C&oacute;digo</th>
                                <th width="20%" class="header" style="text-align: left">Foto</th>
                                <th width="40%" class="header" style="text-align: left">Producto</th>
                                <th width="10%" class="header" style="text-align: left">Precio</th>
                            </tr>
                        </thead>
                        <tbody id="contenido"> 
                        <?php
                        
                        //********** Buscar los productos en la tabla PRODUCTOS *********************************************
                        if (!empty($idCategoria)) {
                            $mysql = ("SELECT * FROM tbl_productos WHERE categoria='$idCategoria'"); 	
                            } else {
                            $mysql = ("SELECT * FROM tbl_productos"); //todas
                                if (!empty($_SESSION['nombreProducto'])) 
                                {	
                                $nombre = $_SESSION['nombreProducto'];
                                $mysql = ("SELECT * FROM tbl_productos WHERE producto LIKE '%$nombre%' OR descripcion LIKE '%$nombre%'");
                                }
                            }
                            
                            $consulta_mysql=mysql_query($mysql,$dbConn);
                            while($fila=mysql_fetch_array($consulta_mysql))
                            {
                                $foto = $fila['fotoAdicional1'];  // foto del empaque
                                $producto = $fila['producto']; 
                                $pesoAprox = $fila['pesoAprox']; 
                                $codigo = $fila['codigo']; 
                                $cantidad = $fila['cantidad']; 
                                $descripcion = $fila['descripcion']; 
                                $precio = $fila['precio']; 
                        //****************************************************************************************************************
                        ?>
                      <tr>
                        <td align="justify">
                        <div class="col-md-12">
                            <span class="thumb-info-type" style="color:#000">
                            <a href="descripcion.php?codProducto=<?php echo $codigo ?>" class="thumb-info">
                                <?php echo $codigo; ?>
                            </a>
                            </span>
                        </div>
                        </td> 
                        <td>
                        <div class="col-md-8">                        
                            <div class="portfolio-item img-thumbnail">
                                <a href="descripcion.php?codProducto=<?php echo $codigo ?>" class="thumb-info">
                                    <img class="img-responsive" src="img/products/<?php echo $foto ?>">
                                    <span class="thumb-info-title">											
                                        <!--span class="thumb-info-type" style="color:#000"><?php //echo $pesoAprox ?></span!-->
                                        <!--span class="thumb-info-type" style="color:#000">Disponible: <?php //echo $cantidad ?></span!-->
                                        
                                         <?PHP
                                         if ($cantidad==0) {
                                        ?>	 
                                        <span class="thumb-info-inner" style="color:#FFF;text-align:right">Agotado</span>
                                         <?PHP
                                        }
                                        ?>
                                        <br>	
                                       	<span class="thumb-info-type" style="color:#000"><?php echo $producto ?></span>
                                        <br>	
                                    </span>
                               </a>
                            </div>
                           <p></p>
                        </div>
                        </td>
                        <td align="justify">
                        <div class="col-md-12">
                            <span class="thumb-info-type" style="color:#000">
                            <a href="descripcion.php?codProducto=<?php echo $codigo ?>" class="thumb-info">
                                <?php echo  substr(ucwords(strtolower($descripcion)),0,60); ?>
                            </a>
                            </span>
                        </div>
                        </td> 
                        <td>
                        <div class="col-md-4">
                            <span class="thumb-info-type" style="color:#F00">
                                <strong> <?php echo number_format($precio, 2, ",", "."); ?></strong>
                            </span>
                        </div>
                        </td>
                        </tr>          
                        <?php } // fin del bucle de instrucciones
                        mysql_free_result($resultado); // Liberamos los registros
                        ?>
                        </tbody>
                        </table>
                       <!-- pager -->
                        <div id="pager" class="pager">
                           <form>
                            <input class="pagedisplay" readonly type="text">
                            <button type="button" class="btn btn-danger first"><i class="icon-fast-backward"></i></button>
                            <button type="button" class="btn btn-danger prev"><i class="icon-backward"></i></button>
                            <button type="button" class="btn btn-danger next"><i class="icon-forward"></i></button>
                            <button type="button" class="btn btn-danger last"><i class="icon-fast-forward"></i></button>
                            <select class="styled-select pagesize" style="height:30px; width:auto">
                              <option selected="selected" value="10">10</option>
                              <option value="20">20</option>
                              <option value="30">30</option>
                              <option value="50">50</option>
                            </select>
                          </form>
                      </div>
                </div>  <!--div id="sresults" class="col-md-12"!-->
		</div>
	</div>
</div>
<?php 
	mysql_close(); //desconectar();
	include "otrofooter.php"; 
?>