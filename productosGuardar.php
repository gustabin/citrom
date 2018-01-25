<?php 
//session_start();
//if (($_SESSION['$usuario']<=2) OR (empty($_SESSION['$usuario']))) { //===============================Redirigir a otra pagina========================================		
//	header("Location: index.php");
//}
require_once('tools/mypathdb.php');
error_reporting(0);
//include "headerOtro.php"; //se usa otro header por conflicto con    ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js
$id = $_POST ['id']; //viene oculto
$precio = $_POST ['precio'];
$cantidad = $_POST ['cantidad'];

if (!empty($precio)) 	
	{	
	// ========================= Actualizar la tabla productos ==========================================================	
	$sql="UPDATE tbl_productos SET precio=" .$precio. " WHERE id=$id";	
	}	

if(mysql_query($sql)){
	$data=array("exito" => '2');
	die(json_encode($data));
	}
//var_dump($sql);
	//die();	
?>