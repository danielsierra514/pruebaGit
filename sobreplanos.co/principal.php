<!DOCTYPE html>
<html>

<head>
	<title>Definitivo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
	<link rel="stylesheet" href="archivos/css/bootstrap.min.css">
	<link rel='stylesheet' href='archivos/font-awesome/css/font-awesome.min.css' />
	<link rel='stylesheet' href='archivos/css/styles.css' />

	<link rel='stylesheet' href='archivos/css/navBarStyles.css' />
	<link rel='stylesheet' href='archivos/social/bootstrap-social.min.css' />
	<link rel="stylesheet" href="archivos/css/jquery.horizontal.scroll.min.css" />
	<link rel="shortcut icon" href="archivos/icons/favicon.ico">
	<link rel="stylesheet" href="archivos/css/slider.min.css">
	<link rel="stylesheet" href="archivos/js/photoSphereViewer/photoSphereViewer.min.css">
	<link rel="stylesheet" href="archivos/css/ajustes.css">
	<link rel="stylesheet" href="archivos/css/split-pane.css" />
	<link rel="stylesheet" href="archivos/css/pretty-split-pane.css" />

	<script src="archivos/js/jquery.js"></script>
	<script src="archivos/js/jqueryMobile.js"></script>
	<script src="archivos/js/angular.min.js"></script>
	<script src="archivos/js/general.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjfF9mxO7QKFH4KC64rnr9PfQtSMx6__k&v=3.exp&libraries=places"></script>
	<script src="archivos/js/bootstrap.js"></script>
	<script src="archivos/js/mapStyles.js"></script>
	<script src="archivos/js/proyectosPrincipal.js"></script>
	<script src="archivos/js/mapScripts.js"></script>
	<script src="archivos/js/jquery.horizontal.scroll.min.js"></script>
	<script src="archivos/js/bootstrap-slider.min.js"></script>
	<script src="archivos/js/mouseWheel.js"></script>
	<script async src="archivos/js/facebook.min.js"></script>
	<script async src="archivos/js/analytics.js"></script>
	<script src="archivos/js/photoSphereViewer/three.min.js"></script>
	<script src="archivos/js/photoSphereViewer/D.min.js"></script>
	<script src="archivos/js/photoSphereViewer/doT.min.js"></script>
	<script src="archivos/js/photoSphereViewer/uevent.min.js"></script>
	<script src="archivos/js/photoSphereViewer/CanvasRenderer.min.js"></script>
	<script src="archivos/js/photoSphereViewer/Projector.min.js"></script>
	<script src="archivos/js/photoSphereViewer/photoSphereViewer.min.js"></script>
	<script src="archivos/js/split-pane.js"></script>

	<style>
		#listaPrincipal {
			height: auto;
			width: 100%;
		}
		
		#formBuscador {
			display: block;
			margin-top: 10px;
			margin-left: 10px;
			width: 45%;
			display: block;
		}
		
		#mapaPrincipal {
			height: 100%;
			width: 100%;
		}
		
		#sobreMapaPrincipal {
			position: absolute;
			height: 100%;
			width: 100%;
			background-color: transparent;
			text-align: center
		}
		
		#sobreMapaPrincipal img {
			margin: auto;
		}
		
		#mapaFavoritos {
			height: 398px;
			width: 100%;
		}
		
		@media (max-width: 767px) {
			#mapaFavoritos {
				height: 200px;
				width: 100%;
			}
		}
		
		#verMapa {
			display: none;
		}
		
		#verLista {
			display: block;
		}
		
		#profilePicture {
			width: 46px;
			height: 46px;
			position: absolute;
			top: -1px;
			left: 5px;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
			overflow: hidden;
		}
		
		#profilePicture img:hover {
			width: 44px;
			height: 44px;
		}
		
		#profileFullName {
			position: absolute;
			top: 6px;
			left: 70px;
			width: 200px;
			color: #D6D6D6;
		}
	</style>

	<script>
		$(function() {

			$("#myCarousel").swiperight(function() {
				$(this).carousel('prev');
			});
			$("#myCarousel").swipeleft(function() {
				$(this).carousel('next');
			});

			$(".splitBanner").mousewheel(function(event, delta) {
				this.scrollLeft -= (delta * 30);
				event.preventDefault();
			});

		});

		$(function() {
			$('div.split-pane').splitPane();

		});

		$(function() {
			iniciarPrincipal(function() {
				obtenerUbicacionNavegador(mapaPrincipal);
				llamarProyectosPrincipal(function() {
					setTimeout(function() {
						$(".todo").css("display", "block");
						google.maps.event.trigger(mapaPrincipal, 'resize');
						centrarPrincipal();
						verProyectoX();
					}, 500);
				});
			});

		});
	</script>
</head>

<body>
	<?php include 'archivos/includes/navs/headerPrincipal.php';?>
	<div id="marker-tooltip"></div>
	<?php	include 'archivos/includes/content/listaProyectosPrincipal.php';?>
		<?php	include 'archivos/includes/navs/footerPrincipal.php';	?>

			<?php
	//include 'archivos/includes/modals/modal360.php';
	include 'archivos/includes/modals/modalComoLlegar.php';
	include 'archivos/includes/modals/modalFacebookLogin.php';
	include 'archivos/includes/modals/modalPanorama.php';
	include 'archivos/includes/modals/modalVerPDF.php';
	include 'archivos/includes/modals/modalFelicitaciones.php';
	include 'archivos/includes/modals/modalContactoCliente.php';
	include 'archivos/includes/modals/modalTCPrincipal.php';
	include 'archivos/includes/modals/modalFiltro.php';
	include 'archivos/includes/modals/modalLogin.php';
	include 'archivos/includes/modals/modalFavoritos.php';
	include 'archivos/includes/modals/modalVerProyecto.php';	
	include 'archivos/includes/modals/modalCrearProyecto.php';
	include 'archivos/includes/modals/modalOlvideContrasena.php';
	include 'archivos/includes/modals/modalMensaje.php';
	?>
</body>

</html>