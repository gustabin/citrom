<?php 
session_start();
if (($_SESSION['$usuario']<=2) OR (empty($_SESSION['$usuario']))) { //===============================Redirigir a otra pagina========================================		
	header("Location: index.php");
}
require_once('tools/mypathdb.php');
error_reporting(0);
include "headerConfirmar.php"; 
?>
<script type="text/javascript" language="javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" language="javascript" src="js/si.files.js"></script>
    

<script Language="JavaScript">
	$(document).ready(function() {
		$('#titulo').html("Mantenimiento de productos");
	});
</script>



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
						$('#exito3').show();
						setTimeout(function() {
						$('#exito3').hide();
						window.location.href='productos.php'; 
					  }, 1000);
					}
				}
			});
		}
	});	
	
	$("body").on('submit', '#formPrecio', function(event) {
		event.preventDefault()
		if ($('#formPrecio').valid()) {
			$.ajax({
				type: "POST",
				url: "productosGuardar.php",
				dataType: "json",
				data: $(this).serialize(),
				success: function(respuesta) {
					if (respuesta.error == 1) {
						$('#error1').show();
						setTimeout(function() {
						$('#error1').hide();
						}, 2000);
					}
					
					if (respuesta.exito == 2) {
						$('#exito1').show();
						setTimeout(function() {
						$('#exito1').hide();
						window.location.href='productos.php'; 
					  }, 1000);
					}
					
				}
			});
		}
	});	
	
	$("body").on('submit', '#formCantidad', function(event) {
		event.preventDefault()
		if ($('#formCantidad').valid()) {
			$.ajax({
				type: "POST",
				url: "productosGuardarCantidad.php",
				dataType: "json",
				data: $(this).serialize(),
				success: function(respuesta) {
					if (respuesta.error == 1) {
						$('#error1').show();
						setTimeout(function() {
						$('#error1').hide();
						}, 2000);
					}
					
					if (respuesta.exito == 2) {
						$('#exito2').show();
						setTimeout(function() {
						$('#exito2').hide();
						window.location.href='productos.php'; 
					  }, 1000);
					}
					
				}
			});
		}
	});	
	    
