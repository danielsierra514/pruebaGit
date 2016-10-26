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
	<html>
	<head>
		<title>Definitiva</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
		<link rel="stylesheet" href="archivos/css/bootstrap.min.css">
		<link rel='stylesheet' href='archivos/font-awesome/css/font-awesome.min.css' />
		

		<link rel='stylesheet' href='archivos/social/bootstrap-social.min.css' />
		<link rel="shortcut icon" href="archivos/icons/favicon.ico">
		<link rel="stylesheet" href="archivos/js/photoSphereViewer/photoSphereViewer.min.css">
		<link rel="stylesheet" href="archivos/css/index.css">
		<link rel='stylesheet' href='archivos/css/styles.css'/>
		<link rel="stylesheet" href="archivos/css/ajustes.css">
		<link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
		
		<script src="archivos/js/jquery.js"></script>
		<script src="archivos/js/angular.min.js"></script>
		<script src="archivos/js/bootstrap.min.js"></script>
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
				'archivos/360/3b.jpg',
				'archivos/360/x.jpg',
				'archivos/360/xx.jpg',
				'archivos/360/xxx.jpg',
				'archivos/360/4.jpg',
				'archivos/360/5.jpg',
				'archivos/360/6.jpg',
				'archivos/360/7.jpg',
				'archivos/360/8.jpg',
				'archivos/360/e.jpg',
				'archivos/360/fs.jpg',
				'http://i.imgur.com/niHC9wI.jpg',

			];

			$(document).ready(function() {

				var random = Math.floor(Math.random() * 8) + 0;
				var altura = $("#photosphere").height();
				PSV = new PhotoSphereViewer({
					panorama: imagenes[2],
					container: 'fondo',
					loading_img: 'archivos/icons/loading.gif',
					time_anim: 1,
					anim_speed: '1rpm',
					download: false,
					markers: false,
					auto_rotate: true,
					mousewheel: false,
					navbar: true,
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

				$("#llevame").click(function() {
					valor = $("#seleccionCiudad").val();
					arreglo = valor.split("|");
					latitud = arreglo[0];
					longitud = arreglo[1];
					if ((latitud != "") && (longitud != "")) {
						$("#seleccionCiudad").removeClass("campoError");
						$("#llevame").css("display", "none");
						$("#loadingX").css("display", "block");
						window.location.href = "http://www.sobreplanos.co/principal.php?latitud=" + latitud + "&longitud=" + longitud;
					} else {
						$("#seleccionCiudad").addClass("campoError");
					}
				});

			});
		</script>
	</head>
	<style>
		h1 {
			font-family: 'Indie Flower', cursive;
		}
	</style>

	<body cz-shortcut-listen="true">
		<div id="fondo"></div>
		<div id="sobreFondo">
			<div id="subSobreFondo">
				<h1>Dónde te gustaría vivir?</h1>
				<div id="social-icons">
					<a href='https://www.facebook.com/sobrePlanos.co/' target="_blank" class="btn btn-social-icon btn-facebook pull-left"><i class="fa fa-facebook"></i></a>
					<a href='https://twitter.com/sobreplanos2016' target="_blank" class="btn btn-social-icon btn-twitter pull-left"><i class="fa fa-twitter"></i></a>
				</div>
				<div class="container-fluid" id="mainInvitacion">
					<div class="row-fluid">
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-centered noPadding">
							<div class="form-group">
								<label class="sr-only" for="exampleInputAmount">Ciudad</label>
								<div class="input-group">
									<div class="input-group-addon input-group-addonX">Ciudad</div>
									<select class="form-control form-controlX" id="seleccionCiudad" class="campoPrincipal">
								<option selected disabled></option>
								<?php echo $ciudades; ?>
							</select>
								</div>
							</div>
						</div>
						<!--<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-centered noPadding">
							<div class="form-group">
								<label class="sr-only" for="exampleInputAmount">Tipo</label>
								<div class="input-group">
									<div class="input-group-addon input-group-addonX">Tipo</div>
									<select class="form-control form-controlX" id="seleccionTipo" class="campoPrincipal">
								<option selected disabled></option>
								<?php //echo $tipos; ?>
							</select>
								</div>
							</div>
						</div>-->
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-centered noPadding text-center">
							<i class="fa fa-refresh fa-spin fa-5x fa-fw" id="loadingX" aria-hidden="true"></i>
							<button type="button" class="btn btn-primary btn-primaryX" id="llevame">Llévame!!!</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php include 'archivos/includes/navs/footerIndex.php';	  ?>
<?php

	include 'archivos/includes/modals/modalTCPrincipal.php';
	include 'archivos/includes/modals/modalLogin.php';
	?>
	</body>

	</html>