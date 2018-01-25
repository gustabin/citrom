<?php 
session_start();
require_once('tools/mypathdb.php');
error_reporting(0);
include "headerOtro.php";
?>
<script Language="JavaScript">
	$(document).ready(function() {
		$('#titulo').html("Paso 1/ Datos Personales");
         $(".tlf").mask("(0999) 999-99-99");			 
	});
	
	
	function ocultarCiudades(){   //funcion para desaparecer cbo_ciudades
		$('#cbo_ciudades').hide();
	} 
	
	function Salir() {
		window.location.href="login.php";
	}    
		 
	
    //Metodo para cargar los datos personales
    $("body").on('submit', '#registrarCliente', function(event) {
		event.preventDefault()
		if ($('#registrarCliente').valid()) {
			$.ajax({
				type: "POST",
				url: "registrarProcesar.php",
				dataType: "json",
				data: $(this).serialize(),
				success: function(respuesta) {
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
					if (respuesta.error == 5) {
						$('#error5').show();
						setTimeout(function() {
						$('#error5').hide();
						}, 2000);
					}
					if (respuesta.exito == 1) {
			  			$('#mensaje').show();
			  			setTimeout(function() {
			  			$('#mensaje').hide();
			  			window.location.href='pagar.php'; 
						}, 1000);
		    		}
				}
			});
		}
	});	
	    
</script> 
  <!-- .................................... $breadcrumb .................................... -->
  
  <!-- .................................... $Titulo .................................... -->
  

      
      
  				<section class="page-top">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
							  <ul class="breadcrumb">
								  <li class="active">Registrar</li>                       	
								</ul>
                                <h2>cliente</h2>
							</div>
						</div>
					</div>
				</section>
  
  <!-- .................................... $Contenido .................................... -->
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
      <div class="row">
        <div class="span4">
          <h5>Disfruta de nuestro servicio</h5>
          <address>
            Estamos orgullosos de poder ayudarte en tu compra.
            
          </address>
          
          <p>
            <a class="btn btn-small btn-danger" href="login.php">Login</a>
          </p>
        </div>
        <div class="span8">
          <h5>Por favor completa los siguientes datos</h5>
   
    <form class="form-vertical" id="registrarCliente">
		<div class="control-group">
	  		<input name="Email" type="text" class="span4 required email" id="Email" placeholder="Email">
		  	<input name="Password" type="password" class="span4 required" id="Password"  placeholder="Password"> 
		</div>
	
		<div class="control-group">
			<input name="Nombre" type="text" class="span4 required" id="Nombre" placeholder="Nombre">
		  	<input name="Apellido" type="text" class="span4 required" id="Apellido" placeholder="Apellido">
            <input name="Empresa" type="text" class="span4" id="Empresa" placeholder="Empresa">
		</div>	

		<div class="control-group">
	  		<input name="Direccion" type="text" class="required" id="Direccion" style="width:95%" placeholder="Dirección">  
            <input name="cedulaRif" type="text" class="required" id="cedulaRif" placeholder="Cédula ó Rif"> 
                        
		</div>			
	
	
		<div class="control-group">              	
			<input name="celular" type="text" class="span4 required tlf" id="celular"  placeholder="Teléfono">
		</div>
        <!--div class="control-group">              	
			¿Cuentas con un código promocional? 
            <input name="codigoPromocional" type="text" class="span4" id="codigoPromocional"  placeholder="Código promocional">
		</div!-->
	
		<div class="control-group">         
			<button class="btn btn-danger" type="submit" id="enviar">Guardar</button>
            <button class="btn btn-default" type="button" onclick="Salir()">Cancelar</button>
		</div>
        
  </form> <!--cierre del formulario !-->

	 
     
     <!-- ================= mensajes de EXITO o de ERROR===========================================================  !-->
     <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MENSAJE!</strong> <span class="textmensaje">Registro exitoso</span>          
	 </div>    
   	 
      
	 <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MENSAJE!</strong> <span class="textmensaje">El password debe ser mayor de 6 caracteres</span>
	 </div>
     
	 <div class="alert alert-danger mensaje_form" style="display: none" id="error2">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MENSAJE!</strong> <span class="textmensaje">El cliente ya está registrado</span>
	 </div>
     
     <div class="alert alert-danger mensaje_form" style="display: none" id="error3">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MENSAJE!</strong> <span class="textmensaje">Ese código promocional ya fue utilizado 10 veces</span>
	 </div>
     
     <div class="alert alert-danger mensaje_form" style="display: none" id="error4">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MENSAJE!</strong> <span class="textmensaje">Código promocional no encontrado</span>
	 </div>
     
     <div class="alert alert-danger mensaje_form" style="display: none" id="error5">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MENSAJE!</strong> <span class="textmensaje">Debe colocar su direccion completa</span>
	 </div>
        </div>
        
      </div>
    </div>
  </section>
    <!-- .................................... $footer .................................... -->
  <?php include "footer.php"; ?>