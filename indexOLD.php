<?php 
session_start();
//$valor = 1; //Activa la opcion del menu actual
//$_SESSION['valor'] = 1; //Activa la opcion del menu actual
include "header.php"; 
//************************************************************************************************************
error_reporting(0);
require_once('tools/mypathdb.php');
$idCategoria = $_GET['categoria'];
?>
			<div role="main" class="main"> 
				<section class="page-top">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
							  <ul class="breadcrumb">
								  <li class="active">Productos</li>                       	
								</ul>
                                <h2>Catalogo online</h2>
							</div>
						</div>
					</div>
				</section>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
<?php
		//================================================Recuperar registros tabla categorias==================================================
		$query = ("SELECT * FROM tbl_categorias");
		$resultado=mysql_query($query,$dbConn);
        while($data_cat=mysql_fetch_array($resultado))
        {
			$categoria = $data_cat['categoria'];	
			$id = $data_cat['id'];	
			?>
                <a href="index.php?categoria=<?php echo $id ?>" class="thumb-info"><?php echo $categoria ?></a>
            <br></br>
			<?php
		} // fin del bucle de instrucciones

mysql_free_result($resultado); // Liberamos los registros
?>

		</div>
		<div class="col-md-10">
			<div class="row">
            
            
 <?PHP
//********** Buscar los productos en la tabla PRODUCTOS *********************************************
if (empty($idCategoria)) {
	$mysql = ("SELECT * FROM tbl_productos"); //todas
	} else {
	$mysql = ("SELECT * FROM tbl_productos WHERE categoria='$idCategoria'"); //todas	
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
//****************************************************************************************************************
?>


				<div class="col-md-4">
	                <span class="thumb-info-type" style="color:#000">
                    <a href="descripcion.php?codProducto=<?php echo $codigo ?>" class="thumb-info">
						<?php echo  substr(ucwords(strtolower($descripcion)),0,60); ?>
                    </a>
                    </span>
                    
                	<div class="portfolio-item img-thumbnail">
                    	<a href="descripcion.php?codProducto=<?php echo $codigo ?>" class="thumb-info">
                            <img alt="" class="img-responsive" src="img/products/<?php echo $foto ?>">
                            <span class="thumb-info-title">											
                                <span class="thumb-info-type" style="color:#000"><?php echo $pesoAprox ?></span>
                                <span class="thumb-info-type" style="color:#000">Disponible: <?php echo $cantidad ?></span>
                                
                                 <?PHP
                                 if ($cantidad==0) {
                                ?>	 
                                <span class="thumb-info-inner" style="color:#F00;text-align:right">Agotado</span>
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
                
<?php
  }	
                    
mysql_close(); //desconectar();							
?>        
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.html"; ?>