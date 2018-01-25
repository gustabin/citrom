<?php 
session_start(); 
require_once('tools/mypathdb.php');
error_reporting(0);
include "headerOtro.php";
?>
  <script language="JavaScript" type="text/JavaScript">
	                       
    //Metodo para cargar el formulario 
    $("body").on('submit', '#formRecuperar', function(event) {
	event.preventDefault()
	if ($('#formRecuperar').valid()) {
	    $.ajax({
		type: "POST",
		url: "recuperar_Procesar.php",
		dataType: "json",
		data: $(this).serialize(),
		success: function(respuesta) {
		    if (respuesta.error == 1) {
			  $('#error').show();
				setTimeout(function() {
			  $('#error').hide();			  
			}, 3000);
		    }
			  
			  if (respuesta.exito == 1) {
			  $('#mensaje').show();
			  setTimeout(function() {
			  $('#mensaje').hide();
			  window.location.href="login.php";
			}, 3000);			  
		    }		    
		}
	    });
	}
	});
	function Salir() {
		window.location.href="login.php";
	}    
</script>
  <!-- .................................... $breadcrumb .................................... -->

  <section class="page-top">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
							  <ul class="breadcrumb">
								  <li class="active">Recuperar</li>                       	
								</ul>
                                <h2>password</h2>
							</div>
						</div>
					</div>
				</section>
  <!-- .................................... $Contact .................................... -->
  
    <div class="container" style="margin-top:10px">
      <h2 class="section-title">
        Accesar 
        <small>recuperar password</small>
      </h2>
      </div>
  
  <!-- .................................... $Contact .................................... -->
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
      <div class="row">
        <div class="span4">
          <h5>Nos preocupamos por ti</h5>
          <address>
            Tu información siempre esta a salvo con nosotros, tan solo completa el siguiente campo y de inmediato recupera tu password.
            
          </address>
          
        </div>
        <div class="span8">
          <h5>Por favor completa el siguiente dato</h5>
          <form class="form-vertical" id="formRecuperar">
            <div class="control-group">
              <input class="span4 required email" id="Email" name="Email" placeholder="Email" type="text">              
            </div>			
			
            <div class="control-group">         
            <button class="btn btn-danger" type="submit">Enviar</button>

			<button class="btn btn-default" type="button" onclick="Salir()">Cancelar</button>
			</div>
          </form>
		     
			 <div class="alert alert-danger mensaje_form" style="display: none" id="error">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<strong>ALERTA!</strong> <span class="textmensaje">No tenemos ese email registrado</span>
			 </div>
			 <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<strong>ALERTA!</strong> <span class="textmensaje">Te enviamos su password a tu cuenta de Email</span>
			 </div>
        </div>
        
      </div>
    </div>
  </section>
   <!-- .................................... $footer .................................... -->
