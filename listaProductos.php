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
		$('#titulo').html("Lista de productos");
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
        Listado 
        <small>de productos</small>
      </h2>
      </div>
  
  <!-- .................................... $Contenido .................................... -->
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
    	
        <div id="sresults" class="col-md-12">
   			<table id="sTable" class="tablesorter table table-bordered table-hover" style="border:1px solid #ECF0F1">
      			<thead>
                    <tr>                    
                        <th width="20%" class="header" style="text-align: center">C&oacute;digo</th>                        
                        <th width="65%" class="header" style="text-align: center">Descripci&oacute;n</th>
                        <th width="10%" class="header" style="text-align: center">Precio</th>
                        <th width="5%" class="header" style="text-align: center">Cantidad</th>                    </tr>
            	</thead>
                <tbody id="contenido"> 
					<?php					
					
                    //================================================Recuperar registros tabla productos==================================================
                    $query = ("SELECT * FROM tbl_productos");
                    
                    $resultado=mysql_query($query,$dbConn);
                    while($data_prod=mysql_fetch_array($resultado))
                    {
                    $codigo = $data_prod['codigo'];	
                    $producto = $data_prod['producto'];	
                    $descripcion = $data_prod['descripcion'];
                    $precio = $data_prod['precio'];
                    $cantidad = $data_prod['cantidad'];
                    $categoria = $data_prod['categoria'];					
                    ?>
                    <tr>
                        <td><?php echo $codigo ?></td>
                        
                        <td><?php echo $descripcion ?></td>
                        <td><?php echo $precio ?></td>
                        <td><?php echo $cantidad ?></td>
                        
                    </tr>
                    <?php
					}
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
                  <option value="40">40</option>
                  <option value="2000">Todos</option>
                </select>
              </form>
    	  </div>
    </div>
    </div>
</section>


    <script>
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));            
           // $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
        });
    </script>