<?php
require("archivos/phps/config.php");
if ($conexion){	
	$result = mysql_query("SELECT * FROM imagenes limit 10");
	$proyectos = "";
	while ($row = mysql_fetch_array($result)){
			$proyectos=$proyectos."<div class='pd_photo'><div class='pd_hold'><img src='".$row["ruta"]."' alt=''/></div><span class='delete'></span></div>";
	}	
}else{

}
mysql_close($conexion);
?>




	<!DOCTYPE html>
	<html xmlns="http://www.w3.org/1999/xhtml">

	<head>

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
		<link rel="stylesheet" type="text/css" href="archivos/css/index.css" />
		<link rel="stylesheet" type="text/css" href="archivos/css/fullPage.css" />
		<link rel="stylesheet" type="text/css" href="archivos/css/examples.css" />
		<link rel="stylesheet" href="archivos/css/bootstrap.min.css">
		<link rel='stylesheet' href='archivos/font-awesome/css/font-awesome.min.css' />
		<link rel='stylesheet' href='archivos/social/bootstrap-social.min.css' />
		<link rel="stylesheet" href="archivos/css/jquery.horizontal.scroll.min.css" />
		<link rel="shortcut icon" href="archivos/icons/favicon.ico">
		<link href="archivos/css/slider.min.css" rel="stylesheet">
		<link href="archivos/social/bootstrap-social.css" rel="stylesheet">
		<link rel="stylesheet" href="archivos/js/photoSphereViewer/photoSphereViewer.min.css">
		<link rel="stylesheet" href="archivos/css/cliente.css">
		<link rel="stylesheet" href="archivos/css/photoStack.css">

		<script src="archivos/js/jquery.js"></script>
		<script src="archivos/js/angular.min.js"></script>
		<script src="archivos/js/general.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkSDaIBvRz67aMFYCl4a5KKO0GnwaY6m0&v=3.exp&libraries=places"></script>
		<script src="archivos/js/bootstrap.min.js"></script>
		<script src="archivos/js/mapScripts.js"></script>
		<script src="archivos/js/jquery.horizontal.scroll.min.js"></script>
		<script src="archivos/js/bootstrap-slider.min.js"></script>
		<script src="archivos/js/proyectosPrincipal.js"></script>
		<script async src="archivos/js/facebook.min.js"></script>
		<script async src="archivos/js/analytics.js"></script>
		<script src="archivos/js/photoSphereViewer/three.min.js"></script>
		<script src="archivos/js/photoSphereViewer/D.min.js"></script>
		<script src="archivos/js/photoSphereViewer/doT.min.js"></script>
		<script src="archivos/js/photoSphereViewer/uevent.min.js"></script>
		<script src="archivos/js/photoSphereViewer/CanvasRenderer.min.js"></script>
		<script src="archivos/js/photoSphereViewer/Projector.min.js"></script>
		<script src="archivos/js/photoSphereViewer/photoSphereViewer.min.js"></script>


		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
		<script type="text/javascript" src="archivos/js/fullPage.js"></script>
		<script type="text/javascript" src="archivos/js/examples.js"></script>

		<script src="archivos/js/jquery.transform-0.6.2.min.js"></script>
		<script src="archivos/js/jquery.animate-shadow-min.js"></script>
		<script src="archivos/js/photoStack.js"></script>


		<script type="text/javascript">
			var PSV;
			var imagenes = [
				'archivos/360/1.jpg',
				'archivos/360/2.jpg',
				'archivos/360/3.jpg',
				'archivos/360/4.jpg',
				'archivos/360/5.jpg',
				'archivos/360/6.jpg',
				'archivos/360/7.jpg',
				'archivos/360/tribeka.jpg'
			];

			$(document).ready(function() {

				iniciarCliente();

				$('#fullpage').fullpage({
					sectionsColor: ['#1bbc9b', '#4BBFC3', '#7BAABE'],
					anchors: ['Nosotros', 'Mapa', 'Proyectos'],
					menu: '#menu',
					loopTop: true,
					loopBottom: true
				});

				var random = Math.floor(Math.random() * 8) + 0;
				var altura = $("#photosphere").height();
				PSV = new PhotoSphereViewer({
					panorama: imagenes[7],
					container: 'fondo',
					loading_img: 'archivos/icons/loading.gif',
					time_anim: 1,
					anim_speed: '1rpm',
					download: false,
					markers: false,
					auto_rotate: true,
					mousewheel: false,
					navbar: false,
					min_fov: 3000,
					default_fov: 3000,
					size: {
						height: altura
					}
				});

			});
		</script>
	</head>

	<body>
		<div id="logoCliente"><img src="archivos/logos/tribeka2.png" alt=""></div>
		<div id="fullpage">
			<div class="section " id="section0">
				<div id="fondo"></div>
				<div id="sobreFondo">
					<div id="subSobreFondo">
						<div class="container-fluid" id="mainInvitacion">
							<div class="row-fluid">
								<div class="col-md 12">
									<h1>Busca un Lugar Bien Chevere</h1>
								</div>
							</div>
							<div class="row-fluid">
								<div class="col-md-3"></div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 noPadding">
									<div class="form-group">
										<label class="sr-only" for="exampleInputAmount">Ciudad</label>
										<div class="input-group">
											<div class="input-group-addon">Ciudad</div>
											<select class="form-control" id="seleccionCiudad" class="campoPrincipal">
								<option selected disabled></option>
								<?php echo $ciudades; ?>
							</select>
										</div>
									</div>
								</div>
							</div>
							<div class="row-fluid">
								<div class="col-md-12 text-center">
									<button type="button" class="btn btn-primary" id="llevame">Llevame!!!</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="section" id="section1">
				<div id="mapaCliente"></div>
				<div id="tiraProyectos"></div>
			</div>
			<!--<div class="section" id="section2">
				<div class="subSection">
					<div id="pd_container" class="pd_container">
						<? echo $proyectos; ?>
					</div>
				</div>
			</div>-->
		</div>
		<nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
			<div class="container text-right">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" id="colapsar" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><img src="archivos/images/sobrePlanos.png" id="logoPrincipal"></a>
				</div>
				<div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" aria-expanded="false" style="height: 1px;">
					<ul class="nav navbar-nav" id="lista">
						<li>
							<a href="#" data-toggle="modal" data-target="#modal1">.</a>
						</li>
						<li>
							<a href="#" data-toggle="modal" data-target="#modal4">.</a>
						</li>
						<li>
							<a href="#" data-toggle="modal" data-target="#modal2">.</a>
						</li>
						<li>
							<a href="" data-toggle="modal" data-target="#modal3">.</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</body>

	</html>