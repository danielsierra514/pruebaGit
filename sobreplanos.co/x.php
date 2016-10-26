<?php
require("archivos/phps/config.php");
if ($conexion){	
	$result = mysql_query("SELECT ciudad,latitud,longitud FROM proyectos GROUP BY ciudad");
	$ciudades = "";
	while ($row = mysql_fetch_array($result)){
		$ciudades=$ciudades."<option value='".$row["latitud"]."|".$row["longitud"]."'>".$row["ciudad"]."</option>";	
	}
	
	$result = mysql_query("SELECT pais,latitud,longitud FROM proyectos GROUP BY pais");
	$paises = "";
	while ($row = mysql_fetch_array($result)){
		$paises=$paises."<option value='".$row["latitud"]."|".$row["longitud"]."'>".$row["pais"]."</option>";	
	}
	
	$result = mysql_query("SELECT p.tipoProyecto, t.tipo FROM proyectos p, tiposProyectos t WHERE p.tipoProyecto=t.codigo GROUP BY p.tipoProyecto");
	$tipos = "";
	while ($row = mysql_fetch_array($result)){
		$tipos=$tipos."<option value='".$row["tipoProyecto"]."'>".$row["tipo"]."</option>";	
	}
	
}else{

}
mysql_close($conexion);
?>


	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>Definitiva</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
		<link rel="stylesheet" href="archivos/css/bootstrap.min.css">
		<link rel='stylesheet' href='archivos/font-awesome/css/font-awesome.min.css' />
		<link rel='stylesheet' href='archivos/social/bootstrap-social.min.css' />
		<link rel="stylesheet" href="archivos/css/jquery.horizontal.scroll.min.css" />
		<link rel="shortcut icon" href="archivos/icons/favicon.ico">
		<link href="archivos/css/slider.min.css" rel="stylesheet">
		<link href="archivos/social/bootstrap-social.css" rel="stylesheet">
		<link rel="stylesheet" href="archivos/js/photoSphereViewer/photoSphereViewer.min.css">
		<link rel="stylesheet" href="archivos/css/x.css">

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
		<script type="text/javascript">
			var PSV;
			var imagenes = [
				'archivos/360/1.jpg',
				'archivos/360/2.jpg',
				'archivos/360/3.jpg',
				'archivos/360/4.jpg',
				'archivos/360/5.jpg',
				'archivos/360/6.jpg',
				'archivos/360/7.jpg'
			];

			$(document).ready(function() {
				
				iniciarCliente();
				
				var random = Math.floor(Math.random() * 8) + 0;
				var altura = $("#photosphere").height();
				PSV = new PhotoSphereViewer({
					panorama: imagenes[random],
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

				$("#lista a").click(function() {
					$("#colapsar").trigger("click");
				});

				var latitud = "";
				var longitud = "";

				$("#seleccionPais, #seleccionCiudad").change(function() {
					valor = $(this).val();
					arreglo = valor.split("|");
					latitud = arreglo[0];
					longitud = arreglo[1];
				});

				$("#llevame").click(function() {
					if ((latitud != "") && (longitud != "")) {
						$("#seleccionCiudad").removeClass("campoError");
						window.location.href = "http://www.sobreplanos.co/principal.php?latitud=" + latitud + "&longitud=" + longitud;
					} else {
						$("#seleccionCiudad").addClass("campoError");
					}

				});

			});
		</script>
	</head>

	<body cz-shortcut-listen="true">
		<div id="fondo"></div>
		<div id="sobreFondo">
			<div id="subSobreFondo">

			</div>
		</div>
		<div id="fondo1"><div id="mapaCliente"></div></div>
		<div id="fondo2"></div>
		<div id="fondo3"></div>		
		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
			<div class="container text-right">
				<!-- Brand and toggle get grouped for better mobile display -->
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
		<div id="social-icons">
			<a href='https://www.facebook.com/sobrePlanos.co/' target="_blank" class="btn btn-social-icon btn-facebook pull-left"><i class="fa fa-facebook"></i></a>
			<a href='https://twitter.com/sobreplanos2016' target="_blank" class="btn btn-social-icon btn-twitter pull-left"><i class="fa fa-twitter"></i></a>
		</div>
		<!--<div class="container-fluid text-center">
		<div class="row-fluid">
			<div class="col-lg-4 col-md-4 col-sm-8  col-xs-8 bloque">
				<img src="archivos/images/sobrePlanos.png" id="logoPrincipal">
				<h1>.</h1>
			</div>
		</div>
	</div>-->
	</body>

	</html>