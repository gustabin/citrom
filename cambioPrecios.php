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
		$('#titulo').html("Cambio de precios por categorias");
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
    $("body").on('submit', '#formPorcentaje', function(event) {
		event.preventDefault()
		if ($('#formPorcentaje').valid()) {
			$.ajax({
				type: "POST",
				url: "cambioPreciosProcesar.php",
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
						window.location.href='cambioPrecios.php'; 
					  }, 2000);
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
        Ajustes globales
        <small>de precios</small>
      </h2>
      </div>
  
  <!-- .................................... $Contenido .................................... -->
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
    	    <div id="sresults" class="col-md-12">
   			<table id="sTable" class="tablesorter table table-bordered table-hover" style="border:1px solid #ECF0F1">
      			<thead>        		
                <tr>                    
                    <th width="80%" class="header" style="text-align: center">Categor&iacute;a</th>					
                    <th width="20%" class="header" style="text-align: center">Porcentaje %</th>
                </tr>
            </thead>
            <tbody id="contenido"> 
<?php
		//================================================Recuperar registros tabla categorias==================================================
		
		$query = "SELECT * FROM tbl_categorias";
		$resultado=mysql_query($query,$dbConn);
        while($data_cat=mysql_fetch_array($resultado))
      {
		$categoria = $data_cat['categoria'];			
		
	    ?>
        		<tr>  
            		<td><?php echo $categoria;?></td>
            		
                  <td>
                    <form  method="post" name="formPorcentaje" id="formPorcentaje">
                        <div class="controls">
                            <input name="porcentaje" type="text" class="span4" id="porcentaje"  maxlength="5" style="width: 20%;" value="<?php echo $porcentaje; ?>">	
                            <input name="id" type="hidden" value="<?php echo $data_cat['id'] ?>" />
                            <button type="submit" name="submit"><i class="fa fa-floppy-o fa-2x" style="cursor: pointer;"></i> </button>
                            <?php if ($data_cat['id']==$_SESSION['idCategoria']) 
							{
							?>
							
                            <i class="icon-check"></i>
							<?php
                            }
							?>
                        </div>
                    </form>
                    
                </td><!-- ================= mensajes de EXITO o de ERROR===========================================================  !-->
                   
                  </tr>
                   
        <?php } // fin del bucle de instrucciones

mysql_free_result($resultado); // Liberamos los registros
?>

            </tbody>
          </table><div class="alert alert-success mensaje_form" style="display: none" id="exito1">
                        <button data-dismiss="alert" class="close" type="button">x</button>
                        <strong>Porcentaje</strong> <span class="textmensaje"> aplicado</span>          
                    </div>
    </div>
    
  </section>
