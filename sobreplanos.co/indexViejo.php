<!DOCTYPE html>
<html>
<head>
	<title>Definitiva</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
	<link rel="stylesheet" href="archivos/css/bootstrap.min.css">
	<link rel='stylesheet' href='archivos/font-awesome/css/font-awesome.min.css'  media="none" onload="if(media!='all')media='all'"/>
	<link rel='stylesheet' href='archivos/css/styles.css' />
	<link rel='stylesheet' href='archivos/css/navBarStyles.css' />
	<link rel='stylesheet' href='archivos/social/bootstrap-social.min.css'  media="none" onload="if(media!='all')media='all'"/>
	<link rel="stylesheet" href="archivos/css/jquery.horizontal.scroll.min.css"  media="none" onload="if(media!='all')media='all'"/>
	<link rel="shortcut icon" href="archivos/icons/favicon.ico">
	<link href="archivos/css/slider.min.css" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
	<link href="archivos/social/bootstrap-social.css" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
	<link rel="stylesheet" href="http://photo-sphere-viewer.js.org/dist/Photo-Sphere-Viewer/dist/photo-sphere-viewer.min.css" media="none" onload="if(media!='all')media='all'">
	<link rel="stylesheet" href="archivos/css/ajustes.css">
	
	<script src="archivos/js/jquery.js"></script>
	<script src="archivos/js/angular.min.js"></script>
	<script src="archivos/js/general.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkSDaIBvRz67aMFYCl4a5KKO0GnwaY6m0&v=3.exp&libraries=places"></script>
	<script src="archivos/js/bootstrap.min.js"></script>	
	<script src="archivos/js/mapScripts.min.js"></script>
	<script src="archivos/js/jquery.horizontal.scroll.min.js"></script>	
	<script src="archivos/js/bootstrap-slider.min.js"></script>
	<script src="archivos/js/proyectosPrincipal.js"></script>
	<script async src="archivos/js/facebook.min.js"></script>
	<script async src="archivos/js/analytics.js"></script>
	<script src="http://photo-sphere-viewer.js.org/dist/three.js/three.min.js"></script>
  <script src="http://photo-sphere-viewer.js.org/dist/D.js/lib/D.min.js"></script>
  <script src="http://photo-sphere-viewer.js.org/dist/doT/doT.min.js"></script>
  <script src="http://photo-sphere-viewer.js.org/dist/uevent/uevent.min.js"></script>
  <script src="http://photo-sphere-viewer.js.org/dist/threejs-examples/examples/js/renderers/CanvasRenderer.js"></script>
  <script src="http://photo-sphere-viewer.js.org/dist/threejs-examples/examples/js/renderers/Projector.js"></script>
  <script src="http://photo-sphere-viewer.js.org/dist/Photo-Sphere-Viewer/dist/photo-sphere-viewer.min.js"></script>

	<script async type="text/javascript">		

		$(function() {
			iniciarPrincipal();
			centrarPrincipal();		
			llamarProyectosPrincipal();
			setTimeout(function() {
				verProyectoX();
			}, 2000);

		});
	</script>
	<style>
		#listaPrincipal {
			height: 100%;
			width: 100%;
			position: relative;
			display: none
		}
		
		#formBuscador {
			display: block;
			margin-top: 10px;
			margin-left: 10px;
			width: 45%;
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
			height: 300px;
			width: 100%;
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
			top: 2px;
			left: 2px;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
			overflow: hidden;
		}
		
		#profileFullName {
			position: absolute;
			top: 8px;
			left: 70px;
			width:200px;
			color:#D6D6D6;
		}
		
		
	</style>

</head>

<body>
	<?php include 'archivos/includes/navs/headerPrincipal.php';?>
	<div class="form-group" id="formBuscador">
		<div class="input-group">
			<div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
			<input class="form-control" type="email" placeholder="Busca un lugar" id="formBuscadorVal" data-toggle="tooltip" data-placement="bottom" title="Acá puedes buscar cualquier lugar en el mundo, ya sea por País, Región, Ciudad, Barrio, Dirección o lugares de interés." class="blue-tooltip"> </div>
	</div>
	<div id="marker-tooltip"></div>
	<div id="social-icons">
		<a href='https://www.facebook.com/sobrePlanos.co/'  target="_blank" class="btn btn-social-icon btn-facebook pull-left"><i class="fa fa-facebook"></i></a>
		<a href='https://twitter.com/sobreplanos2016' target="_blank" class="btn btn-social-icon btn-twitter pull-left"><i class="fa fa-twitter"></i></a>
	</div>
	<div id="mapaPrincipal" class="mapa"></div>
	


	<?php	include 'archivos/includes/content/listaProyectosPrincipal.php';?>
		<?php	include 'archivos/includes/navs/footerPrincipal.php';	?>

			<?php
	include 'archivos/includes/modals/modal360.php';
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
	include 'archivos/includes/modals/modalAmpliado.php';
	include 'archivos/includes/modals/modalOlvideContrasena.php';
	include 'archivos/includes/modals/modalMensaje.php';
	?>
</body>

</html>