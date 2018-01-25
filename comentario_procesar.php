<?php
session_start(); 
error_reporting(0);
require_once('tools/mypathdb.php');
$nombre = $_POST ['nombre'];
$email = $_POST ['email'];
$mensaje = $_POST ['mensaje'];
$codigoProducto = $_POST ['codigoProducto'];
$puntuacion = $_POST ['puntuacion'];

$_SESSION['nombreComentario'] = $nombre;
$_SESSION['emailComentario'] = $email;
$_SESSION['mensajeComentario'] = $mensaje;
$_SESSION['codigoProductoComentario'] = $codigoProducto;
$_SESSION['puntuacionComentario'] = $puntuacion;

if (empty($nombre)) {
	$data=array("error" => '4');
	die(json_encode($data));
}
if (empty($email)) {
	$data=array("error" => '4');
	die(json_encode($data));
}
if (empty($mensaje)) {
	$data=array("error" => '4');
	die(json_encode($data));
}
	
if (empty($puntuacion)) {
	$data=array("error" => '1');
	die(json_encode($data));
}
if ($puntuacion>5) {
	$data=array("error" => '3');
	die(json_encode($data));
}
if ($puntuacion<1) {
	$data=array("error" => '3');
	die(json_encode($data));
}
if (!is_numeric($puntuacion)) {
	$data=array("error" => '2');
	die(json_encode($data));
}
  $query = mysql_query("INSERT INTO tbl_revisiones (producto, nombre, comentario, puntuacion, email) VALUES ('".$codigoProducto."','".$nombre."',  '".$mensaje."',  ".$puntuacion.",  '".$email."');");
  $dataTemporal = mysql_fetch_array($query);
  $data=array("exito" => '1');// 
  die(json_encode($data));
  mysql_close(); //desconectar();
?>