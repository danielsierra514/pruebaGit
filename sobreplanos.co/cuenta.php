<?php
session_start();
if(!isset($_SESSION['usuario'])){ //if login in session is not set
	header("Location: http://www.sobreplanos.co");
	session_destroy();
}

?>
	<!DOCTYPE html>
	<html>

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
		<link rel="stylesheet" href="archivos/css/split-pane.css" />
		<link rel="stylesheet" href="archivos/css/pretty-split-pane.css" />

		<script src="archivos/js/jquery.js"></script>
		<script src="archivos/js/angular.min.js"></script>
		<script src="archivos/js/general.js"></script>
		<script src="archivos/js/mapStyles.js"></script>
		<script src="archivos/js/cropping.js"></script>

		<script src="archivos/js/bootstrap.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkSDaIBvRz67aMFYCl4a5KKO0GnwaY6m0&v=3.exp&libraries=places"></script>
		<script src="archivos/js/mapScripts.js"></script>
		<script src="archivos/js/jquery.horizontal.scroll.js"></script>
		<script src="archivos/js/jquery.Jcrop.js"></script>

		<script src="archivos/js/price.js"></script>
		<script src="archivos/js/valoresCuenta.js"></script>
		<script src="archivos/js/proyectosCuenta.js"></script>
		<script src="archivos/js/agentes.js"></script>
		<script src="archivos/js/facilidades.js"></script>
		<script src="archivos/js/regional.js"></script>
		<script src="archivos/js/analytics.js"></script>
		<script src="archivos/js/split-pane.js"></script>


		<!--<link rel="stylesheet" href="templates/styles/colorPicker.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script src="templates/scripts/tiposMapa.js"></script>
		<script src="templates/scripts/colorPicker.js"></script>-->

		<script type="text/javascript">
			$(function() {
				$('div.split-pane').splitPane();

				$(".splitBanner").mousewheel(function(event, delta) {
					this.scrollLeft -= (delta * 30);
					event.preventDefault();
				});

			});



			function primeraVez() {
				var tipoInicio = getUrlParameter('bienvenido');
				if (tipoInicio == 1) {
					$("#modalBienvenida").modal("show");
				}
			}

			function crearProyecto() {
				resetearCrearProyecto();
				modalActual = "modalCrearProyecto";
				$("#tituloCrearProyecto").html("<img class='imgTitulo' src='archivos/icons/hh.png' width='30'>  Crea un Proyecto");
				$("#crearNuevoProyecto").show();
				$("#guardarCambiosProyecto").hide();
				$("#verPublicableProyecto").hide();
				$("#modalCrearProyecto").modal("show");

			}


			$(function() {

				iniciarCuenta(function() {
					obtenerUbicacionNavegador(mapaCuenta);
					llamarProyectosCuenta(function() {
						setTimeout(function() {
							$(".todo").css("display", "block");
							google.maps.event.trigger(mapaCuenta, 'resize');
							centrarCuenta();
							primeraVez();
							listarConfiguracion();
							llamarFacilidades();
							listarPaises();
						}, 500);
					});
				});
			});


			/*			llamarAgentes();


						primeraVez();*/
		</script>

		<style>
			#mapaCuenta {
				height: 100%;
				width: 100%;
			}
			
			#listaCuenta {
				height: 100%;
				width: 100%;
				position: relative;
			}
			
			#mapaProyecto {
				height: 400px;
				width: 100%;
			}
			
			#formBuscador {
				margin-top: 10px;
				margin-left: 10px;
				width: 45%;
			}
			
			#logoEmpresa {
				height: 40px;
				width: 240px;
				margin-top: 20px;
				margin-right: 20px;
				text-align: right;
			}
			
			#logoEmpresa img {
				max-height: 100%;
				max-width: 100%;
			}
			
			#verMapa {
				display: none;
			}
			
			#verLista {
				display: block;
			}
			
			.colorpicker {
				z-index: 8000
			}
			
			.col-centered {
				display: inline-block;
				float: none;
				text-align: left;
				margin-right: -4px;
			}
			
			.row-centered {
				text-align: center;
			}
			/**********/
			
			.iconOk {
				color: #94dd16;
				display: none;
				font-size: 24px;
				margin: 4px 4px
			}
			
			.iconDelete {
				color: #f11712;
				font-size: 18px;
				margin: 2px;
			}
			
			.iconCog {
				color: #463E3E;
				font-size: 18px;
				margin: 2px;
			}
		</style>
	</head>

	<body>
		<?php include 'archivos/includes/navs/headerCuenta.php';?>
		<div id="marker-tooltip"></div>
		<div id="logoEmpresa"></div>
		<?php	include 'archivos/includes/content/listaProyectosCuenta.php';?>
			<?php include 'archivos/includes/navs/footerCuenta.php';?>
			<?php
	include 'archivos/includes/modals/modalLocalizarProyecto.php';
	include 'archivos/includes/modals/modalCrearContrasena.php';
	include 'archivos/includes/modals/modalPanorama.php';
	include 'archivos/includes/modals/modalBienvenida.php';
	include 'archivos/includes/modals/modalVerPDF.php';
	include 'archivos/includes/modals/modalMensaje.php';
	include 'archivos/includes/modals/modalCropPersona.php';	
	include 'archivos/includes/modals/modalUbicacion.php';	
	include 'archivos/includes/modals/modalSeleccionAgentes.php';	
	include 'archivos/includes/modals/modalListaAgentes.php';	
	include 'archivos/includes/modals/modalAgente.php';	
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
	include 'archivos/includes/modals/modalConfiguracion.php';
	include 'archivos/includes/modals/modalFacilidades.php';
	include 'archivos/includes/modals/modalImagenLink.php';
	include 'archivos/includes/modals/modalVideoLink.php';
		
	/*include 'templates/modules/modals/modalConfiguradorTemplate.php';
  include 'templates/modules/modals/modalConfiguradorSecciones.php';
  include 'templates/modules/modals/modalSelectorColores.php';
  include 'templates/modules/modals/modalSelectorColor.php';
	include 'templates/modules/modals/modalConfiguradorMapa.php';*/
	?>
	</body>

	</html>