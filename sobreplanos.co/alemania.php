<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
	<link rel="stylesheet" href="archivos/css/bootstrap.min.css">
	<link rel="stylesheet" href="archivos/css/bootstrap-theme.min.css">
	<link rel='stylesheet' href='archivos/font-awesome/css/font-awesome.css' />
	<link rel='stylesheet' href='archivos/css/styles.css' />
	<link rel='stylesheet' href='archivos/css/navBarStyles.css' />
	<link rel='stylesheet' href='archivos/social/bootstrap-social.css' />
	<link rel="stylesheet" href="archivos/css/jquery.horizontal.scroll.css" />
	<link rel="shortcut icon" href="archivos/icons/favicon.ico">
	<link href="archivos/css/slider.less" rel="stylesheet">
	<link href="archivos/css/slider.css" rel="stylesheet">
	<link href="archivos/social/bootstrap-social.css" rel="stylesheet">

	<script src="archivos/js/jquery.js"></script>
	<script src="archivos/js/angular.min.js"></script>
	<script src="archivos/js/bootstrap.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkSDaIBvRz67aMFYCl4a5KKO0GnwaY6m0&v=3.exp&libraries=places"></script>
	<script src="archivos/js/configuracion.js"></script>
	<script src="archivos/js/mapScripts.js"></script>
	<script src="archivos/js/jquery.horizontal.scroll.js"></script>
	<script src="archivos/js/general.js"></script>
	<script src="archivos/js/bootstrap-slider.js"></script>
	<script src="archivos/js/proyectosAlemania.js"></script>
	<script src="archivos/js/favoritos.js"></script>
	<script src="archivos/js/facebook.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {			
			

			iniciarPrincipal();
			centrarPrincipalX();
			llamarProyectosPrincipal();
			mostrarCosas();

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
			<input class="form-control" type="email" placeholder="Busca un lugar" id="formBuscadorVal"> </div>
	</div>
	<div id="marker-tooltip"></div>
	<div id="mapaPrincipal" class="mapa"></div>



	<?php	include 'archivos/includes/content/listaProyectosPrincipal.php';?>
		<?php	include 'archivos/includes/navs/footerPrincipal.php';	?>

			<?php
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