</script> 

  <!-- .................................... $breadcrumb .................................... -->
  <section class="section-breadcrumb section-color-graylighter">
    <div class="container">
      <ul class="breadcrumb">
        <li><span id="titulo"></span></li>
      </ul>
    </div>
  </section>
  <!-- .................................... $Titulo .................................... -->
  
    <div class="container" style="margin-top:10px">
      <h2 class="section-title">
        Inclusion, Consulta, Modificación y Eliminación 
        <small>de productos</small>
      </h2>
      </div>
  
  <!-- .................................... $Contenido .................................... -->
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
    	<div class="form-group col-md-12">
      		<form  method="post" name="formProducto" id="formProducto">
        		<div class="controls">
          			<input type="text" id="nombre" name="nombre" style="width: 20%;"  placeholder="Nombre del producto" />	  
        		
           			<button id="search-btn" type="submit" name="submit" class="btn btn-danger"><i class="icon-search"></i> Buscar </button>
                
      				<!--a href='historiaParte1.php'!-->                    
                    <a href='productoNuevo.php'>
      				<button type="button" class="btn btn-danger"><i class="icon-plus"></i> Nuevo </button>
      				</a> 
                    <a href='backup.php'>
      				<button type="button" class="btn btn-danger"><i class="icon-download-alt"></i> Backup </button>
      				</a> 
                </div>
      		</form>
            <!-- ================= mensajes de EXITO o de ERROR===========================================================  !-->
     <div class="alert alert-success mensaje_form" style="display: none" id="exito3">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>Buscando</strong> <span class="textmensaje"> producto</span>          
	 </div>  
  		</div>
        <div id="sresults" class="col-md-12">
   			<table id="sTable" class="tablesorter table table-bordered table-hover" style="border:1px solid #ECF0F1">
      			<thead>
                <tr>                    
                    <th width="30%" class="header" style="text-align: center">Foto</th>
					<th width="30%" class="header" style="text-align: center">Producto</th>
                    <!--th width="20%" class="header" style="text-align: center">Unid x Paquete</th>
                    <th width="20%" class="header" style="text-align: center">Peso Aprox</th!-->
                    <th width="28%" class="header" style="text-align: center">Precio</th>
                    <th width="30%" class="header" style="text-align: center">Cantidad</th>
                    <th width="10%" class="header" style="text-align: center">Eliminar</th>
                    <th width="10%" class="header" style="text-align: center">Seleccionar</th>
                    
                </tr>
            </thead>
            <tbody id="contenido"> 
			<?php
			//================================================Recuperar registros tabla productos==================================================
			if (!empty($_SESSION['nombreProducto'])) 
			{	
				$nombre = $_SESSION['nombreProducto'];
				$query = ("SELECT * FROM tbl_productos WHERE producto LIKE '%$nombre%' OR descripcion LIKE '%$nombre%'");
				//echo $query;
			}
			else
			{
				$query = ("SELECT * FROM tbl_productos");
				//echo $query;
			}
	
			$resultado=mysql_query($query,$dbConn);
			while($data_prod=mysql_fetch_array($resultado))
		  	{
			$foto = $data_prod['foto'];
			$producto = $data_prod['producto'];
			$revisiones = $data_prod['revisiones'];
			$unidadesPaquete = $data_prod['unidadesPaquete'];
			$pesoAprox = $data_prod['pesoAprox'];
			$valoracion = $data_prod['valoracion'];
			$precio = $data_prod['precio'];
			$fotoAdicional1 = $data_prod['fotoAdicional1'];
			$fotoAdicional2 = $data_prod['fotoAdicional2'];
			$fotoAdicional3 = $data_prod['fotoAdicional3'];
			$fotoAdicional4 = $data_prod['fotoAdicional4'];
			$fotoAdicional5 = $data_prod['fotoAdicional5'];
			$descripcion = $data_prod['descripcion'];
			$ingredientes = $data_prod['ingredientes'];
			$cantidad = $data_prod['cantidad'];
			$categoria = $data_prod['categoria'];
			$codigo = $data_prod['codigo']; 
			?>
            <tr>
                <td><img width="100" height="100" alt="" class="img-responsive" src="img/products/<?php echo $foto?>"></td>
                <td>					
                <a href="descripcion.php?codProducto=<?php echo $codigo ?>" class="thumb-info"><?php echo $producto ?></a>
                </td>
                <!--td><?php //echo $unidadesPaquete;?></td>
                <td><?php //echo $pesoAprox; ?></td!-->
                <td>
                    <form  method="post" name="formPrecio" id="formPrecio">
                        <div class="controls">
                            <input name="precio" type="text" class="span4 required" id="precio"  maxlength="10" style="width: 35%;" value="<?php echo $precio; ?>">	
                            <input name="id" type="hidden" value="<?php echo $data_prod['id'] ?>" />
                            <button type="submit" name="submit"><i class="fa fa-floppy-o fa-2x" style="cursor: pointer;"></i> </button>
                        </div>
                    </form>
                    <!-- ================= mensajes de EXITO o de ERROR===========================================================  !-->
                    <div class="alert alert-success mensaje_form" style="display: none" id="exito1">
                        <button data-dismiss="alert" class="close" type="button">x</button>
                        <strong>Precio</strong> <span class="textmensaje"> Actualizado</span>          
                    </div>  
                </td>
                <td>
                <form  method="post" name="formCantidad" id="formCantidad">
        		<div class="controls">
          			<input name="cantidad" type="text" class="span4 required" id="cantidad"  maxlength="10" style="width: 30%;" value="<?php echo $cantidad; ?>">	
                    <input name="id" type="hidden" value="<?php echo $data_prod['id'] ?>" />
           			<button type="submit" name="submit"><i class="fa fa-floppy-o fa-2x" style="cursor: pointer;"></i> </button>
                </div>
      		</form>
     <div class="alert alert-success mensaje_form" style="display: none" id="exito2">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>Cantidad</strong> <span class="textmensaje"> Actualizada</span>          
	 </div>  
                </td>
                <td><a href="#confirm-delete" role="button" data-toggle="modal" data-href="productosEliminar.php?id= <?php echo $data_prod['id'] ?>"><i class="fa fa-trash-o fa-2x" 				style="cursor: pointer;"></i></a></td>
                <td><a href="productosModificar.php?id=<?php echo $data_prod['id'] ?>"><i class="fa fa-pencil-square-o fa-2x" style="cursor: pointer;"></i></a></td>            </tr>
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
    </div>
    </div>
</section>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Confirmar Eliminación</h4>
                </div>
            
                <div class="modal-body">
                    <p>Estas seguro que quieres eliminar este producto? Este proceso es irreversible!</p>
                    <p>Quieres proceder?</p>
                    <p class="debug-url"></p>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger btn-ok">Eliminar</a>
                </div>
            </div>
        </div>
    </div>

    


    <script>
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            
           // $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
        });
    </script>