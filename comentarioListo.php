<?php 
session_start();
error_reporting(0);
include "headerOtro.php";
?>

  <!-- .................................... $breadcrumb .................................... -->

   <section class="page-top">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
							  <ul class="breadcrumb">
								  <li class="active">Comentario</li>                       	
								</ul>
                                <h2>recibido</h2>
							</div>
						</div>
					</div>
				</section>
  <!-- .................................... $Contact .................................... -->
  
    <div class="container" style="margin-top:10px">
      <h2 class="section-title" style="color:#FFF"><strong>Pronto lo publicaremos</strong></h2>
      </div>
  
  <!-- .................................... $Contact .................................... -->
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
      <div class="row">
        <div class="span8">
        <p>Estimado cliente, muchas gracias por dejar su comentario, valoramos su opinión.</p>
        <p>Puede ver su comentario ingresando a la descripción de producto nuevamente.</p>
        <p>El equipo de Citrom, c.a.</p>
        <p></p>
        <p></p>
        <br>
        <a href="index.php">Volver al Inicio</a>
        
        </div>
      </div>
    </div>
  </section>
  
  <?php   
$email= $_SESSION['emailComentario'];
$nombre=  $_SESSION['nombreComentario'];
$mensaje= $_SESSION['mensajeComentario'];
$_SESSION['codigoProductoComentario'] = $codigoProducto;
$puntuacion= $_SESSION['puntuacionComentario'];
  // ========================================envio de correo al lector ===================
		$destino = $email;
		$asunto = "Comentario recibido";
		$cabeceras = "Content-type: text/html";
		$cuerpo ="<h2>Gracias por tu comentario!</h2><br>
        Hola <b>$nombre </b><br><br>
        Hemos recibido tu comentario: <br> 	
		<p></p>
		$mensaje<br>
		<b>Puntuacion: </b> $puntuacion
		<p></p>
        <br><br>		
		Tu opinión es importante para nosotros. <br>
		De inmediato lo estaremos publicando.<br><br>	
		Tus amigos en Citrom, c.a.<br> <br><br>
		<a href=http://www.citrom.com.ve><img src=http://www.citrom.com.ve/img/logo.png /></a>
<p></p>	<p></p>
<hr>
Designed by tabin<br>
<a href=http://www.tabin.com.ve><img src=http://www.citrom.com.ve/img/ellogotabin.png /></a>
<h5>Hospital de clinicas Las Delicias, PB Local PB-10, Urb Las Delicias,<br>
Maracay, Estado Aragua, 2102<br>
RIF J403661448<br>
© tabin 2015 - All rights reserved<br></h5>
</p>";
	
		$yourWebsite = "citrom.com.ve";
		$yourEmail   = "citrom.ventas@gmail.com";
	    $cabeceras = "From: $yourWebsite <$yourEmail>\n" . "Content-type: text/html" ;
		mail($destino,$asunto,$cuerpo,$cabeceras);
  
  
  
  
  require_once('tools/mypathdb.php');
  
 // Borramos los productos de la tabla temporal 
$sql = mysql_query("DELETE FROM tbl_temporal WHERE email='".$_SESSION['email']."'");
  // Borramos toda la sesion
session_destroy();
  //include "footerOtro.html"; ?>