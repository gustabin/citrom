<?php 
session_start();
require_once('tools/mypathdb.php');
error_reporting(0);
$idCategoria = $_POST ['id']; //viene oculto
$porcentaje = $_POST ['porcentaje'];

if (!empty($porcentaje)) 	
	{		
	$_SESSION['idCategoria'] = $idCategoria; 
	$sql=("SELECT * FROM tbl_productos WHERE categoria='".$idCategoria."'");
	
	$result=mysql_query($sql,$dbConn);
	while($dataProducto=mysql_fetch_array($result))
		{
		$id = $dataProducto['id'];
		
		$precio = $dataProducto['precio']; 
		
		$precio = $precio + (($precio * $porcentaje)/100); 
		
		$query = mysql_query("UPDATE tbl_productos SET precio=" .$precio. " WHERE id='$id'"); 
		
		}			
	}

if(mysql_query($sql)){
	$data=array("exito" => '1');
	die(json_encode($data));
	}
//var_dump($sql);
	//die();	
?>