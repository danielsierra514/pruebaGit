<?php
session_start();
if(!isset($_SESSION['agente'])){ //if login in session is not set
	header("Location: http://www.sobreplanos.co");
	session_destroy();
}
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="archivos/css/bootstrap.min.css">
		<link rel="stylesheet" href="archivos/css/bootstrap-theme.min.css">
		<link rel='stylesheet' href='archivos/font-awesome/css/font-awesome.css' />
		<link rel='stylesheet' href='archivos/css/styles.css' />
		<link rel='stylesheet' href='archivos/css/navBarStyles.css' />
		<link rel='stylesheet' href='archivos/social/bootstrap-social.css' />
		<link rel="stylesheet" href="archivos/css/jquery.horizontal.scroll.css" />
		<link rel="shortcut icon" href="archivos/icons/favicon.ico">
		<link rel="stylesheet" href="archivos/css/jquery.Jcrop.css">
		<link rel="stylesheet" href="archivos/css/ajustes.css">
		<script src="archivos/js/jquery.js"></script>
		<script src="archivos/js/cropping.js"></script>
		<script src="archivos/js/angular.min.js"></script>
		<script src="archivos/js/bootstrap.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkSDaIBvRz67aMFYCl4a5KKO0GnwaY6m0&v=3.exp&libraries=places"></script>
		<script src="archivos/js/mapScripts.js"></script>
		<script src="archivos/js/jquery.horizontal.scroll.js"></script>
		<script src="archivos/js/jquery.Jcrop.js"></script>
		<script src="archivos/js/general.js"></script>
		<script src="archivos/js/price.js"></script>
		<script src="archivos/js/valoresAgente.js"></script>
		<script src="archivos/js/proyectosAgente.js"></script>
		<script src="archivos/js/agentes.js"></script>
		<script src="archivos/js/facilidades.js"></script>
	  <script src="archivos/js/analytics.js"></script>
		<script type="text/javascript">
			
			function primeraVez(){				
				var tipoInicio=getUrlParameter('bienvenido');
				if(tipoInicio==1){
					$("#modalBienvenidaAgente").modal("show");					
				}				
			}
			
			function crearProyecto() {
				resetearCrearProyecto();				
				modalActual="modalCrearProyecto";
				$("#tituloCrearProyecto").html("<img class='imgTitulo' src='archivos/icons/hh.png' width='30'>  Crea un Proyecto");
				$("#crearNuevoProyecto").show();
				$("#guardarCambiosProyecto").hide();
				$("#verPublicableProyecto").hide();
				$("#modalCrearProyecto").modal("show");				
				setTimeout(function() {
					center = mapaAgente.getCenter();
					zoom = mapaAgente.getZoom();
					google.maps.event.trigger(mapaProyecto, 'resize');
					mapaProyecto.setCenter(center);
					mapaProyecto.setZoom(zoom);
				}, 500);
			}

			$(document).ready(function() {
				iniciarAgente();
				llamarFacilidades();
				centrarAgenteX();
				llamarProyectosAgente();
				listarConfiguracion();
				mostrarCosas();
				primeraVez();

			});
		</script>
		<style>
			#mapaAgente {
				height: 100%;
				width: 100%;
				
			}
			#listaCuenta {
				height: 100%;
				width: 100%;
				position:relative;
				display:none
				
			}	
			#mapaProyecto {
				height: 260px;
				width: 100%;
			}			
			#formBuscador {
				display: none;
				margin-top: 10px;
				margin-left: 10px;
				width: 45%;
			}
			#logoEmpresaX {
				height: 80px;
				width:240px;
				margin-bottom: 20px;
				margin-left: 20px;
				display: none;
				left:0 !important;
			}			
			#logoEmpresaX img {
				max-height: 100%;
				max-width: 100%;
			}
			
			#fotoFlotanteEmpresa {
				height: 80px;
				width:80px;
				margin-top: 20px;
				margin-right: 20px;
				display: none;
				border-radius: 180px;
				background-color: #DFDCED;
				overflow: hidden;
				border: 4px solid #282529;
			}			
			#fotoFlotanteEmpresa img {
				max-height: 100%;
				max-width: 100%;
			}
			
			#verMapa {
				display: none;
			}
			
			#verLista {
				display: block;
			}		
		</style>
	</head>

	<body>
		<?php
	include 'archivos/includes/navs/headerAgente.php';	
	?>
			<div class="form-group" id="formBuscador">
				<div class="input-group">
					<div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
					<input class="form-control" type="email" placeholder="Busca un lugar" id="formBuscadorVal" data-toggle="tooltip" data-placement="bottom" title="Acá puedes buscar cualquier lugar en el mundo, ya sea por País, Región, Ciudad, Barrio, Dirección o lugares de interés." class="blue-tooltip"> </div>
			</div>

			<div id="logoEmpresaX"></div>
			<div id="fotoFlotanteEmpresa"></div>
		<div id="marker-tooltip" class="transparent"></div>
			<div id="mapaAgente" class="mapa"></div>
		
		
			<?php
	include 'archivos/includes/content/listaProyectosAgente.php';	
	?>

			<?php
	include 'archivos/includes/navs/footerAgente.php';	
	?>
				<?php
	include 'archivos/includes/modals/modalPanorama.php';
	include 'archivos/includes/modals/modalBienvenidaAgente.php';
	include 'archivos/includes/modals/modalVerPDF.php';
	include 'archivos/includes/modals/modalMensaje.php';
	include 'archivos/includes/modals/modalCropPersona.php';
	//include 'archivos/includes/modals/modalSeleccionAgentes.php';	
	//include 'archivos/includes/modals/modalListaAgentes.php';	
	//include 'archivos/includes/modals/modalAgente.php';	
	include 'archivos/includes/modals/modalConfiguracionAgente.php';	
	include 'archivos/includes/modals/modalTCCuenta.php';	
	include 'archivos/includes/modals/modalFelicitaciones.php';	
	include 'archivos/includes/modals/modalCrearProyecto.php';
	include 'archivos/includes/modals/modalVerProyecto.php';
	include 'archivos/includes/modals/modalError.php';
	include 'archivos/includes/modals/modalCropFoto.php';
	include 'archivos/includes/modals/modalCropLogo.php';
	include 'archivos/includes/modals/modalLoading.php';
	include 'archivos/includes/modals/modalModalidades.php';
	include 'archivos/includes/modals/modalAmpliado.php';
	include 'archivos/includes/modals/modalFacilidades.php';
	?>
	</body>

	</html>